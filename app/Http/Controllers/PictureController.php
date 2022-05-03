<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Picture;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\ValidationException;

/**
 * Picture 모델 테스트용 컨트롤러 생성
 */
class PictureController extends Controller
{
    public function showForm(Work $work)
    {
        return view('picture', ['work' => $work]);
    }

    public function processPicture(Work $work, Request $request)
    {
        $request->validate([
            'picture' => ['required'],
        ]);
        if ($request->hasFile('picture')) {
            // 파일 존재
            $files = $request->file('picture');
            $pictures = array();
            foreach ($files as $file) {
                $validator = Validator::make(['file' => $file], ['file' => $this->fileRules()]);
                if ($validator->passes())
                    array_push($pictures, Picture::addPictureToWork($work, $file));
                else
                    throw ValidationException::withMessages([
                        'picture' => [trans($validator->errors()->first())],
                    ]);
            }
            return redirect()
                ->route('product', ['work' => $work])
                ->with('picture', $pictures)
                ->with('message', 'Picture successfully added');
        } else {
            // 파일을 받지 않음
            return $this->showForm($work);
        }
    }

    public function deletePicture(Picture $picture)
    {
        $route = redirect();
        $work = $picture->getWork();
        if ($work)
            $route = $route->route('product', ['work' => $work]);
        else
            $route = $route->route('work', ['year' => $picture->picture_year]);
        if ($picture->delete())
            $route = $route->with('message', 'Picture successfully deleted');
        else
            $route = $route->with('message', 'Picture delete failed');
        return $route;
    }

    protected function fileRules()
    {
        return ['image', 'max:2048']; // image/*, <=2MB
    }
}
