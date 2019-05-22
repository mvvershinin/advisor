<?php

use App\Book;
use Faker\Factory;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 200;

        for ($i = 0; $i < $limit; $i++) {
            Book::create([
                'name' => $faker->company .' ' .$faker->colorName,
                'description' => $faker->text,
            ]);
        }
    }
}
