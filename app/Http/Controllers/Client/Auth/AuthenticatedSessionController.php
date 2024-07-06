<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('client.auth.login');
    }

    public function store(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        if (Auth::user()->isClient()) {
            $request->session()->regenerate(); // Regenerate session để ngăn chặn session fixation attacks

            return redirect()->route('home'); // Chuyển hướng đến route 'home' sau khi đăng nhập thành công
        }

        // Nếu người dùng không phải là client, đăng xuất và báo lỗi
        Auth::logout();
        return back()->withErrors([
            'email' => 'Vui lòng đăng nhập',
        ]);
    }
    return back()->withErrors([
        'email' => 'Email hoặc Password không chính xác',
    ]);
}

    public function destroy()
    {
        Auth::guard('client')->logout(); 
        request()->session()->invalidate(); 
        request()->session()->regenerateToken(); 

        return redirect()->route('client.login');

    }

}
