<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\CraftController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\Kategori\kategoriController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::controller(BaseController::class)->group(function(){
    Route::get('/home','index')->name('index.home');
});

Route::controller(DataUserController::class)->group(function(){
    // Ini buat liat table data user
       Route::get('/data-user','index')->name('index.dataUser');
});
Route::controller(kategoriController::class)->group(function(){
    // Ini buat liat table kategori
       Route::get('/kategori','index')->name('index.categories');
       Route::post('/createcategori','createcategori')->name('create.categori');
       Route::put('/updatecategori/{id}','updatecategori')->name('update.categori');
       Route::delete('/deletecategori/{id}','deletecategori')->name('delete.categori');
});

Route::controller(ArtikelController::class)->group(function(){
    // Ini buat liat table data user
       Route::get('/artikel','index')->name('index.artikel');
       Route::get('/formartikel','formartikel')->name('form.artikel');
       Route::post('/createartikel','createartikel')->name('create.artikel');
       Route::get('/editartikel/{id}','editartikel')->name('edit.artikel');
       Route::put('/updateartikel/{id}','updateartikel')->name('update.artikel');
       Route::delete('/deleteartikel/{id}','deleteartikel')->name('delete.artikel');
});

Route::controller(CraftController::class)->group(function(){
    // Ini buat liat table data user
       Route::get('/craft','index')->name('index.craft');
       Route::get('/formcraft','formcraft')->name('form.craft');
       Route::post('/createcraft','createcraft')->name('create.craft');
       Route::get('/editcraft','editcraft')->name('edit.craft');
       Route::put('/updatecraft','updatecraft')->name('update.craft');
       Route::delete('/deletecraft/{id}','deletecraft')->name('delete.craft');
       Route::get('/filter','filter')->name('index.filter');
       Route::post('/createfilter','createfilter')->name('create.filter');
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
