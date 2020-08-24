<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller
{
    //
    public function update(Request $request){
        // 获取当前认证用户...
        $user = Auth::user();

        // 获取当前认证用户的ID...
        $id = Auth::id();
//        $request->user();
        return Auth::user();
    }
}
