<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gender', 20);
            $table->date('birthdate');
            $table->string('nationality', 50);
            $table->string('religion', 50)->nullable()->change();
            $table->string('civil_status', 50);
            $table->string('mobile_number', 20);
            $table->string('municipality', 50);
            $table->string('barangay', 50);
            $table->string('street');
            $table->foreign('user_id')->references('id')->on('admins');
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
        Schema::dropIfExists('admins_info');
    }
}
