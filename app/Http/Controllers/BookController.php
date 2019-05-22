<?php

namespace App\Http\Controllers;

use App\Autor;
use App\Book;
use App\Order;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Book::search($request->get('search'))->with('autors')->paginate();

        return view('books.index', [
            'items' => $data,
            'active_page' => 'books.index'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $autors = Autor::all()->pluck('name', 'id');
        return view('books.edit', [
            'autors' => $autors,
            'active_page' => 'books.create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $book = Book::create([
            'name' => $request->get('name'),
            'description' => $request->get('description')
        ]);

        return redirect()->route('books.edit', [$book]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return redirect(route('books.edit', [
            'items' => $book,
            'active_page' => 'books.index'
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $autors = $book->autors->pluck('name', 'id');
        return view('books.edit', [
            'active_page' => 'books.edit',
            'autors' => $autors,
            'item' => $book,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //$order = Order::find($book);
        $book->update([
            'name' => $request->get('name'),
            'description' => $request->get('description')
        ]);

        return redirect()->route('books.edit', [$book]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
