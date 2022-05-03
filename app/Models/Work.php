<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    public $incrementing = true;
    public $timestamps = true;
    protected $table = 'work';
    protected $primaryKey = 'no';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'year',
        'title',
        'cont',
    ];

    /**
     * works table에 존재하는 year 들을 종류별로 내림차순으로 가져옵니다
     * @return array<string>
     */
    public static function getYears()
    {
        return array_column(
            self::select('year')
                ->distinct()
                ->orderby('year', 'desc')
                ->get()
                ->toArray(),
            'year'
        );
    }

    /**
     * 연도에 해당하는 Work 들을 가져옵니다
     * @param string $year
     */
    public static function getWorksFromYear($year)
    {
        return self::where('year', $year)
            ->orderBy("created_at", "desc")
            ->get();
    }

    /**
     * primary key 값을 가져옵니다
     */
    public function getID()
    {
        return $this[$this->primaryKey];
    }

    /**
     * 해당 work 에 대응하는 picture 들을 가져옵니다
     * @return array<Picture>
     */
    public function getPictures()
    {
        return Picture::getPicturesFromWork($this);
    }
}
