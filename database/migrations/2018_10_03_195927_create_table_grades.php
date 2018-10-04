<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGrades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('subject', 300);
            $table->string('grades', 50);
            $table->integer('student_id');
            $table->string('semester', 50);
            $table->boolean('new')->default(0);
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
        Schema::table('grades', function (Blueprint $table) {
            //
             Schema::dropIfExists('grades');
        });
    }
}
