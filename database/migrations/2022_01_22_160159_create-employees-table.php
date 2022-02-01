<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table){
            $table->id();
            $table->string('name');
            $table->bigInteger('mobile');
            $table->string('email')->unique();
            $table->integer('salary');
            $table->string('DOB');
            $table->date('created_at')->useCurrent();
            $table->integer('created_by');
            $table->date('updated_at');
            $table->integer('updated_by');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employees');
    }
}
