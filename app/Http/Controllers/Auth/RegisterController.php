<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Jobs\SendWelcomeMailJob;
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
        $user = User::create($request->validated())
            ->assignRole('user')
            ->givePermissionTo('guest');
        SendWelcomeMailJob::dispatch($user)->delay(10);

        if (Auth::attempt(['email' => $user->email, 'password' => $request->get('password')])) {
            return redirect()->route('users.dashboard'); //todo:redirect to dashboard
        } else
            return redirect()->back()->with('error', 'مشـخصــات وارد شـده صـحیح نـیــست.');
    }
}
