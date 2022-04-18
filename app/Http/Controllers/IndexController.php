<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;

class IndexController extends Controller
{
    public function index()
    {
        $recent_year = current(Work::getYears());
        $recent_works = Work::getWorksFromYear($recent_year);
        return view('index', ['year' => $recent_year, 'works' => $recent_works]);
    }
}
