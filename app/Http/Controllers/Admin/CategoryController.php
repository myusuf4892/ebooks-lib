<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

use App\Models\Category;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $c = $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $data = new Category([
            'name' => $request->name,
            'slug' => $request->slug
        ]);

        $data->save();

        return redirect('/admin/books')->with('success', 'category has been created!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
