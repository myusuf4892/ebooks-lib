<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Blog;
use App\Models\User;

class UserController extends Controller
{

    public function profile($id)
    {
        $title = 'Profile';
        $blog = Blog::first();
        $user = User::find($id);
        $donatur = 2;
        return view('pages.profile', compact(
            'blog',
            'donatur',
            'title',
            'user'
        ));
    }

    public function update(Request $request, $id)
    {
        $c = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);

        $user = User::find($id);
        $user->update($c);

        return back()->with('success', 'Update success!');
    }

    public function upgrade(Request $request, $id)
    {
        $c = $request->validate([
            'role_id' => 'required',
            'status' => 'verification'
        ]);

        $user = User::find($id);
        $user->update($c);

        return back()->with('success', 'Upgrade account has been success!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
