<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\DashboardController;
use App\Models\Product;

Route::get('/', function () {
    return view('welcome', ['products' => Product::paginate(15)]);
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/search', [ProductController::class, 'search'])->name('product.search');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('product', ProductController::class);

Route::post('/product/{product}/comments', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store')->middleware('auth');
Route::post('/order/create', [OrderController::class, 'store'])->name('order.create')->middleware('auth');

require __DIR__ . '/auth.php';
