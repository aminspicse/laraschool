<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Admission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->bigIncrements('admission_id');
            $table->string('serial_no');
            $table->string('auth_code');
            $table->string('student_id');
            $table->string('old_student_id')->nullable();
            $table->string('student_name');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('nationality')->nullable();
            $table->string('nid')->nullable();
            $table->string('dateofbirth')->nullable();
            $table->string('religion')->nullable();
            $table->string('quota')->nullable();
            $table->string('admission_date')->nullable();
            $table->string('country')->comment('Present Country');
            $table->string('division')->comment('Present Division');
            $table->string('district')->comment('Present District');
            $table->string('upazila')->comment('Present Upazila');
            $table->string('union_name')->comment('Present Union');
            $table->string('postoffice')->comment('Present Postoffice');
            $table->string('permanent_address')->comment('Full permanent Address');
            $table->string('previous_education')->comment('Previous education if any');
            $table->string('admission_class');
            $table->string('department');
            $table->string('admission_year');
            $table->string('student_photo');
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
        Schema::dropIfExists('admissions');
    }
    //manual table 

    /*
        CREATE TABLE admissions(
	admission_id int not null PRIMARY KEY AUTO_INCREMENT,
    serial_no int NOT null,
    auth_code int not null,
    student_id int not null UNIQUE,
    student_name varchar(100),
    father_name varchar(100),
    mother_name varchar(100),
    mobile_number varchar(20),
    nationality varchar(100) NOT null,
    dateofbirth varchar(100) not null,
    religion varchar(100),
    quota varchar(100),
    admission_date varchar(100),
    country varchar(100),
    division varchar(100),
    district varchar(100),
    upazila varchar(100),
    union_name varchar(100),
    post_office varchar(100),
    permanent_address varchar(255),
    previous_education varchar(300) null,
    admission_class varchar(100),
    department varchar(100),
    admission_year varchar(8),
    student_photo varchar(300)
);
    */
}
