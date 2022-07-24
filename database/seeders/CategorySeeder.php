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
            ['parent_id' => null,'name' => 'تکنولوژی'],
            ['parent_id' => null,'name' => 'بین‌المللی'],
            ['parent_id' => null,'name' => 'مذهبی'],
            ['parent_id' => null,'name' => 'سیاسی'],
            ['parent_id' => null,'name' => 'ورزشی'],
            ['parent_id' => null,'name' => 'متفرقه'],
            ['parent_id' => null, 'name' => 'اسپورت'],
            ['parent_id' => 7, 'name' => 'زیرمجموعه اسپورت'],
            ['parent_id' => 8, 'name' => 'زیرمجموعه اسپورت۲'],
            ['parent_id' => 9, 'name' => 'زیرمجموعه اسپورت3'],
        ];

        Category::insert($categories);
//        Category::factory()->count(100)->create();

    }
}
