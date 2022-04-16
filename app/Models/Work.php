<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    public $incrementing = true;
    protected $table = 'work';

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

    public function getYears()
    {
        return array_column(self::select('year')->distinct()->orderby('year', 'desc')->get()->toArray(), 'year');
    }
}
