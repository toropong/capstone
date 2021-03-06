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
        return view('index', ['works' => $works, 'year' => $year]);
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
        return view('product', ['work' => $work, 'pictures' => $pictures]);
    }

    public function delete(Work $work)
    {
        $work->delete();
        return redirect()->back();
    }

    public function add(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'cont' => ['required', 'string'],
            'year' => ['required', 'string'],
            'picture' => ['required', 'image', 'max:102400'],
        ]);
        $work = Work::create([
            'title' => $request['title'],
            'cont' => $request['cont'],
            'year' => $request['year'],
        ]);
        Picture::addPictureToWork($work, $request->file('picture'));
        return redirect()->route('product', ['work'=>$work]);
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
