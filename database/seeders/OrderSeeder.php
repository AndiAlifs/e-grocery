<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $account_id = User::find(1)->account_id;
        for ($i = 1; $i <= rand(5,9); $i++) {
            $item_id = rand(1, 10);
            $newOrder = [
                'account_id' => $account_id,
                'item_id' => $item_id,
                'price' => Item::find($item_id)->price
            ];
            Order::create($newOrder);
        }
    }
}
