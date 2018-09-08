<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovalDateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approval_date', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_approved');
            $table->string('status', 20);
            $table->integer('applicant_id');
            $table->integer('application_id');
            $table->integer('scholarship_id');
            $table->integer('employee_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('approval_date');
    }
}
