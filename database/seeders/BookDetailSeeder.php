<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BookDetail;

class BookDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookDetail::create([
            'isbn' => 2022081,
            'image' => 'https://img.url',
            'title' => 'Java Developer',
            'author' => 'eko',
            'publisher' => 'Programmer zaman now',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, beatae.',
            'price' => 100000,
            'stock' => 10,
            'donatur' => 'Jaka Hermawan',
            'category_id' => 1,
        ]);

        BookDetail::create([
            'isbn' => 2022082,
            'image' => 'https://img.url',
            'title' => 'Web Developer',
            'author' => 'eko',
            'publisher' => 'Programmer zaman now',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, beatae.',
            'price' => 100000,
            'stock' => 10,
            'donatur' => 'Jaka Hermawan',
            'category_id' => 2,
        ]);
    }
}
