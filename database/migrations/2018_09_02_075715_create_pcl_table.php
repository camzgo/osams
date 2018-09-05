<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePclTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcl', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('surname', 50);
            $table->string('first_name', 50);
            $table->string('middle_name', 50);
            $table->string('suffix', 10);
            $table->string('mobile_number', 20);
            $table->string('district', 15);
            $table->string('municipality', 50);
            $table->string('barangay', 50);
            $table->string('street');
            $table->string('school_enrolled', 50);
            $table->string('course', 50);
            $table->string('year_level', 50);
            $table->string('gender', 20);
            $table->date('birthdate');
            $table->string('nationality', 50);
            $table->string('religion', 50);
            $table->string('civil_status', 50);
            $table->string('birth_place', 150);
            $table->string('fsurname', 50);
            $table->string('ffirst_name', 50);
            $table->string('fmiddle_name', 50);
            $table->string('fsuffix', 10);
            $table->string('foccupation', 20);
            $table->string('msurname', 50);
            $table->string('mfirst_name', 50);
            $table->string('mmiddle_name', 50);
            $table->string('msuffix', 10);
            $table->string('moccupation', 20);
            $table->string('address', 150);
            $table->string('emergency', 80);
            $table->string('emobile_number', 20);
            $table->integer('scholarship_id');
            $table->integer('applicant_id');
            $table->integer('application_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pcl');
    }
}
