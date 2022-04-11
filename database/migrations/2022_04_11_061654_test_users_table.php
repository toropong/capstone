<?php

/**
 * 석상일 4/11
 * 테스트용 유저 생성
 * 실사용시 제거되어야 합니다.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class TestUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // DB::table('users')->insert([
        //     'name' => "TestName",
        //     'user_id' => "TestID",
        //     'age' => "Ages",
        //     'user_level' => 0,
        //     'password' => hash('sha256', "TestPassword"),
        // ]);
        User::create([
            'name' => "TestName",
            'user_id' => "TestID",
            'age' => "Ages",
            'user_level' => 0,
            'password' => hash('sha256', "TestPassword"),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        User::where('user_id', "TestID")->delete();
    }
}
