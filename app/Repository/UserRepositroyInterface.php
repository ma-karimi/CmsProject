<?php


namespace App\Repository;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;

interface UserRepositroyInterface
{
    public function all();

    public function update(User $user,array $array);
}
