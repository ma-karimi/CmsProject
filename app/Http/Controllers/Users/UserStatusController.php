<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserStatusController extends Controller
{

    public function status(Request $request, User $user)
    {
        $user->update([
            'status' => $request->status,
        ]);
        return redirect()->back()
            ->with('status', __('وضـعیت کاربـر با موفقـیت تغـییر کرد.'));
    }

    public function roles(Request $request, User $user)
    {
        $user->syncRoles($request->role);
        return redirect()->back()
            ->with('status', __('نـقـــش کاربـر با موفقـیت تغـییر کرد.'));
    }

    public function permissions(Request $request, User $user)
    {
        $user->syncPermissions($request->permission);
        return redirect()->back()
            ->with('status', __('دستـرسی کاربـر با موفقـیت تغـییر کرد.'));
    }
}
