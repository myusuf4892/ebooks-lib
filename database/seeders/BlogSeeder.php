<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog::create([
            'brand' => 'Tveloper',
            'linkedIn' => 'https://linkedIn.id',
            'contact' => '085775088586',
            'created_by' => 'https://tveloper.id/we'
        ]);
    }
}
