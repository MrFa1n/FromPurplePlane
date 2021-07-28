@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Home page</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('books.create') }}"> Add new book</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Author</th>
            <th>Description</th>
            <th>Cover</th>
            <th>Release date</th>
        </tr>
        @foreach ($books as $book)
        <tr>
            <td>{{ $book->name }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->description }}</td>
            <td>{{ $book->cover }}</td>
            <td>{{ $book->release_date }}</td>
            <td>
                <a class="btn btn-primary" href="{{ route('books.edit',$book->id) }}">Edit</a>
                <form action="{{ route('books.destroy', $book->id) }}" method="POST">
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection