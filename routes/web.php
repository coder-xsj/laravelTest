<?php

use Illuminate\Support\Facades\Route;

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

//中间件  没理解   现在理解了，first和second两个中间件应用下下面路由去了
//Route::middleware(['first', 'second'])->group(function () {
//    Route::get('/', function () {
//        // Uses first & second Middleware
//    });
//
//    Route::get('user/profile', function () {
//        // Uses first & second Middleware
//    });
//});

//Route::group(['middleware' => ['laravelTest']], function (){
//    Route::get('/', function (){
//       return view('welcome', ['website' => 'laravel']);
//    });
//    Route::view('/view', 'welcome', ['website' => 'laravel学院']);
//});

//Route::get('/', function (){
//})->middleware('token');

Route::get('/', function () {
    return view('welcome', ['website' => 'Laravel']);
});
//如果你的路由需要返回一个视图，可以使用 Route::view 方法
//这个方法也很方便，以至于你不需要在额外定义一个路由或控制器。
//Route::View('view', 'welcome', ['website' => 'Laravel学院']);
Route::get('hello', function (){
    return 'Hello, welcome larave--route';
});
// 路由重定向
Route::redirect('hello', 'bar', 301);
Route::match(['get', 'post'], 'foo', function (){
    return 'This is a request from get or post';
});

Route::any('bar', function (){
    return 'This is a request from any HTTP verb';
});

//路由参数
//1. 必选参数 UserController@show
Route::get('user/{id}', 'UserController@show'
    //$name 必须是字母且不能为空
)->where('id', '[0-9]+');  //正则约束
//2. 可选参数? 给默认值
// 另外知识命名路由url
Route::get('posts/{post}/comments/{comment?}', function ($post, $comment = '徐升进太帅了！'){
    echo route('comment.show', ['post' => $post, 'comment' => $comment ]);
//    return $post . ':' . $comment;
})->name('comment.show');

//正则约束
//Route::get('user/{name}', function ($name){
//    return 'name:' . $name;
//    //$name 必须是字母且不能为空
//})->where('name', '[A-Za-z]+');


//Route::get('user/{id}/{name}', function ($id, $name){
//    return 'User:' . $id . '<br>Name:' . $name;
//    // 同时指定 id 和 name 的数据格式
//})->where(['id' => '[0-9]+', 'name' => '[A-Za-z]+']);

//命名路由为生成 URL 或重定向提供了方便
Route::get('user/profile', function (){
    return 'my url:' . route('profile');
})->name('profile');

Route::get('redirect', function() {
    // 通过路由名称进行重定向
    return redirect()->route('profile');
});
// 生成路由
Route::get('user/{id}/profile', function ($id){
    $url = route('profile', ['id' => $id]);
    return $url;
})->name('profile');


//路由前缀
Route::prefix('admin')->group(function (){
    Route::get('users', function (){
        return '路由前缀admin';
    });
});

// 测试CSRF
Route::get('form_without_csrf_token', function (){
    return '<form method="POST" action="/hello_from_form"><button type="submit">提交</button></form>';
});
// 包含Csrf字段
Route::get('form_with_csrf_token', function () {
    return '<form method="POST" action="/hello_from_form">' . csrf_field() . '<button type="submit">提交</button></form>';
});


Route::post('hello_from_form', function (){
    return 'hello laravel!';
});

//资源路由
Route::resource('posts', 'PostController');

// index
Route::view('index', 'index', ['title' => '我的laravel项目', 'records' => '999']);

//演示cookie功能
Route::get('cookie/add', function (){
    $mintes = 24 * 60;
//    return response('欢迎访问学院君网站')->cookie(
//        'name', '徐升进', $mintes
//    );
    //和上面实现效果一样，多出一个cookie实例
    $cookie = cookie('name', '学院君', $mintes);
    return response('欢迎访问学院君')->cookie($cookie);
});

Route::get('cookie/get', function(\Illuminate\Http\Request $request) {
    $cookie = $request->cookie('name');
    dd($cookie);
});



