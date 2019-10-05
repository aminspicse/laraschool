<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MstSubject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_subjects', function (Blueprint $table) {
            $table->bigIncrements('subject_id');
            $table->string('user_id');
            $table->string('auth_code');
            $table->string('class_id');
            $table->string('department_id');
            $table->string('subject_code');
            $table->string('subject_name');
            $table->integer('incourse')->default('0');
            $table->integer('incourse_pass')->default('0');
            $table->integer('mcq')->default('0');
            $table->integer('mcq_pass')->default('0');
            $table->integer('cq')->default('0');
            $table->integer('cq_pass')->default('0');
            $table->integer('pt')->default('0');
            $table->integer('pt_pass')->default('0');
            $table->integer('total')->default('0');
            $table->integer('total_pass')->default('33');
            $table->string('mark_system')->default('GPA');
            $table->string('description');
            $table->string('updated_by')->nullable();
            $table->string('status')->default('1')->comment('1 is active 0 is inactive');
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
        Schema::dropIfExists('mst_subjects');
    }
}
