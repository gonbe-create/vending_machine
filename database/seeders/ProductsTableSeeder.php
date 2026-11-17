<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'コーラ',
                'price' => 130,
                'stock' => 10,
                'comment' => '爽快な炭酸飲料です。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'お茶',
                'price' => 130,
                'stock' => 6,
                'comment' => 'すっきりとした味わいです。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'=> '水',
                'price' => 110,
                'stock' => 6,
                'comment' => '天然水です。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
