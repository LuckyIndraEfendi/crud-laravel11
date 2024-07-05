<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [BookController::class, 'showListBook'])->name('book.showListBook');
    Route::get('/book/new', [BookController::class, 'addbook'])->name('book.new');
    Route::post('/book/submitNewBook', [BookController::class, 'submitNewBook'])->name('book.submitNewBook');
    Route::get('/book/edit/{id}', [BookController::class, 'editBook'])->name('book.editBook');
    Route::post('/book/update/{id}', [BookController::class, 'updateBook'])->name('book.updateBook');
    Route::delete('/book/delete/{id}', [BookController::class, 'deleteBook'])->name('book.deleteBook');
});





require __DIR__ . '/auth.php';