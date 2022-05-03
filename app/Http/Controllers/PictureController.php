<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Picture;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
                $validator = Validator::make(array('file' => $file), ['file' => $this->rules()]);
                if ($validator->passes())
                    array_push($pictures, Picture::addPictureToWork($work, $file));
                else
                    throw ValidationException::withMessages([
                        'picture' => [trans($validator->errors()->first())],
                    ]);
            }
            return view('picture', ['work' => $work, 'picture' => $pictures]);
        } else {
            // 파일을 받지 않음
            return $this->showForm($work);
        }
    }

    protected function makePicture($file, Work $work)
    {
        if (is_array($file)) {
            $arr = array();
            foreach ($file as $f)
                array_push($arr, $this->makePicture($f, $work));
            return $arr;
        } else {
            return Picture::addPictureToWork($work, $file);
        }
    }

    protected function rules()
    {
        return ['image', 'max:2048']; // image/*, <=2MB
    }
}
