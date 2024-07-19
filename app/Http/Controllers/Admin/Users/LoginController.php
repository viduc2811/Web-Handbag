<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index(){
        return view('admin.users.login');
    }

    public function store(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            $user = Auth::guard('admin')->user();
            if (!$user->isAdmin()) {
                Auth::guard('admin')->logout();
                return back()->withErrors([
                    'email' => 'Bạn không có quyền truy cập vào trang này.',
                ]);
            }

            // $request->session()->regenerate();
            return redirect()->route('admin.main'); 
        }
    
        return back()->withErrors([
            'email' => 'Email hoặc Password không chính xác',
        ]);
    }

    
}
