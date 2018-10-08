<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSpes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spes_tbl', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('first_name', 250);
            $table->string('surname', 250);
            $table->string('middle_name', 250)->nullable();
            $table->string('school_id', 250)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('spes_tbl');
    }
}
