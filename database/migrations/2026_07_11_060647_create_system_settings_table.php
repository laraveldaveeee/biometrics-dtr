<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_settings', function (Blueprint $table) {
                $table->id();
                    
                $table->string('office_name');
                $table->string('office_address')->nullable();

                $table->string('office_logo')->nullable();

                $table->string('prepared_by')->nullable();
                $table->string('prepared_position')->nullable();

                $table->string('checked_by')->nullable();
                $table->string('checked_position')->nullable();

                $table->string('approved_by')->nullable();
                $table->string('approved_position')->nullable();
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
        Schema::dropIfExists('system_settings');
    }
}
