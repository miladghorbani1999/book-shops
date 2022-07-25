<?php

namespace Database\Seeders;

use App\Models\ShippingMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shipping_methods = [
            ['name' => 'پست', 'cost' => '350_000'],
            ['name' => 'پیک', 'cost' => '200_000'],
            ['name' => 'تیباکس', 'cost' => '600_000'],
        ];

        ShippingMethod:insert($shipping_methods);
    }
}
