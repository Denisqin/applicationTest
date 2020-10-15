<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            [
                'name' => 'Приложение',
                'description' => 'Создать калькулятор, описание тут: www.example.com',
                'price' => '310240',
                'timelimit' => '7200',
                'customer_id' => 1,
                'status' => 'accepting',
                'accepting_end_at' => '2020-12-12'
            ],
            [
                'name' => 'Приложение',
                'description' => 'Создать калькулятор, описание тут: www.example.com',
                'price' => '310240',
                'timelimit' => '7200',
                'customer_id' => 2,
                'status' => 'accepting',
                'accepting_end_at' => '2020-12-12'
            ],
            [
                'name' => 'Приложение',
                'description' => 'Создать калькулятор, описание тут: www.example.com',
                'price' => '310240',
                'timelimit' => '7200',
                'customer_id' => 2,
                'status' => 'accepting',
                'accepting_end_at' => '2020-12-12'
            ]
        ]);
    }
}
