<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('admins', function($table)
        {
            $table->string('surname', 50);
            $table->string('first_name', 50);
            $table->string('middle_name', 50)->nullable()->change();
            $table->string('suffix', 10);
            $table->foreign('account_id')->references('id')->on('account_type');
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
        Schema::table('admins', function($table)
        {
            $table->dropColumn('surname');
            $table->dropColumn('first_name');
            $table->dropColumn('middle_name');
            $table->dropColumn('suffix');
        });
    }
}
