<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/book', [BookController::class, 'showListBook'])->name('book.showListBook');
Route::get('/book/new', [BookController::class, 'addbook'])->name('book.new');
Route::post('/book/submitNewBook', [BookController::class, 'submitNewBook'])->name('book.submitNewBook');
Route::get('/book/edit/{id}', [BookController::class, 'editBook'])->name('book.editBook');
Route::post('/book/update/{id}', [BookController::class, 'updateBook'])->name('book.updateBook');
Route::delete('/book/delete/{id}', [BookController::class, 'deleteBook'])->name('book.deleteBook');