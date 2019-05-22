@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div  class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>title</th>
                            <th>autors</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $book)
                            <tr>
                                <td> {{ $book->id }} </td>
                                <td>
                                    <a href="{{ route('books.edit', [$book]) }}">
                                        {{ $book->name }}
                                    </a>
                                </td>

                                <td> {{ $book->autors_list }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{ $items->render() }}
    </div>
@endsection
