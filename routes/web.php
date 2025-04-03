<?php

use App\Http\Livewire\TaskManager;
use App\Http\Livewire\Categorie;
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


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', TaskManager::class)->name('taskmanager');
    Route::get('categorie', Categorie::class)->name('categorie');
    Route::get('/dashboard', TaskManager::class)->name('dashboard');
    Route::get('/pdf', [TaskManager::class, 'exportPDF'])->name('taskmanager.pdf');
});

/*
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
    ])->group(function () {
    Route::get('/', TaskManager::class)->name('taskmanager');
    Route::get('/dashboard', TaskManager::class)->name('dashboard');
   
}); */


