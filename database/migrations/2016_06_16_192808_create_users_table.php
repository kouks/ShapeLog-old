<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('fbid');
            $table->string('username');
            $table->string('first_name');
            $table->string('last_name');
            $table->bigInteger('birthday');
            $table->string('gender');
            $table->tinyInteger('metric')->default(1);
            $table->string('locale')->default('en');
            $table->tinyInteger('admin')->default(0);
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
        Schema::drop('users');
    }
}
