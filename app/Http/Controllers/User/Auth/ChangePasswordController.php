<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserChangePasswordRequest;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ChangePasswordController extends Controller
{
    public function create()
    {
        return view('user.auth.passwords.change-password');
    }

    public function store(UserChangePasswordRequest $request)
    {
        if (Hash::check($request->current_password, Auth::user()->password)) {
            $user = UserModel::findOrfail(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
        }
        if ($user) {
            return redirect()->route('user.home')->with(['success' => 'Change successfully']);
        }
        return redirect()->route('user.change.password')->with(['error' => 'An error occurred, please try again later']);

    }
}
