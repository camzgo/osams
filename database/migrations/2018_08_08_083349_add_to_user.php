<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function($table)
        {
            $table->string('surname');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('gender');
            $table->date('bday');
            $table->string('profile_photo');
            $table->string('applicant_isdel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('users', function($table)
        {
            $table->dropColumn('surname');
            $table->dropColumn('first_name');
            $table->dropColumn('middle_name');
            $table->dropColumn('gender');
            $table->dropColumn('bday');
            $table->dropColumn('profile_photo');
            $table->dropColumn('applicant_isdel');
        });
    }
}
