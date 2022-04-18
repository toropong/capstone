<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;

class WorkController extends Controller
{
    public function index($year)
    {
        $works = Work::getWorksFromYear($year);
        if ($works->count() <= 0) {
            return abort(404);
        }
        
        return view('work', ['works' => $works]);
    }
}
