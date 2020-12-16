<?php

namespace App\Http\Controllers\Authenticate;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Jobs\SendWelcomeMailJob;
use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        SendWelcomeMailJob::dispatch($user)->delay(10);

        if (Auth::attempt(['email' => $user->email, 'password' => $request->get('password')])){
            return redirect()->route('users.dashboard'); //todo:redirect to dashboard
        }
        else
            return redirect()->back()->with('error', 'مشـخصــات وارد شـده صـحیح نـیــست.');
    }
}
