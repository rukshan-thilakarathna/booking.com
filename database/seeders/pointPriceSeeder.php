<?php

namespace Database\Seeders;


use App\Models\PointPrice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class pointPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PointPrice::create([
            'point_count' => '1',
            'price' => '1',
            'currency' => 'USD'
        ]);
    }
}
