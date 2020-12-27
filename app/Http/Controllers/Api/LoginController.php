<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthNumberRequest;
use App\Models\User;
use App\Repository\AuthRepositoryInterface;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * @var AuthRepositoryInterface
     */
    private $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function checkNumber(AuthNumberRequest $request)
    {
        $verify_code = 1;
        $this->authRepository->checkNumber($request, $verify_code);

        if ($verify_code == 1) {
            return redirect()->route('getPassword');
        } else {
            return view('auth.verifyNumber', compact('verify_code', $verify_code));
        }
    }


    public function login(Request $request)
    {
        $login = true;
        $user = $this->authRepository->login($request, $login);

        if ($login == true){
            return response()->json([
                'status' => 200,
                'message' => 'you are login successfully',
                'data' => $user->toArray(),
            ]);
        }
        else
            return response()->json([
                'status' => 404,
                'message' => 'inserted number and password is not true',
                'data' => null
            ]);
    }

    public function logout()
    {
        return redirect()->route('/');
    }
}
