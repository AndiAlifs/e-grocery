<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            $data = [
                'item_name' => 'Item ' . $i,
                'item_desc' => 1000,
                'price' => rand(10,3)*1000,
            ];
            Item::create($data);
        }

    }
}
