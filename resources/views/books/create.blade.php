@extends('layouts.app')

@section('content')
<h1>Add New Book</h1>
<form action="{{ route('books.store') }}" method="POST">
  @csrf
  <label for="title">Title</label>
  <input type="text" name="title" id="title" value="{{ old('title') }}">
  @error('title')
  <div>{{ $message }}</div>
  @enderror

  <label for="author">Author</label>
  <input type="text" name="author" id="author" value="{{ old('author') }}">
  @error('author')
  <div>{{ $message }}</div>
  @enderror

  <label for="published_year">Published Year</label>
  <input type="number" name="published_year" id="published_year" value="{{ old('published_year') }}">
  @error('published_year')
  <div>{{ $message }}</div>
  @enderror

  <button type="submit">Save</button>
</form>
@endsection