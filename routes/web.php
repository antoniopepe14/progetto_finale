<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RevisorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//!Route per la visualizzazione della pagina home
Route::get('/', [PublicController::class, 'home'])->name('home');


Route::get('/annuncio/crea',[ProductController::class,'create'])->name('products.create');

Route::get('/annuncio/dettaglio/{product}',[ProductController::class,'show'])->name('products.show');

Route::get('/annuncio/categoria/{category}', [ProductController::class,'filterByCategory'])->name('products.filterByCategory');

Route::get('/annunci', [ProductController::class, 'index'])->name('index');


//Rotta Dashboard
Route::get('/dashboard', [UserController::class, 'home'])->name('auth.dashboard');


//Rotta Home del revisore
Route::get('home/revisore', [RevisorController::class, 'index'] )-> middleware('isRevisor')->name('revisor.index');

//Rotta per accettare annuncio
Route::patch('annuncio/accetta/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.acceptAnnouncement');
//Rotta per rifiutare annuncio
Route::patch('annuncio/rifiuta/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.rejectAnnouncement');


//Rotta lavora con noi 
Route::get('/contattaci', [UserController::class,'form'])->middleware('auth')->name('auth.contact');
//Rotta lavora con noi 
Route::post('/contattaci-email', [UserController::class,'sendemail'])->name('auth.sendEmail');

//!Rotta rendi revisore un utente
Route::get('/rendiRevisore/{user}',[UserController::class,'makeRevisor'])->name('make.revisor');

// ricerca annuncio
Route::get('/ricerca/annuncio', [PublicController::class, 'searchProduct'])->name('products.search');

//Rotta Revisore Distruggi annunci 
Route::delete('/annuncio/cancella/{product}', [ProductController::class,'destroy'])->name('products.destroy');

//Rotta delle lingue

Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLanguage');