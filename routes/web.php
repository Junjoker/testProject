<?php

use App\Http\Controllers\tacheController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [tacheController::class, "welcome"])->middleware(['auth'])->name('dashboard');
Route::get('/Ajouter-une-nouvelle-tache', [tacheController::class, "create"])->name('tache.create');
Route::post('/Ajouter-une-nouvelle-tache', [tacheController::class, "addTache"])->name('tache.add');
Route::get('/Mes-taches', [tacheController::class, "index"])->name('tache.index');
Route::get('/Taches-utilisateurs', [tacheController::class, "indexAdmin"])->name('tache.indexAdmin');
Route::get('/Mes-taches/{id}', [tacheController::class, "update"])->whereNumber('id')->name('tache.update');
Route::post('/Modification-tache', [tacheController::class, "addUpdateTache"])->name('tache.addUpdate');
Route::post('/Suppression-tache', [tacheController::class, "delete"])->name('tache.delete');


Route::get('/Users', [UserController::class, "index"])->middleware(['auth'])->name('user.index');
Route::post('/Suppression-user', [UserController::class, "delete"])->name('user.delete');

Route::get('/send-notification', [NotificationController::class, 'sendOfferNotification']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
