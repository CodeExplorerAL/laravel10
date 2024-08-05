<?php

namespace App\Services;

use App\Contracts\BookServiceInterface;
use App\Models\Book;

class BookService implements BookServiceInterface
{
  public function getAllBooks()
  {
    return Book::all();
  }

  public function createBook(array $data)
  {
    return Book::create($data);
  }

  public function getBookById($id)
  {
    return Book::findOrFail($id);
  }

  public function updateBook($id, array $data)
  {
    $book = Book::findOrFail($id);
    $book->update($data);
    return $book;
  }

  public function deleteBook($id)
  {
    $book = Book::findOrFail($id);
    $book->delete();
    return null;
  }
}
