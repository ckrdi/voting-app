<?php

use App\Http\Controllers\IdeaController;
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

Route::get('/', [IdeaController::class, 'index'])->name('index');

// idea:slug in wildcard to show using sluggable
Route::get('/ideas/{idea:slug}', [IdeaController::class, 'show'])->name('show');

require __DIR__.'/auth.php';
