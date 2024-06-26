<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('admin.users.login');
    }

    public function store(Request $request){
        $this->validate($request, [
            'email'=>'required|email:filter',
            'password'=>'required'
        ]);

        if(Auth::attempt([
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
            ])) {
            return redirect()->route('admin.main');
        }

        Session::flash('error','Email hoặc Password không chính xác!');
        return redirect()->back();
    }
}
