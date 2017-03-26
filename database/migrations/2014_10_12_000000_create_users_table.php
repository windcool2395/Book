<?php

use Illuminate\Support\Facades\Schema;
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
            $table->string('email',150);
            $table->string('password',150);
            $table->string('firstname', 100);
            $table->string('lastname', 100);
            $table->string('address', 255)->nullable();
            $table->string('avatar', 255)->nullable();
            $table->string('phone_number', 15)->nullable();
            $table->enum('gender',['1','0']);
            $table->dateTime('bod')->default('1990/1/1');;
            $table->integer('group_id')->default('1');
            $table->enum('is_deleted',['1','0'])->default('0');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
