<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ShowProfile extends Controller
{
    /**
     * Handle the incoming request.
     *
     * 展示给定用户的个人主页
     */
    public function __invoke($id)
    {
        //
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }
}
