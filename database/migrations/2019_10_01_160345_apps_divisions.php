<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppsDivisions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apps_divisions', function (Blueprint $table) {
            $table->bigIncrements('division_id');
            $table->string('country_id');
            $table->string('division_name');
            $table->string('local_name');
            $table->string('status')->default('1')->comment('1 is active 0 is inactive');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apps_divisions');
    }
}
