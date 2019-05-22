<?php

use App\Autor;
use Faker\Factory;
use Illuminate\Database\Seeder;

class AutorsTableSeeder extends Seeder
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
            Autor::create([
                'name' => $faker->lastName . ' ' . $faker->firstName,
            ]);
        }
    }
}
