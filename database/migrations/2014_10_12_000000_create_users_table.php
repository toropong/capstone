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
            $table->string('name')->comment('이름');
            $table->string('user_id')->comment('아이디')->default('');
            $table->string('age')->comment('나이')->default('');
            $table->string('email')->comment('이메일');
            $table->unsignedInteger('user_level')->comment('권한')->default(0);
            $table->string('password')->comment('비밀번호');
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
