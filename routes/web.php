<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SignController;
use App\Http\Controllers\OffresController;
use App\Http\Controllers\DemandesController;
use App\Http\Controllers\LogoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/demandes',[DemandesController::class,'index'])->name('demandes');
Route::post('/demandes',[DemandesController::class,'add_demande'])->name('demandes');
Route::get('/updatedemandes/{demande}',[DemandesController::class,'find_demande'])->name('finddemandes');
Route::put('/updatedemandes/{demande}',[DemandesController::class,'update_demande'])->name('updatedemandes');
Route::delete('/demandes/{demande}',[DemandesController::class,'delete_demande'])->name('demandes.destroy');

Route::get('/offres',[OffresController::class,'index'])->name('offres');
Route::post('/offres',[OffresController::class,'add_offre'])->name('add_offres');
Route::get('/offres/{type}',[OffresController::class,'afficheByType'])->name('computer');
Route::get('/updateoffre/{offre}',[OffresController::class,'find_offre'])->name('findoffres');
Route::put('/updateoffre/{offre}',[OffresController::class,'update_offre'])->name('updateoffres');
Route::delete('/offres/{offre}',[OffresController::class,'delete_offre'])->name('offre.destroy');

Route::get('/logout',[LogoutController::class,'store'])->name('logout');

Route::get('/sign_in',[SignController::class,'index'])->name('sign_in');
Route::post('/sign_in',[SignController::class,'store'])->name('sign_in');

Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'add_user'])->name('register');





// Route::get('/', function () {
//     return view('index');
// });
// Route::get('/sign_in',function(){
//     return view('sign_in');
// });
// Route::get('/offres',function(){
//     return view('offres');
// });
// Route::get('/demandes',function(){
//     return view('demandes');
// });
