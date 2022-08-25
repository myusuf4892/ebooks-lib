<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lent;
use Carbon\Carbon;

class LentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now()->format('Y-m-d H:i:s');
        $due = Carbon::now()->addDays(3);

        Lent::create([
            'lent_at' => $date,
            'due_at' => $due,
            'return_at' => null,
            'price' => 100000,
            'status' => 'paid',
            'amercement' => 0,
            'user_id' => 3,
            'book_id' => 1
        ]);

        Lent::create([
            'lent_at' => $date,
            'due_at' => $due,
            'return_at' => null,
            'price' => 100000,
            'status' => 'paid',
            'amercement' => 0,
            'user_id' => 4,
            'book_id' => 2
        ]);
    }
}
