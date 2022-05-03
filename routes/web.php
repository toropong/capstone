<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkController;

use App\Http\Controllers\PictureController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

function test()
{
  // 년도에 따른 작품 목록 표시
  Route::get('/work/{year}', [WorkController::class, 'index'])->name('work');
  // 작품 순서에 따른 작품 상세정보 표시
  Route::get('/work/{year}/{sequence}', [WorkController::class, 'showProduct'])->name('work.product');
  // 작품 ID(no)에 따른 작품 상세정보 표시
  // Route::get('/product/{work}', [WorkController::class, 'product'])->name('product');

  // Picture 모델 테스트용
  Route::get('/product/{work}', [PictureController::class, 'showForm'])->name('product');
  Route::post('/product/{work}', [PictureController::class, 'processPicture']);
  Route::match(['get', 'post'], '/picture/delete/{picture}', [PictureController::class, 'deletePicture']);

  // 유저 정보 변경
  Route::middleware('password.confirm')->group(function () {
    // 비밀번호 변경
    Route::get('/password/change', [UserController::class, 'showPasswordChangeForm']);
    Route::post('/password/change', [UserController::class, 'changePassword']);
  });

  Route::get('/product', function () {
    return view('product');
  });
}

Route::get('/index', [IndexController::class, 'index'])->name('index');

Route::get('/', [MainController::class, 'index'])->name('main');

Route::post('/update', [MainController::class, 'update']);

// 관리자 페이지
Route::get('/manage', [ManageController::class, 'index'])->name('manage');

//작품 등록
Route::get('/manage/register', [ManageController::class, 'index']);
Route::post('/manage/update/{no}', [ManageController::class, 'update']);

// 기능 테스트
test();

/**
 * Auth의 라우팅 기능들 중 필요한것만 가져옵니다.
 * Laravel\Ui\AuthRouteMethods@auth
 * @see Laravel\Ui\AuthRouteMethods
 */
Auth::routes([
  'login' => true,
  'logout' => true,
  'register' => false,
  'reset' => false,
  'confirm' => true,
  'verify' => false,
]);
