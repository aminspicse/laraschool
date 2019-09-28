<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->bigIncrements('test_id');
            $table->string('student_id');
            $table->string('class_id');
            $table->string('semester_id');
            $table->string('auth_code');
            $table->string('subject_id');
            $table->string('mcq')->nullable();
            $table->string('cq')->nullable();
            $table->string('pt')->nullable();
            $table->string('total')->nullable();
            $table->string('gpa')->nullable();
            $table->string('grade')->nullable();
            $table->string('user_id');            
            $table->string('updated_by')->nullable();            
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
        Schema::dropIfExists('tests');
    }
}
