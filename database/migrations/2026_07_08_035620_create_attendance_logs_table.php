<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_logs', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('biometric_uid');

            $table->string('biometric_userid');

            $table->tinyInteger('state');

            $table->tinyInteger('verify_type');

            $table->dateTime('attendance_time');

            $table->boolean('processed')->default(false);

            $table->timestamp('synced_at')->nullable();

            $table->timestamps();

            $table->index('biometric_userid');
            $table->index('attendance_time');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance_logs');
    }
}
