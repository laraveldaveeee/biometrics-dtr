<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWorkScheduleIdToEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {

            $table->unsignedBigInteger('work_schedule_id')
                  ->nullable()
                  ->after('position_id');

            $table->foreign('work_schedule_id')
                  ->references('id')
                  ->on('work_schedules')
                  ->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {

            $table->dropForeign([
                'work_schedule_id'
            ]);

            $table->dropColumn(
                'work_schedule_id'
            );

        });
    }
}