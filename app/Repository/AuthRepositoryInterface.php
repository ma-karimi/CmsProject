<?php


namespace App\Repository;


interface AuthRepositoryInterface
{
    public function checkNumber($request,$verify_code);
    public function login($request, $login);
    public function logout();
    public function register($request, $validation, $operation);
}
