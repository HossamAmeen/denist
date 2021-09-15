<?php

namespace App\Http\Controllers\DashBoard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AuthAdminController extends Controller
{
    public function login()
    {
        if($user = Auth::user())
            return redirect('admin/home');
        return view('auth.login');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect('admin');
    }
}
