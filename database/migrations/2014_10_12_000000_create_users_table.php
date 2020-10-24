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
            $table->bigIncrements('id');
            $table->string('profilepic', 255)->nullable();
            $table->string('name', 191);
            $table->string('first_name', 191);
            $table->string('last_name', 191);
            $table->string('email', 191)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 191);
            $table->boolean('verified')->default(false);
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
