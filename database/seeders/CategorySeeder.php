<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['id' => 1,     'name' => 'تکنولوژی' ],
            ['id' => 2,     'name' => 'بین‌المللی' ],
            ['id' => 3,     'name' => 'مذهبی' ],
            ['id' => 4,     'name' => 'سیاسی' ],
            ['id' => 5,     'name' => 'اقتصادی' ],
            ['id' => 6,     'name' => 'متفرقه' ],
        ];

        Category::insert($categories);
    }
}
