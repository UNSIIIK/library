<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('authors', [AuthorController::class, 'index']);
Route::get('author-new', [AuthorController::class, 'addNewAuthor']);
Route::post('author-store', [AuthorController::class, 'saveNewAuthor']);
Route::get('author-edit/{id}', [AuthorController::class, 'editAuthor']);
Route::post('author-update', [AuthorController::class, 'updateAuthor']);
