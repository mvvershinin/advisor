<?php

use App\Autor;
use App\Book;
use Illuminate\Database\Seeder;

class AutorBookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = Book::all();

        foreach ($books as $book) {
            for($j = 0; $j < random_int(1,5); $j++){
                $autor = Autor::inRandomOrder()->first();
                $book->autors()->attach($autor->id);
            }
        }
    }
}
