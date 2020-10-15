<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bids')->insert([
            [
                'description' => 'Разработаю калькулятор, портфолио можете посмотреть тут: www.example.com',
                'price' => '350200',
                'timelimit' => '5400',
                'executor_id' => 3,
                'order_id' => 1,
                'status' => 'submitted'
            ],
            [
                'description' => 'Разработаю калькулятор, портфолио можете посмотреть тут: www.example.com',
                'price' => '350200',
                'timelimit' => '5400',
                'executor_id' => 3,
                'order_id' => 2,
                'status' => 'submitted'
            ],
            [
                'description' => 'Разработаю калькулятор, портфолио можете посмотреть тут: www.example.com',
                'price' => '350200',
                'timelimit' => '5400',
                'executor_id' => 4,
                'order_id' => 3,
                'status' => 'submitted'
            ],
            [
                'description' => 'Разработаю калькулятор, портфолио можете посмотреть тут: www.example.com',
                'price' => '350200',
                'timelimit' => '5400',
                'executor_id' => 4,
                'order_id' => 2,
                'status' => 'submitted'
            ]
        ]);
    }
}
