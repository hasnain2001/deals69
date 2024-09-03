<?php
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NetworksController;
use App\Http\Controllers\StoresController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('master');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/term_and_condition', function () {
    return view('term_and_condition');
})->name('term_and_condition');




// Route for the contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Route for search
Route::get('/search', [SearchController::class, 'searchResults'])->name('searchResults');







Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/stores', 'stores')->name('stores');
    Route::get('/stores/{slug}', 'StoreDetails')->name('store_details');
    Route::get('/coupons', 'coupon')->name('coupons');
    Route::get('/categories', 'categories')->name('categories');
    Route::get('/related_categories/{title}', 'RelatedCategoryStores')->name('related_category');
Route::get('/blog',  'blog_home')->name('blog');
Route::get('/blog/{slug}', 'blog_show')->name('blog-details');
});

// Coupons Routes Begin
Route::get('coupons', [CouponsController::class, 'index'])->name('coupons.index');
Route::post('/update-clicks', [CouponsController::class, 'updateClicks'])->name('update.clicks');
Route::get('/clicks/{couponId}', [CouponsController::class, 'openCoupon'])->name('open.coupon');

Route::get('/coupons', [CouponsController::class, 'index'])->name('coupons');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::controller(ProfileController::class)->prefix('admin')->group(function (){
    Route::get('/profile', 'edit')->name('profile.edit');
    Route::patch('/profile', 'update')->name('profile.update');
    Route::delete('/profile', 'destroy')->name('profile.destroy');

});


    Route::controller(DemoController::class)->prefix('admin')->group(function () {
    Route::get('/Blog',  'blog')->name('admin.blog');
    Route::get('/Blog/create',  'create')->name('admin.blog.create');
    Route::post('/Blog/store', 'store')->name('admin.blog.store');
    Route::get('/Blog/{id}/edit', 'edit')->name('admin.blog.edit');
    Route::post('/Blog/update/{id}',  'update')->name('admin.Blog.update');
    Route::delete('/Blog/{id}',  'destroy')->name('admin.blog.delete');
    Route::post('/blog/deleteSelected',  'deleteSelected')->name('admin.blog.deleteSelected');
    Route::delete('/blog/bulk-delete',  'deleteSelected')->name('admin.blog.bulkDelete');

});


// Stores Routes Begin
Route::controller(StoresController::class)->prefix('admin')->group(function () {
    Route::get('/store', 'store')->name('admin.store');
    Route::get('/store/create', 'create_store')->name('admin.store.create');
    Route::post('/store/store', 'store_store')->name('admin.store.store');
    Route::get('/store/edit/{id}', 'edit_store')->name('admin.store.edit');
    Route::post('/store/update/{id}', 'update_store')->name('admin.store.update');
    Route::get('/store/delete/{id}', 'delete_store')->name('admin.store.delete');
     Route::post('/store/deleteSelected', 'deleteSelected')->name('admin.store.deleteSelected');
});


// Categories Routes Begin
Route::controller(CategoriesController::class)->prefix('admin')->group(function () {
    Route::get('/category', 'category')->name('admin.category');
    Route::get('/category/create', 'create_category')->name('admin.category.create');
    Route::post('/category/store', 'store_category')->name('admin.category.store');
    Route::get('/category/edit/{id}', 'edit_category')->name('admin.category.edit');
    Route::post('/category/update/{id}', 'update_category')->name('admin.category.update');
    Route::get('/category/delete/{id}', 'delete_category')->name('admin.category.delete');
 Route::post('/category/deleteSelected', 'deleteSelected')->name('admin.category.deleteSelected');
});

// Networks Routes Begin
Route::controller(NetworksController::class)->prefix('admin')->group(function () {
    Route::get('/network', 'network')->name('admin.network');
    Route::get('/network/create', 'create_network')->name('admin.network.create');
    Route::post('/network/store', 'store_network')->name('admin.network.store');
    Route::get('/network/edit/{id}', 'edit_network')->name('admin.network.edit');
    Route::post('/network/update/{id}', 'update_network')->name('admin.network.update');
    Route::get('/network/delete/{id}', 'delete_network')->name('admin.network.delete');
});




Route::controller(CouponsController::class)->prefix('admin')->group(function () {
    Route::get('/coupon', 'coupon')->name('admin.coupon');
    Route::get('/coupon/create', 'create_coupon')->name('admin.coupon.create');
    Route::post('/coupon/store', 'store_coupon')->name('admin.coupon.store');
    Route::get('/coupon/edit/{id}', 'edit_coupon')->name('admin.coupon.edit');
    Route::post('/coupon/update/{id}', 'update_coupon')->name('admin.coupon.update');
    Route::get('/coupon/delete/{id}', 'delete_coupon')->name('admin.coupon.delete');
    Route::post('/custom-sortable', 'update')->name('custom-sortable');
    Route::post('/coupon/deleteSelected', 'deleteSelected')->name('admin.coupon.deleteSelected');

});
});
require __DIR__.'/auth.php';
