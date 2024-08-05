<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\BookServiceInterface;

class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookServiceInterface $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        $books = $this->bookService->getAllBooks();
        return response()->json($books);
    }

    public function store(Request $request)
    {
        $book = $this->bookService->createBook($request->all());
        return response()->json($book, 201);
    }

    public function show($id)
    {
        $book = $this->bookService->getBookById($id);
        return response()->json($book);
    }

    public function update(Request $request, $id)
    {
        $book = $this->bookService->updateBook($id, $request->all());
        return response()->json($book);
    }

    public function destroy($id)
    {
        $this->bookService->deleteBook($id);
        return response()->json(null, 204);
    }
}
