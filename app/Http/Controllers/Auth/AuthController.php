<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if(Auth::check() === true){
            return redirect()->route('dashboard');
        }

        return view('auth.index');
    }

    public function home()
    {
        return view('admin.dashboard');
    }

    public function singin(Request $request)
    {
        if (in_array('', $request->only('email', 'password'))){
            return redirect()->back()->with('message', 'Ooops.. Informe todos os dados para efetuar o login');
        }

        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            return redirect()->back()->with('message', 'Ooops.. Informe um email válido');
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(!Auth::attempt($credentials)){
            return redirect()->back()->with('message', 'Ooops.. Usuário e senha não conferem');
        }

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}
