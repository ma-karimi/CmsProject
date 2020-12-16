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
        session()->put('number', $number);
        if (User::where('number', $number)->exists()) {
            return redirect()->route('setPass'); 
        } else {
            $verify_code = rand(10000, 99999);
            return view('auth.verifyNumber', compact('verify_code', $verify_code));
        }
    }

    public function setPass()
    {
        return view('auth.getPass');
    }

    public function Login(Request $request)
    {
        $pass = $request->get('password');
        $number = session('number');
        $user = User::where('number', $number)->first();
        if (Hash::check($pass, $user->getAuthPassword())){
            Auth::login($user);
            if ($user->hasRole('admin')){
                return redirect()->route('admin.dashboard');
            }
            else
                return redirect()->route('users.dashboard');
        }
        else
            return redirect()->back()->with('error', 'مشـخصــات وارد شـده صـحیح نـیــست.');
    }

    public function logout()
    {
        session()->forget('number');

        Auth::logout();
        return redirect()->route('/');
    }
}


