<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdminLoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('front.home');
        }
        return view('dashboard.auth.login');
    }

    public function postLogin(AdminLoginRequest $request)
    {

        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"),
            'password' => $request->input("password")], $remember_me)) {
            return redirect()->route('front.home');
        }
        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
    }

    public function logout()
    {
        $guard = $this->getGaurd();
        $guard->logout();
        return redirect()->route('admin.login');
    }

    private function getGaurd()
    {
        return auth('admin');
    }
}
