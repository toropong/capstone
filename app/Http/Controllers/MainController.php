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

class MainController extends Controller
{

    public function __construct()
    {
        $this->work = new Work();
    }

     ## 목록
     public function index(Request $request){
        $data["works"] = [];
        $data["works"] = $this->work->select()
        ->orderBy("created_at","desc")->paginate(10);

        // $data['total'] = $data["works"]->total();

        return view('main',$data);
     }


     #저장, 업데이트
    public function update(Request $request){

    $data["no"] = \App\Models\Work::select("no")->first();
    $result = [];
    if( $request->no ) {
        $work = \App\Models\Work::where('no', $request->no)->firstOrFail();
    } else {
        $work = new work();
    }

    $work->no = $data["no"] ?? 0;
    $work->year = $request->year ?? 0;
    $work->title = $request->title ?? "";
    $work->cont = $request->cont ?? "";

    if( $work->no ) {
        $result['result'] = $work->update();
    } else {
        $result['result'] = $work->save();
    }
    if( $request->rURL ) {
        $result['rURL'] = $request->rURL;
    } else {
        $result['rURL'] = "";
    }

    return response($result);
}
}

