<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGuardianInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardian_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('surname', 50);
            $table->string('first_name', 50);
            $table->string('middle_name', 50)->nullable();
            $table->string('suffix', 10)->nullable();
            $table->string('mobile_number', 20);
            $table->string('gender', 10);
            $table->string('nationality', 50);
            $table->string('occupation', 50);
            $table->string('civil_status', 50);
            $table->string('municipality', 50);
            $table->string('barangay', 50);
            $table->string('street')->nullable();
            $table->date('bday');
            $table->string('relationship', 50);
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
        Schema::dropIfExists('guardian_info');
    }
}
