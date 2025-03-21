<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisisterdUserController;
use App\Http\Controllers\SessionController;


Route::get('/', function () {
    return view('index');
});

Route::get('/todo', function () {
    return view('todo');
});

Route::get('/blog', [PostsController::class, "index"]);



Route::middleware('auth')->group(function () {
    Route::get('/items/create', [ItemController::class, 'create']);
    Route::post('/items', [ItemController::class, 'store']);

    Route::get('/update/{item}', [Itemcontroller::class, 'show'])->name('items.update');
    Route::post('/update/{item}', [ItemController::class, 'update'])->name('item.update');


    Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');
    Route::patch('/items/{item}/done', [ItemController::class, 'done'])->name('items.done');
    Route::delete('/items/{item}/delete', [ItemController::class, 'delete'])->name('items.delete');

    Route::get('/items', [ItemController::class, 'index'])->name('items.index');

    Route::get("/blog/create", [PostsController::class, 'create']);
    Route::post("/blog", [PostsController::class, 'store']);
});


Route::middleware('guest')->group(
    function () {
        Route::get('/register', [RegisisterdUserController::class, 'create']);
        Route::post('/register', [RegisisterdUserController::class, 'store']);

        Route::get('/login', [SessionController::class, 'create']);
        Route::post("/login", [SessionController::class, "store"]);
    }
);
