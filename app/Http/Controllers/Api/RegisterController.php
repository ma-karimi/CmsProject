<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Jobs\SendWelcomeMailJob;
use App\Models\User;
use App\Repository\AuthRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * @var AuthRepositoryInterface
     */
    private $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register(RegisterRequest $request)
    {
        $operation = true;
        $validation= $request->validated();
        $this->authRepository->register($request, $validation, $operation);

        if ($operation == true) {
            return redirect()->route('users.dashboard');
        } else
            return redirect()->back()->with('error', 'مشـخصــات وارد شـده صـحیح نـیــست.');
    }
}
