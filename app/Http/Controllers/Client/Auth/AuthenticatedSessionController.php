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

    if (Auth::guard('client')->attempt($credentials)) {
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

}
