<?php

namespace Database\Seeders;

use App\Models\CoachSchedule;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoachScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coachData = [
            ['user_id' => 1, 'coach_name' => 'Amit Yadav', 'time_zone' => 'IST', 'day_of_week' => 'Monday', 'start_time' => '9:00:00 AM', 'end_time' => '5:00:00 PM', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 1, 'coach_name' => 'Amit Yadav', 'time_zone' => 'IST', 'day_of_week' => 'Tuesday', 'start_time' => '9:00:00 AM', 'end_time' => '5:00:00 PM', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 1, 'coach_name' => 'Amit Yadav', 'time_zone' => 'IST', 'day_of_week' => 'Wednesday', 'start_time' => '9:00:00 AM', 'end_time' => '5:00:00 PM', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 1, 'coach_name' => 'Amit Yadav', 'time_zone' => 'IST', 'day_of_week' => 'Thursday', 'start_time' => '9:00:00 AM', 'end_time' => '5:00:00 PM', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 1, 'coach_name' => 'Amit Yadav', 'time_zone' => 'IST', 'day_of_week' => 'Friday', 'start_time' => '9:00:00 AM', 'end_time' => '5:00:00 PM', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 1, 'coach_name' => 'Amit Yadav', 'time_zone' => 'IST', 'day_of_week' => 'Saturday', 'start_time' => '9:00:00 AM', 'end_time' => '5:00:00 PM', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 2, 'coach_name' => 'John Sepro', 'time_zone' => 'IST', 'day_of_week' => 'Monday', 'start_time' => '11:00:00 AM', 'end_time' => '4:00:00 PM', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 2, 'coach_name' => 'John Sepro', 'time_zone' => 'IST', 'day_of_week' => 'Tuesday', 'start_time' => '11:00:00 AM', 'end_time' => '4:00:00 PM', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 2, 'coach_name' => 'John Sepro', 'time_zone' => 'IST', 'day_of_week' => 'Wednesday', 'start_time' => '11:00:00 AM', 'end_time' => '4:00:00 PM', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 2, 'coach_name' => 'John Sepro', 'time_zone' => 'IST', 'day_of_week' => 'Thursday', 'start_time' => '11:00:00 AM', 'end_time' => '4:00:00 PM', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 2, 'coach_name' => 'John Sepro', 'time_zone' => 'IST', 'day_of_week' => 'Friday', 'start_time' => '9:00:00 AM', 'end_time' => '5:00:00 PM', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 2, 'coach_name' => 'John Sepro', 'time_zone' => 'IST', 'day_of_week' => 'Saturday', 'start_time' => '1:00:00 PM', 'end_time' => '7:00:00 PM', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 3, 'coach_name' => 'Sunny Agarwal', 'time_zone' => 'IST', 'day_of_week' => 'Monday', 'start_time' => '9:00:00 AM', 'end_time' => '5:00:00 PM', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 3, 'coach_name' => 'Sunny Agarwal', 'time_zone' => 'IST', 'day_of_week' => 'Tuesday', 'start_time' => '9:00:00 AM', 'end_time' => '5:00:00 PM', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 3, 'coach_name' => 'Sunny Agarwal', 'time_zone' => 'IST', 'day_of_week' => 'Wednesday', 'start_time' => '9:00:00 AM', 'end_time' => '5:00:00 PM', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 3, 'coach_name' => 'Sunny Agarwal', 'time_zone' => 'IST', 'day_of_week' => 'Thursday', 'start_time' => '9:00:00 AM', 'end_time' => '5:00:00 PM', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 3, 'coach_name' => 'Sunny Agarwal', 'time_zone' => 'IST', 'day_of_week' => 'Friday', 'start_time' => '9:00:00 AM', 'end_time' => '5:00:00 PM', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 3, 'coach_name' => 'Sunny Agarwal', 'time_zone' => 'IST', 'day_of_week' => 'Saturday', 'start_time' => '9:00:00 AM', 'end_time' => '5:00:00 PM', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 4, 'coach_name' => 'Paula Stacy', 'time_zone' => 'IST', 'day_of_week' => 'Monday', 'start_time' => '11:00:00 AM', 'end_time' => '4:00:00 PM', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 4, 'coach_name' => 'Paula Stacy', 'time_zone' => 'IST', 'day_of_week' => 'Tuesday', 'start_time' => '11:00:00 AM', 'end_time' => '4:00:00 PM', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 4, 'coach_name' => 'Paula Stacy', 'time_zone' => 'IST', 'day_of_week' => 'Wednesday', 'start_time' => '11:00:00 AM', 'end_time' => '4:00:00 PM', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 4, 'coach_name' => 'Paula Stacy', 'time_zone' => 'IST', 'day_of_week' => 'Thursday', 'start_time' => '11:00:00 AM', 'end_time' => '4:00:00 PM', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 4, 'coach_name' => 'Paula Stacy', 'time_zone' => 'IST', 'day_of_week' => 'Friday', 'start_time' => '9:00:00 AM', 'end_time' => '5:00:00 PM', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 4, 'coach_name' => 'Paula Stacy', 'time_zone' => 'IST', 'day_of_week' => 'Saturday', 'start_time' => '1:00:00 PM', 'end_time' => '7:00:00 PM', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ];
        CoachSchedule::insert($coachData);
    }
}