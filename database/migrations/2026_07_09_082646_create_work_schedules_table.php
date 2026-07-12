,<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkSchedulesTable extends Migration
{
    public function up()
    {
        Schema::create('work_schedules', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->string('schedule_name');

            $table->time('time_in');

            $table->time('time_out');

            $table->integer('grace_period')
                ->default(0);

            $table->time('break_start')
                ->nullable();

            $table->time('break_end')
                ->nullable();

            $table->string('working_days')
                ->nullable();

            $table->boolean('status')
                ->default(1);

            $table->timestamps();

        });
    }


    public function down()
    {
        Schema::dropIfExists(
            'work_schedules'
        );
    }
}