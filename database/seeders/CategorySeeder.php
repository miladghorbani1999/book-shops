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
            ['id' => 1, 'parent_id' => null,'name' => 'تکنولوژی'],
            ['id' => 2, 'parent_id' => null,'name' => 'بین‌المللی'],
            ['id' => 3, 'parent_id' => null,'name' => 'مذهبی'],
            ['id' => 4, 'parent_id' => null,'name' => 'سیاسی'],
            ['id' => 5, 'parent_id' => null,'name' => 'ورزشی'],
            ['id' => 6, 'parent_id' => null,'name' => 'متفرقه'],
            ['id' => 7, 'parent_id' => null, 'name' => 'اسپورت'],
            ['id' => 8, 'parent_id' => 7, 'name' => 'زیرمجموعه اسپورت'],
            ['id' => 9, 'parent_id' => 8, 'name' => 'زیرمجموعه اسپورت۲'],
            ['id' => 10, 'parent_id' => 9, 'name' => 'زیرمجموعه اسپورت3'],
        ];

        Category::insert($categories);
//        Category::factory()->count(100)->create();

    }
}
