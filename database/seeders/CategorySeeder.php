<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Java programming',
            'slug' => 'java-programming'
        ]);

        Category::create([
            'name' => 'Web programming',
            'slug' => 'web-programming'
        ]);
    }
}
