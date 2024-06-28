<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class RegisterController extends Controller
{
    public function index()
    {
        return view('admin.users.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ], [
            
            'max' => [
                'string' => 'Email không vượt quá :max ký tự',
            ],
            'email' => 'Vui lòng nhập Email hợp lệ',
            'unique' => 'Email đã được sử dụng',
            'confirmed' => 'Xác nhận mật khẩu không khớp',
            'min' => [
                'string' => 'Mật khẩu phải có ít nhất :min ký tự',
            ],
        ]);
        
        

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Đăng ký tài khoản thành công!');
    }
}
