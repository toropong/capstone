<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

/**
 * 석상일
 * 테스트용 유저 생성
 */
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "TestName",
            'user_id' => "testid",
            'age' => "Ages",
            'user_level' => 0,
            'email' => "a@b.c",
            'password' => Hash::make("testpassword"),
        ]);
    }
}
