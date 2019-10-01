<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MstQuota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_quotas', function (Blueprint $table) {
            $table->bigIncrements('quota_id');
            $table->string('quota_name');
            $table->string('description');
            $table->string('status')->default('1')->comment('1 is active and 0 is in active');
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
        Schema::dropIfExists('mst_quotas');
    }
}
