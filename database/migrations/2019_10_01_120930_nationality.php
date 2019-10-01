<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Nationality extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_nationalitys', function (Blueprint $table) {
            $table->bigIncrements('nationality_id');
            $table->string('nationality_name');
            $table->string('description');
            $table->string('status')->default('1')->comment('1 is active 0 inactive');
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
        Schema::dropIfExists('mst_nationalitys');
    }
}
