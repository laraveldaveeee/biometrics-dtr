<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('daily_attendances', function (Blueprint $table) {

            $table->id();

            $table->foreignId('employee_id')
                    ->constrained('employees')
                    ->cascadeOnDelete();

            $table->date('attendance_date');

            $table->dateTime('time_in')->nullable();

            $table->dateTime('time_out')->nullable();

            $table->integer('late_minutes')->default(0);

            $table->integer('undertime_minutes')->default(0);

            $table->string('remarks')->nullable();

            $table->timestamps();

            $table->unique([
                'employee_id',
                'attendance_date'
            ]);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_attendances');
    }
}
