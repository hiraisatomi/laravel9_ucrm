<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Purchase;


class DatabaseSeeder extends Seeder
{
    // ダミーデータの登録
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ItemSeeder::class
        ]);

        \App\Models\Customer::factory(1000)->create();

        $items = \App\Models\Item::all();

        Purchase::factory(100)->create()
        ->each(function(Purchase $purchase) use ($items) {
            // 中間テーブルに情報登録(1〜3個の商品を、個数1〜5個でランダムに)
            $purchase->items()->attach(
                $items->random(rand(1,3))->pluck('id')->toArray(),
                [ 'quantity' => rand(1, 5) ]
            );
        });
    }
}
