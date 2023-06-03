<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentOption;

class PaymentOptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $person = PaymentOption::create([
            'name' => 'Cash On Delivery',
            'status' => 1
        ]);
    }
}
