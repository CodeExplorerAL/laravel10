@extends('layouts.app')

@section('content')
<h1>Books</h1>
<a href="{{ route('books.create') }}">Add a new book</a>
<ul>
  @foreach($books as $book)
  <li>
    <a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a>
    <a href="{{ route('books.edit', $book->id) }}">Edit</a>
    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
      @csrf
      @method('DELETE')
      <button type="submit">Delete</button>
    </form>
  </li>
  @endforeach
</ul>
@endsection