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
        $data["works"] = $this->work->select();

        // $data['total'] = $data["works"]->total();

        return view('main',$data);
     }
}

