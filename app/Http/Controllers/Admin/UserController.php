<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Description;

class UserController extends Controller
{

    public function index()
    {
//        $users = User::all();
        $users = User::simplePaginate(5);
        return view('admin.users.index')->withUsers($users);
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
        return view('admin.users.show')->withUser($user);
    }


    public function edit(User $user)
    {

    }


    public function update(Request $request, User $user)
    {
        //
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
