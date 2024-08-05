<?php

namespace App\Contracts;

interface BookServiceInterface
{
  public function getAllBooks();
  public function createBook(array $data);
  public function getBookById($id);
  public function updateBook($id, array $data);
  public function deleteBook($id);
}
