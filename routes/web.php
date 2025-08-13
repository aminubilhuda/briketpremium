<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home']);
Route::get('/produk/{slug}', [PageController::class, 'productDetail'])->name('product.detail');
Route::post('/kontak', [PageController::class, 'submitContactForm'])->name('contact.submit');

Route::get('/ganti-bahasa/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'id'])) {
        abort(400);
    }
    session()->put('locale', $locale);
    return redirect()->back();
})->name('language.switch');
