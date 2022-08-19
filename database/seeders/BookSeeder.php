<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'isbn' => '2022080001',
            'image' => 'book1.jpeg',
            'title' => 'Java Developer',
            'author' => 'eko',
            'publisher' => 'Programmer zaman now',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, beatae.',
            'price' => 100000,
            'status' => 'verified',
            'stock' => 10,
            'user_id' => 2,
            'category_id' => 1,
        ]);

        Book::create([
            'isbn' => '2022080002',
            'image' => 'book2.jpg',
            'title' => 'Web Developer',
            'author' => 'eko',
            'publisher' => 'Programmer zaman now',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, beatae.',
            'price' => 100000,
            'stock' => 10,
            'status' => 'verified',
            'user_id' => 2,
            'category_id' => 2,
        ]);
    }
}
