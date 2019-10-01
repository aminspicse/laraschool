<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Settings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_settings', function (Blueprint $table) {
            $table->bigIncrements('setting_id');
            $table->integer('user_id');//unique
            $table->string('auth_code');
            $table->string('class_id')->nullable();
            $table->string('semester_id')->nullable();
            $table->string('year_id')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('mst_settings');
    }
}
