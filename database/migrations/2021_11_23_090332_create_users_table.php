<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('people_id');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('role_id');
            $table->boolean('active')->default(1);
            $table->integer('added_by')->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('people_id')->references('id')->on('people');

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
