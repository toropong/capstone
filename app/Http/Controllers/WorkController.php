<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;
use App\Models\Work;

class WorkController extends Controller
{
    public function index($year)
    {
        $works = $this->getWorksFromYear($year);
        return view('work', ['works' => $works, 'year' => $year]);
    }

    public function showProduct($year, $sequence)
    {
        $works = $this->getWorksFromYear($year);
        $is_valid = ((is_numeric($sequence)) && ($sequence > 0));
        $is_exist = ($works->count() >= $sequence);
        if (!($is_valid && $is_exist)) {
            return $this->notFound();
        }
        $work = $works[$sequence - 1];
        return $this->product($work);
    }

    public function product(Work $work)
    {
        $pictures = Picture::getPicturesFromWork($work);
        return view('work', ['work' => $work, 'pictures' => $pictures]);
    }

    protected function getWorksFromYear($year)
    {
        $works = Work::getWorksFromYear($year);
        if ($works->count() <= 0) {
            return $this->notFound();
        }
        return $works;
    }

    public function notFound()
    {
        return abort(404);
    }
}
