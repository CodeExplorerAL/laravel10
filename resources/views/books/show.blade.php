@extends('layouts.app')

@section('content')
<h1>{{ $book->title }}</h1>
<p><strong>Author:</strong> {{ $book->author }}</p>
<p><strong>Published Year:</strong> {{ $book->published_year }}</p>

<a href="{{ route('books.edit', $book->id) }}">Edit</a>

<form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
  @csrf
  @method('DELETE')
  <button type="submit">Delete</button>
</form>
<a href="{{ route('books.index') }}">Back to List</a>
@endsection