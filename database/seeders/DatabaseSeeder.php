<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\AddressMethod;
use App\Models\Book;
use App\Models\City;
use App\Models\Factor;
use App\Models\Writer;
use Database\Factories\AddressMethodFactory;
use Database\Factories\WriterFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Arr;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
         $this->call(CategorySeeder::class);

         User::factory(10)->create()->each(function ($user){

                $user->wallet()->create([
                    'balance' => random_int(10000,1500000),
                ]);

         });

        Writer::factory()->count(20)->create();

         Book::factory(50)->create()->each(function ($book){

             $book->images()->create([
                 'book_id' => $book->id,
                 'type'    => Arr::random(['type_one','type_two','type_tree']),
                 'url'     => Arr::random(['d'.rand(1,15),'aut'.rand(1,20)]),
             ]);

         });

        $this->call(CitySeeder::class);

         Address::factory(30)->create();

         AddressMethod::factory(5)->create();

         Factor::factory(10)->create()->each(function ($factor){

             $factor->orders()->create([
                 'factor_id' => $factor->id,
                 'book_id'   => Book::inRandomOrder()->first()->id,
                 'count'     => rand(1,3),
                 'updated_at' =>  now()->subMinutes(rand(0, 86400))
             ]);

             $factor->transaction()->create([
                 'factor_id' => $factor->id,
                 'subtotal'  => random_int(10000,20000),
                 'status'    => Arr::random(['REGISTERED','PAID','FAILED']),
             ]);

         });

    }
}
