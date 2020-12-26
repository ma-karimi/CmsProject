<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditUserRequest;
use App\Models\User;
use App\Repository\UserRepositroyInterface;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * @var UserRepositroyInterface
     */
    private $userRepositroy;

    public function __construct(UserRepositroyInterface $userRepositroy)
    {
        $this->userRepositroy = $userRepositroy;
        $this->authorizeResource(User::class, 'user');
    }

    public function index()
    {
        $users = $this->userRepositroy->all();
        return view('users.users.index')->withUsers($users);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('users.users.show')
            ->withUser($user)
            ->withRoles($roles)
            ->withPermissions($permissions);
    }


    public function edit(User $user)
    {
        return view('users.users.edit')
            ->withUser($user);
    }


    public function update(EditUserRequest $request, User $user)
    {
        $array = $request->validated();
        $this->userRepositroy->update($user ,$array);
        return redirect()->route('users.dashboard');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
