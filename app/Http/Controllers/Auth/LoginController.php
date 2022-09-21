<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Role;
use App\Models\User;

class LoginController extends Controller
{
    public function main()
    {
        $data['title'] = 'Login';
        return view('auth.login', $data);
    }

    public function store(Request $request)
    {
        $c = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:255'
        ]);

        if(Auth::attempt($c)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login failed!');
    }
}
