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
            $table->string('names')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        $user = new \App\User();
        $user->email = 'alejandro.isla.c@gmail.com';
//        $user->password = encrypt('admin123');
        $user->names = "Alejandro Isla";
        $user->password = 'admin123';
        $user->phone = "990684339";
        $user->save();
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
