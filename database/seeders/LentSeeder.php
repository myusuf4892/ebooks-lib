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
        $date = Carbon::now();
        $dateDue = Carbon::now()->addDays(3);

        Lent::create([
            'order_id' => 'Book-202208261148401',
            'lent_at' => $date,
            'due_at' => $dateDue,
            'return_at' => null,
            'price' => 100000,
            'status_returned' => 'still borrowed',
            'payment_status' => 'unpaid',
            'amercement' => 0,
            'province' => 'Banten',
            'city' => 'Kota Tangerang',
            'postal_code' => '15138',
            'street' => 'Jl Kecipir raya',
            'snap_token' => '53ffd5eb-3596-4f31-b220-ee1bd796c8a8',
            'user_id' => 3,
            'book_id' => 1,
        ]);
    }
}
