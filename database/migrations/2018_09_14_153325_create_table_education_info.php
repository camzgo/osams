<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEducationInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('course', 200);
            $table->string('yr_lvl', 20);
            $table->string('yr_entered', 5);
            $table->integer('duration');
            $table->string('college_name', 150);
            $table->string('college_address', 200);
            $table->integer('applicant_id');
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
        Schema::dropIfExists('education_info');
    }
}
