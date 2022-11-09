<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExameController;

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
Route::get('/', [ExameController::class, 'index']);
/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/prova/criar', [ExameController::class, 'criado'])->middleware('auth');
Route::get('/prova/realizar', [ExameController::class, 'realizado'])->middleware('auth');
Route::post('/prova', [ExameController::class, 'store']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
/*Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'role:estudante', 'prefix' => 'estudante', 'as' => '/'], function() {
        //Route::resource('/', \App\Http\Controllers\Estudantes\Actividades::class);
    });
   Route::group(['middleware' => 'role:professor', 'prefix' => 'professor', 'as' => '/'], function() {
       //Route::resource('/', \App\Http\Controllers\Professores\LecionarController::class);
   });
    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => '/'], function() {
       // Route::resource('/', \App\Http\Controllers\Admin\gestaoController::class);
    });
});*/
Route::middleware(['admin'])->group(function () {
    Route::get('admin', function () {
        return view('dashboard');
    });
});

Route::middleware(['estudante'])->group(function () {
    Route::get('estudante', function () {
        return view('dashboard');
    });
});

Route::middleware(['professor'])->group(function () {
    Route::get('professor', function () {
        return view('dashboard');
    });
});
