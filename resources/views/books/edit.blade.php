@extends('layouts.app')

@section('content')
<h1>Edit Book</h1>
<form action="{{ route('books.update', $book->id) }}" method="POST">
  @csrf
  @method('PUT')

  <label for="title">Title</label>
  <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}">
  @error('title')
  <div>{{ $message }}</div>
  @enderror

  <label for="author">Author</label>
  <input type="text" name="author" id="author" value="{{ old('author', $book->author) }}">
  @error('author')
  <div>{{ $message }}</div>
  @enderror

  <label for="published_year">Published Year</label>
  <input type="number" name="published_year" id="published_year" value="{{ old('published_year', $book->published_year) }}">
  @error('published_year')
  <div>{{ $message }}</div>
  @enderror

  <button type="submit">Update</button>
</form>
@endsection