<?php

/**
 * 석상일
 * 테스트용 작품목록 생성
 * 실사용시 제거되어야 합니다.
 */

use Illuminate\Database\Migrations\Migration;
use App\Models\Work;

class TestWorkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Work::where('cont', "IMTESTING20220415")->delete();
    }
}
