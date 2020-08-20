<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function __construct(){
        //为控制器所有方法提供中间件
//        $this->middleware('token');
        //只对该方法生效
//        $this->middleware('token')->only(['show', 'index']);
    }

    public function show(Request $request, $id){
//        return view('user.profile', ['user' => User::findOrFail($id)]);
//        $path = $request->path();  // 获取请求路径 /user/*
//        if($request->is('user/*')){
//            return '是user路由';
//        }
        // 不包含查询字符串
        $url = $request->url();
        // 包含查询字符串
        $url_with_query = $request->fullUrl();
//        return $url;
//
//        $method = $request->method();
//        if($request->isMethod('get')){
//            return 'get方法';
//        }
        //获取全部参数
        $input = $request->all();
        //[
        //    "token" => "xueyuanjun.com",
        //    "name" => "学院君"
        //]
        //
//        return $input;
//        $name = $request->input('name', '学院君');
//        // 学院君
//        if($request->has(['name', 'token'])){
//            return $name;
//        }else{
//            return '无name参数或token参数';
//        }
        $value = $request->cookie('name');


    }

    /**
     * 存储新用户
     * @param Request $request
     */
    public function store(Request $request){
        $name = $request->input('name');
    }

    public function uploadFile(Request $request){
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $photo = $request->file('photo');
            $extension = $photo->extension();
            //$store_result = $photo->store('photo');
            $store_result = $photo->storeAs('photo', 'test.jpg');
            $output = [
                'extension' => $extension,
                'store_result' => $store_result
            ];
            print_r($output);exit();
        }
        exit('未获取到上传文件或上传过程出错');
//        $file = $request->file('photo');
//        return view('user.upload', ['fileName' => 'img1']);
    }
}
