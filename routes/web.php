<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\InertiaTestController;
use App\Http\Controllers\WordController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/inertia-test', function(){
    return Inertia::render('InertiaTest');
});
Route::get('/inertia/index', [InertiaTestController::class, 'index'])->name('inertia.index');
Route::get('/inertia/show/{id}', [InertiaTestController::class, 'show'])->name('inertia.show');

// Words
Route::get('/hello-world', function () {
    return Inertia::render('Words/HelloWorld');
});
Route::get('/tweet',[App\Http\Controllers\WordController::class, 'index'])->name('word.index');
Route::get('/word/search/{queryWord}',[App\Http\Controllers\WordController::class, 'search'])->name('word.search');
Route::post('/word/store',[App\Http\Controllers\WordController::class, 'store'])->name('word.store');
Route::delete('/word/delete/{id}',[App\Http\Controllers\WordController::class, 'destroy'])->name('word.delete');