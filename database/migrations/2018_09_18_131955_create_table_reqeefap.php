<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReqeefap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reqeefap', function (Blueprint $table) {
            $table->increments('id');
            $table->string('biodata', 200)->nullable();
            $table->string('cor', 200)->nullable();
            $table->string('or', 200)->nullable();
            $table->string('grades', 200)->nullable();
            $table->string('brgy', 200)->nullable();
            $table->string('oid', 200)->nullable();

            $table->string('biodata_sub', 20)->default('Not Submitted');
            $table->string('cor_sub', 20)->default('Not Submitted');
            $table->string('or_sub', 20)->default('Not Submitted');
            $table->string('grades_sub', 20)->default('Not Submitted');
            $table->string('brgy_sub', 20)->default('Not Submitted');
            $table->string('oid_sub', 20)->default('Not Submitted');

            $table->integer('scholar_id');
            $table->integer('applicant_id');
            $table->integer('application_id');
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
        Schema::dropIfExists('reqeefap');
    }
}
