<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\TeamMember\TeamMemberController;
use App\Http\Controllers\User\PageController;
use App\Http\Controllers\User\ReviewController;
use Illuminate\Support\Facades\Route;


Route::get('/', HomeController::class)->name('home');
Route::get('/products',[PageController::class,'products'])->name('products');
Route::get('/product/{product}',[PageController::class,'show'])->name('product.show');
Route::get('/about',[PageController::class,'about'])->name('about');
Route::get('/contact',[PageController::class,'contact'])->name('contact');

// Only for admin
Route::prefix('admin')->middleware(['auth', 'verified','admin'])->group(function() {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::resource('/products',ProductController::class);
    Route::resource('/team-members',TeamMemberController::class);
    Route::resource('/partners',PartnerController::class);
});
Route::get('/dashboard',function(){
    return to_route('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::resource('/carts',CartController::class);
    Route::post('/add-reviews/{product}',[ReviewController::class,'add_review'])->name('add_review');
    Route::post('/add-cart/{product}',[CartController::class,'addCart'])->name('add-cart');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/redirect',RedirectController::class);
});

require __DIR__.'/auth.php';
