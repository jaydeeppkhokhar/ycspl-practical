<?php

namespace App\Http\Controllers;

use App\Models\CoachSchedule;
use Carbon\Carbon;
use DateInterval;
use DateTime;
use DateTimeZone;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function CoachSchedule(Request $request, $userID = null)
    {
        try {
            if (!empty($userID)) {
                $validator = Validator::make($request->all(), [
                    'timezone' => 'required'
                ]);
                if ($validator->fails()) {
                    return response([$validator->errors()->first()], 422);
                }
            }
            if (empty($request->timezone)) {
                $request->timezone = 'Asia/Kolkata';
            }

            $reqFrmTime = $request->ava_from_time;
            $reqToTime = $request->ava_to_time;

            $coachData = CoachSchedule::select('user_id', 'coach_name', 'time_zone', 'day_of_week', 'start_time', 'end_time');
            if (!empty($userID)) {
                $coachData = $coachData->where('user_id', $userID);
            }
            $coachData = $coachData->get();
            $responseData = [];
            $checkAvaData = [];
            $tmpUserID = null;
            $tmpKey = 0;
            $responseData['zone'] = $request->timezone;

            foreach ($coachData as $key => $value) {
                if ($tmpUserID != $value->user_id) {
                    $tmpUserID = $value->user_id;
                    $tmpKey++;
                }

                $responseData['coaches'][$tmpKey - 1]['user_id'] = $value->user_id;
                $responseData['coaches'][$tmpKey - 1]['name'] = $value->coach_name;

                $startTimeObj = (new DateTime(Carbon::parse($value->start_time)))->setTimezone(new DateTimeZone($request->timezone));
                $endTimeObj = (new DateTime(Carbon::parse($value->end_time)))->setTimezone(new DateTimeZone($request->timezone));

                $tmpTime = $startTimeObj->format('Y-m-d H:i:s');
                $finalTime = $endTimeObj->format('Y-m-d H:i:s');

                $checkAvaData[$tmpKey - 1]['user_id'] = $tmpUserID;
                $checkAvaData[$tmpKey - 1]['user_name'] = $value->coach_name;
                $checkAvaData[$tmpKey - 1]['ava_time'] = ["start" => $startTimeObj->format('H:i'), "end" => $endTimeObj->format('H:i')];
                $i = 0;
                do {
                    $lastTime = $tmpTime;
                    if ($i == 4) {
                        $checkAvaData[$tmpKey - 1]['ava_time']["break_start"] = $startTimeObj->format('H:i');
                        $tmpTime = $startTimeObj->add(new DateInterval('PT30M'))->format('Y-m-d H:i:s');
                        $checkAvaData[$tmpKey - 1]['ava_time']["break_end"] = $startTimeObj->format('H:i');
                    } else {
                        $tmpTime = $startTimeObj->add(new DateInterval('PT1H'))->format('Y-m-d H:i:s');
                        if ($tmpTime > $finalTime) {
                            $tmpTime = $finalTime;
                        }
                        $responseData['coaches'][$tmpKey - 1]['time_slots'][$value->day_of_week][] = ['start_time' => date('H:i:s', strtotime($lastTime)), 'end_time' => date('H:i:s', strtotime($tmpTime))];
                    }
                    $i++;
                } while ($tmpTime < $finalTime);
            }

            if (!empty($reqFrmTime) && !empty($reqToTime)) {
                foreach ($checkAvaData as $key => $value) {
                    $avaTime = $value['ava_time'];
                    $from = Carbon::parse($reqFrmTime);
                    $to = Carbon::parse($reqToTime);
                    $start = Carbon::parse($avaTime['start']);
                    $end = Carbon::parse($avaTime['end']);
                    $breakStart = Carbon::parse($avaTime['break_start']);
                    $breakStart = Carbon::parse($avaTime['break_end']);

                    if (($from->between($start, $end, true) && $to->between($start, $end, true)) && (!$from->between($breakStart, $breakStart, true) && !$to->between($breakStart, $breakStart, true))
                    ) {
                        $availableCoaches[] = ['id' => $value['user_id'], 'name' => $value['user_name']];
                    }
                }
                if (empty($availableCoaches)) {
                    return response(["Coaches are not available"], 404);
                }
                return $availableCoaches;
            }

            if (!empty($userID)) {
                $responseData = $responseData['coaches'][0];
            }

            $responseData['zone'] = $request->timezone;
            return [$checkAvaData, $responseData];
        } catch (Exception $e) {
            return response([$e->getMessage()], 422);
        }
    }
}