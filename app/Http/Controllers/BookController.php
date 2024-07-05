<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    protected $table = 'book';
    function showListBook()
    {
        $books = Books::get();
        return view('book.list', compact('books'));
    }

    function addBook()
    {
        return view('book.new');
    }

    function submitNewBook(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'isbn' => 'required|string|max:13',
            'description' => 'required|string',
            'genre' => 'required|string',
            'author' => 'required|string|max:255',
            'publication_year' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        } else {
            $imageName = 'default.jpg';
        }

        $book = new Books();
        $book->title = $request->title;
        $book->isbn = $request->isbn;
        $book->slug = Str::slug($request->input('title'), '-');
        $book->description = $request->description;
        $book->author = $request->author;
        $book->genre = $request->genre;
        $book->publication_year = $request->publication_year;
        $book->image = $imageName;
        $book->save();

        return redirect()->route('book.showListBook')->with('success', 'Book created successfully.');
    }

    function editBook($id)
    {
        $books = Books::findOrFail($id);
        return view('book.edit', compact('books'));
    }

    function updateBook(Request $request, $id)
    {
        $book = Books::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'isbn' => 'required|string|max:13',
            'description' => 'required|string',
            'genre' => 'required|string',
            'author' => 'required|string|max:255',
            'publication_year' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($book->image && $book->image != 'default.jpg') {
                $oldImagePath = public_path('images') . '/' . $book->image;
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $book->image = $imageName;
        }

        $book->title = $request->title;
        $book->isbn = $request->isbn;
        $book->slug = Str::slug($request->input('title'), '-');
        $book->description = $request->description;
        $book->author = $request->author;
        $book->genre = $request->genre;
        $book->publication_year = $request->publication_year;
        $book->image = $imageName;
        $book->update();

        return redirect()->route('book.showListBook')->with('success', 'Book edit successfully.');
    }

    function deleteBook($id)
    {
        $book = Books::find($id);
        if ($book) {
            if ($book->image && $book->image != 'default.jpg') {
                $imagePath = public_path('images') . '/' . $book->image;
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
            $book->delete();
            return redirect()->route('book.showListBook')->with('success', 'Book deleted successfully.');
        } else {
            return redirect()->route('book.showListBook')->with('error', 'Book not found.');
        }
    }
}