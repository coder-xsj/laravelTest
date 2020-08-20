<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users/{user}', function (App\User $user){
    return $user->email;
});

Route::get('user/profile/{id}', function ($id){
    return view('user.profile', ['id' => $id]);
})->where('id', '[0-9]+');
// 频率限制 没调试好
Route::middleware('auth:api', 'throttle:10,1')->group(function () {
    Route::get('admin', function () {
        //
    });
});

// 文件上传
//Route::get('file/upload', 'UserController@uploadFile');
Route::post('file/upload', function(\Illuminate\Http\Request $request) {
    if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
        $photo = $request->file('photo');
        $extension = $photo->extension(); //扩展名
//        $store_result = $photo->store('photo');
        $store_result = $photo->storeAs('photo', 'test.jpg'); //文件路径
        $output = [
            'extension' => $extension,
            'store_result' => $store_result
        ];
        print_r($output);exit();
    }
    exit('未获取到上传文件或上传过程出错');
});




//Route::get('cookie/response', function (){
//    return response('hello world!', 200)
//        ->header('Content-Type','text/plain');
//});
Route::get('cookie/response', function() {
    Cookie::queue(Cookie::make('site', 'Laravel学院',1));
    Cookie::queue('author', '学院君', 1);
    return response('Hello Laravel', 200)
        ->header('Content-Type', 'text/plain');
});
