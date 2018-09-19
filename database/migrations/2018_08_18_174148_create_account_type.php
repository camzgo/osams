<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('account_name', 20);
            $table->string('account_desc');
            $table->string('file_maintenance', 10);
            $table->string('tracking', 10);
            $table->string('submission', 10);
            $table->string('transactions', 10);
            $table->string('utilities', 10);
            $table->string('reports', 10);
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
        Schema::dropIfExists('account_type');
    }
}

/**
 * php artisan make:migration create_fdd_table --create=admins
 */