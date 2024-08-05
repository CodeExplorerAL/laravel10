<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'published_year' => 'required|integer',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index');
    }

    public function show($id)
    {
        $book = Book::find($id);
        return view('books.show', compact('book'));
    }

    public function edit($id)
    {
        $book = Book::find($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        // 驗證請求參數
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'published_year' => 'required|integer',
            'version' => 'required|integer', // 要求版本參數
        ]);

        // 查找指定的書籍
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        // 模擬延遲操作
        sleep(5); // 延遲5秒，這會模擬處理請求的時間

        // 檢查版本號是否匹配
        if ($book->version != $request->version) {
            // 如果版本號不匹配，返回409錯誤
            return response()->json(['message' => 'Conflict detected'], 409);
        }

        // 更新書籍資訊，排除 version 欄位
        $book->update($request->except('version'));

        // 增加版本號
        $book->increment('version');

        // 重定向到書籍列表頁
        return redirect()->route('books.index');
    }


    public function destroy($id)
    {
        Book::destroy($id);
        return redirect()->route('books.index');
    }
}
