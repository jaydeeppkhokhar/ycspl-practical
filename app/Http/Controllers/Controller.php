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

            $coachData = CoachSchedule::select('user_id', 'coach_name', 'time_zone', 'day_of_week', 'start_time', 'end_time');
            if (!empty($userID)) {
                $coachData = $coachData->where('user_id', $userID);
            }
            $coachData = $coachData->get();
            $responseData = [];
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

                $i = 0;
                do {
                    $lastTime = $tmpTime;
                    if ($i == 4) {
                        $tmpTime = $startTimeObj->add(new DateInterval('PT30M'))->format('Y-m-d H:i:s');
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

            if (!empty($userID)) {
                $responseData = $responseData['coaches'][0];
            }

            $responseData['zone'] = $request->timezone;
            return $responseData;
        } catch (Exception $e) {
            return response([$e->getMessage()], 422);
        }
    }
}
