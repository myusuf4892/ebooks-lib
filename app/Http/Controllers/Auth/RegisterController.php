<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function main()
    {
        $data['title'] = 'Registration Form';
        $data['roleUser'] = 3;
        $data['status'] = 'active';
        return view('auth.register', $data);
    }

    public function donatur()
    {
        $data['title'] = 'Registration Donatur Form';
        $data['roleDonatur'] = 2;
        $data['status'] = 'verification';
        return view('auth.donatur', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|max:14',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:255',
            'status' => 'required',
            'role_id' => 'required',
        ]);

        $user = new User([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status,
            'role_id' => $request->role_id,
        ]);

        $user->save();
        return redirect('/login')->with('success', 'Registration success');
    }
}
