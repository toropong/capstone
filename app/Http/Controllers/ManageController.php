<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use App\Models\Work;
use App\Models\Picture;

class ManageController extends Controller
{
    public function index()
    {
        return view('register');
    }


    #저장, 업데이트
    public function update(Request $request)
    {

        // $data['no'] = \App\Models\Work::select('no')->first();
        $result = [];
        if ($request->no) {
            $work = \App\Models\Work::where('no', $request->no)->first();
        } else {
            $work = new Work();
        }

        // $work->no = $data['no'] ?? 0;
        $work->no =  $request->no ?? 0;
        $work->year = $request->year ?? "";
        $work->title = $request->title ?? "";
        $work->cont = $request->cont ?? "";

        if ($work->no) {
            $result['result'] = $work->update();
        } else {
            $result['result'] = $work->save();
        }
        if ($request->rURL) {
            $result['rURL'] = $request->rURL;
        } else {
            $result['rURL'] = "";
        }

        if ($request->hasFile('picture')) {
            Picture::addPictureToWork($work, $request->file('picture'));
        }

        return response($result);
        // $data = DB::table('picture')
        // ->select('*')->get();
    }

    #작품 삭제
    public function delete(Request $request)
    {
        $result = [];
        if ($request->no) {
            $work = \App\Models\Work::where('no', $request->no)
                ->first();
            if ($work) {
                $result['result'] = $work->delete();
                if ($result['result'] == false) {
                    $result['message'] = "삭제하지 못했습니다.";
                }
            } else {
                $result = [
                    'result' => false,
                    'message' => "데이터가 존재하지 않습니다."
                ];
            }
        } else {
            $result = [
                'result' => false,
                'message' => "정보가 존재하지 않습니다."
            ];
        }

        return response($result);
    }
}
