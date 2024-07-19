<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class LoginUserController extends Controller
{
    public function create()
    {
        return view('client.login');
    }

    public function store(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::guard('client')->attempt($credentials)) {
        $user = Auth::guard('client')->user();
            if (!$user->isClient()) {
                Auth::guard('client')->logout();
                return back()->withErrors([
                    'email' => 'Bạn không thể đăng nhập với tài khoản này.',
                ]);
            }
        // $request->session()->regenerate();

        return redirect()->route('home'); 
    }

    return back()->withErrors([
        'email' => 'Email hoặc Password không chính xác',
    ]);
}

    public function destroy()
    {
        Auth::guard('client')->logout(); 
        // request()->session()->invalidate(); 
        // request()->session()->regenerateToken(); 

        return redirect()->route('client.login');

    }
    public function changePasswordForm($id)
    {
        $user = User::findOrFail($id);
        $title = 'Đổi mật khẩu';
        return view('client.change-password', compact('user', 'title'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|different:current_password',
            'new_password_confirmation' => 'required|same:new_password',
        ]);

        $user = Auth::guard('client')->user();

        // Kiểm tra mật khẩu hiện tại có đúng không
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Mật khẩu hiện tại không chính xác.');
        }

        // Đổi mật khẩu
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Đổi mật khẩu thành công.');
    }
}
