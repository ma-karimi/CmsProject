<?php

namespace App\Http\Controllers\Authenticate;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthNumberRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function authNum(AuthNumberRequest $request)
    {
        $number = $request->get('number');
        session()->put('number',$number);
        if(User::where('number',$number)->exists()){
            return view('auth.getPass');
        }else{
            $verify_code = rand(10000,99999);
            return view('auth.verifyNumber',compact('verify_code', $verify_code));
        }
    }

    public function Login(Request $request)
    {
        $pass = $request->get('password');
        $number = session('number');

        if (Auth::attempt(['number' => $number , 'password' => $pass]))
            return redirect()->route('panel.dashboard'); //todo:redirect to dashboard
        else
            return redirect()->back()->with('error', 'مشـخصــات وارد شـده صـحیح نـیــست.');
    }

    public function logout()
    {

        if (\auth()->check())
            \auth()->logout();
        return redirect()->route('/');
    }
}


