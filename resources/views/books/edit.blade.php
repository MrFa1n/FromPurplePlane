@extends('layouts.app')
@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Book
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('books.update', $book->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Book name:</label>
              <input type="text" class="form-control" name="name" value="{{$book->name}}"/>
          </div>
          <div class="form-group">
              <label for="price">Book author :</label>
              <input type="text" class="form-control" name="author" value="{{$book->author}}"/>
          </div>
          <div class="form-group">
              <label for="quantity">Book description :</label>
              <input type="text" class="form-control" name="description" value="{{$book->description}}"/>
          </div>
          <div class="form-group">
              <label for="price">Book cover :</label>
              <input type="text" class="form-control" name="cover" value="{{$book->cover}}"/>
          </div>
          <div class="form-group">
              <label for="price">Book release date :</label>
              <input type="date" class="form-control" name="release_date" value="{{$book->release_date}}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update Book</button>
      </form>
  </div>
</div>
@endsection