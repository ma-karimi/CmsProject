<?php


namespace App\Repository;


use App\Jobs\SendWelcomeMailJob;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\True_;

class AuthRepository implements AuthRepositoryInterface
{

    public function checkNumber($request,$verify_code)
    {
        $number = $request->get('number');
        session()->put('number', $number);
        if (User::where('number', $number)->exists()) {
            return $verify_code == 1;
        } else {
            $verify_code = rand(10000, 99999);
            return $verify_code;
        }
    }

    public function login($request, $login)
    {
        $pass = $request->get('password');
        $number = session('number');
        $user = User::where('number', $number)->first();
        if (Hash::check($pass, $user->getAuthPassword())){
            Auth::login($user);
            return $login = true;
        }
        else
            return $login = false;
    }

    public function logout()
    {
        session()->forget('number');
        Auth::logout();
    }

    public function register($request, $validation, $operation)
    {
        $user = User::create($validation)
            ->assignRole('user')
            ->givePermissionTo('guest');
        SendWelcomeMailJob::dispatch($user)->delay(10);

        if (Auth::attempt(['email' => $user->email, 'password' => $request->get('password')])) {
            return $operation = true;
        } else
            return $operation = false;
    }
}
