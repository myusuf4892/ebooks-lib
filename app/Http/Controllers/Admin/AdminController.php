<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function main()
    {
        $data['title'] = 'Dashboard';
        $dataUser = DB::table('users')->get();
        $countUser = $dataUser->count();
        return view('admin.index', compact(
            'dataUser',
            'countUser'
        ));
    }
}
