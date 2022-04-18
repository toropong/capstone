<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Work;

/**
 * 석상일
 * 테스트용 작품 목록 생성
 */
class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Work::create([
            'year' => "1984",
            'title' => "테스트1",
            'cont' => "IMTESTING20220415",
        ]);
        Work::create([
            'year' => "1984",
            'title' => "테스트2",
            'cont' => "IMTESTING20220415",
        ]);
        Work::create([
            'year' => "1984",
            'title' => "테스트3",
            'cont' => "IMTESTING20220415",
        ]);
        Work::create([
            'year' => "1985",
            'title' => "테스트4",
            'cont' => "IMTESTING20220415",
        ]);
        Work::create([
            'year' => "1985",
            'title' => "테스트5",
            'cont' => "IMTESTING20220415",
        ]);
        Work::create([
            'year' => "1986",
            'title' => "테스트6",
            'cont' => "IMTESTING20220415",
        ]);
    }
}
