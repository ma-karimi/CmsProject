<?php

namespace App\Http\Controllers\Authenticate;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());

        if (Auth::attempt(['email' => $user->email, 'password' => $request->get('password')])){
            return redirect()->route('panel.index'); //todo:redirect to dashboard
        }
        else
            return redirect()->back()->with('error', 'مشـخصــات وارد شـده صـحیح نـیــست.');
    }
}
