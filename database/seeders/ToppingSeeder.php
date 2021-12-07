<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Topping;

class ToppingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Topping::create([
            'name' => 'Pepperoni',
            'quantity' => 100,
            'price' => 1,
            'image' => '',
        ]);
        
        Topping::create([
            'name' => 'meatballs',
            'quantity' => 100,
            'price' => 1,
            'image' => '',
        ]);
    }
}
