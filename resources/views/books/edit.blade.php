@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div  class="col-lg-6">
                <form action="{{ route('books.update', [$item ?? null]) }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="name">name:</label>
                        <input type="text" class="form-control" name="name" value="{{ $item->name ?? null }}">
                    </div>
                    <div class="form-group">
                        <label for="description">description:</label>
                        <input type="text" class="form-control" name="description" value="{{ $item->description ?? null }}">
                    </div>
                    <div class="form-group">
                        <label for="description">autors: {{ $item->autors_list ?? null }}</label>
                        <select multiple class="form-control" id="autors">
                        @foreach($autors as $key => $autor)
                            <option value="autors[{{ $key }}]">{{ $autor }}</option>
                        @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-default">Save</button>
                </form>
            </div>
        </div>
    </div>



@endsection
