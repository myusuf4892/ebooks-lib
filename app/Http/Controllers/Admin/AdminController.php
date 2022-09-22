<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

use App\Models\Blog;
use App\Models\Lent;
use App\Models\User;
use Carbon\Carbon;
use Image;

class AdminController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $dataUser = DB::table('users')->get();
        $amercement = Lent::withTrashed()->orderBy('amercement')->sum('amercement');
        $grossAmount = Lent::withTrashed()->orderBy('price')->sum('price') + $amercement;
        $netAmount = Lent::withTrashed()->where('payment_status', 'paid')->orderBy('price')->sum('price') + $amercement;

        $countUser = $dataUser->count();
        $blog = Blog::first();
        return view('admin.index', compact(
            'title',
            'dataUser',
            'countUser',
            'grossAmount',
            'netAmount',
            'blog'
        ));
    }

    public function profile($id)
    {
        $title = 'Admin | Profile';
        $blog = Blog::first();
        $user = User::find($id);

        return view('admin.partials.profile', compact(
            'title',
            'blog',
            'user'
        ));
    }

    public function updateProfile(Request $request, $id)
    {
        $c = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'avatar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $imgSize = File::size($request->file('avatar'));
        if ($imgSize == null) {
            $user = User::find($id);
            $c['avatar'] = $user->avatar;
        }
        if ($imgSize != null) {
            $image = $request->file('avatar');
            $imgName = '.' . Carbon::now()->format('YmdHis');
            $filename = $imgName.'.'.$image->extension();

            $destinationPath = public_path('images/avatar'.'/');
            $img = Image::make($image->path());
            $img->resize(183, 275, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->save($destinationPath . $filename);
            $user = User::find($id);
            if (File::exists($destinationPath . $user->avatar)) {
                File::delete($destinationPath . $user->avatar);
            }

            $c['avatar'] = $filename;
        }

        $data = User::find($id)->update($c);

        return back()->with('success', 'Profile has been updated!');
    }

    public function getUser()
    {
        $title = 'Admin | Users';
        $users = User::orderBy('updated_at', 'DESC')->paginate(10);
        $blog = Blog::first();

        return view('admin.users.index', compact(
            'title',
            'users',
            'blog'
        ));
    }

    public function userVerification(Request $request)
    {
        $c = $request->validate([
            'status' => 'required'
        ]);

        User::where('id', $request->user_id)->update($c);

        return redirect('/admin/users')->with('success', 'User has been Verified!');
    }

    public function editUser($id)
    {
        $title = 'Admin | Users';
        $user = User::where('id', $id)->first();
        $blog = Blog::first();

        return view('admin.users.edit', compact(
            'title',
            'user',
            'blog'
        ));
    }

    public function update(Request $request)
    {
        $c = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        User::where('id', $request->user_id)->update($c);

        return redirect('/admin/users')->with('success', 'success user updated!');
    }

    public function setting(Request $request, $id)
    {
        $c = $request->validate([
            'brand' => 'required',
            'linkedIn' => 'required',
            'contact' => 'required|nullable',
            'created_by' => 'required'
        ]);

        Blog::where('id', $id)->update($c);

        return redirect('/admin')->with('success', 'Setting has been Updated!');
    }
}
