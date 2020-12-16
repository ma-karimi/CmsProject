<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserStatusController extends Controller
{

    public function __invoke(Request $request, User $user)
    {
        $user->update([
            'status' => !$user->status,
        ]);

        return redirect()->back()->with('status', __('وضـعیت کاربـر با موفقـیت تغـییر کرد.'));
    }
}
