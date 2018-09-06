<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEefapgvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eefapgv', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('surname', 50);
            $table->string('first_name', 50);
            $table->string('middle_name', 50)->nullable();
            $table->string('suffix', 10)->nullable();
            $table->string('mobile_number', 20);
            $table->string('municipality', 50);
            $table->string('barangay', 50);
            $table->string('street')->nullable();
            $table->string('college_name', 50);
            $table->string('college_address', 150);
            $table->string('course', 50);
            $table->string('major', 50);
            $table->string('program_type', 20);
            $table->string('year_level', 50);
            $table->string('graduating', 5);
            $table->string('general_average', 5);
            $table->string('spes', 5);
            $table->string('awards', 20);
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
        Schema::dropIfExists('eefapgv');
    }
}
