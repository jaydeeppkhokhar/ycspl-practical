<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coach_schedule', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('coach_name', 300);
            $table->string('time_zone', 300);
            $table->string('day_of_week', 300);
            $table->string('start_time', 300);
            $table->string('end_time', 300);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coach_schedule');
    }
};