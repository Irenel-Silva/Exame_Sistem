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

Route::get('/prova/criar', [ExameController::class, 'criado'])->middleware('auth');
Route::get('/prova/realizar', [ExameController::class, 'realizado'])->middleware('auth');

Route::post('/prova', [ExameController::class, 'store']);
Route::get('/prova/{id}', [ExameController::class, 'pegar'])->middleware('auth');
Route::post('/prova/juntarPA/{id}', [ExameController::class, 'juntos'])->middleware('auth');



Route::get('/questionarios/questo', [ExameController::class, 'quest'])->middleware('auth');
Route::post('/questionarios', [ExameController::class, 'salvaquestao']);

Route::get('/prof/addqa', [ExameController::class, 'prova'])->middleware('auth');
Route::get('load_avtem', [ExameController::class, 'load_avtem'])->name('load_avtem');
Route::get('load_tem', [ExameController::class, 'load_tem'])->name('load_tem');
Route::get('load_quest', [ExameController::class, 'load_quest'])->name('load_quest');
Route::get('/temas/tema', [ExameController::class, 'tematica'])->middleware('auth');
Route::get('/ucs/uc', [ExameController::class, 'disciplina'])->middleware('auth');
Route::get('/prof/verpprof', [ExameController::class, 'verprova'])->middleware('auth');
Route::post('/temas', [ExameController::class, 'storetema']);
Route::post('/ucs', [ExameController::class, 'storeuc']);
Route::post('/prof', [ExameController::class, 'storeadd']);


Route::post('/alunos', [ExameController::class, 'storealunaval']);

Route::get('/alunos/veraluno', [ExameController::class, 'veravaliacao'])->middleware('auth');
Route::get('/alunos/provaaluno/{id}', [ExameController::class, 'show'])->middleware('auth');

Route::get('/resultados/addresultado/{id}', [ExameController::class, 'resultado'])->middleware('auth');


Route::post('/resultados', [ExameController::class, 'storeresultado']);


Route::get('/resultados/listaprovaprof', [ExameController::class, 'listarprova'])->middleware('auth');
Route::get('/resultados/resultado/{id}', [ExameController::class, 'showresultado'])->middleware('auth');
Route::delete('/resultados/{id}', [ExameController::class, 'destroiresultado'])->middleware('auth');
Route::get('resultados/export/{id}', [ExameController::class, 'export'])->middleware('auth');
Route::get('resultados/exportcsv/{id}', [ExameController::class, 'exportcsv'])->middleware('auth');
Route::get('resultados/exportpdf/{id}', [ExameController::class, 'exportpdf'])->middleware('auth');



Route::get('/resultados/qualificacoes', [ExameController::class, 'showqualificacao'])->middleware('auth');



Route::get('/inscricaoucaluno/inscricaouc', [ExameController::class, 'showinscricaouc'])->middleware('auth');

Route::post('/inscricaoucaluno', [ExameController::class, 'storeinscricaouc']);

Route::get('/alunos/editpontoresposta/{id}', [ExameController::class, 'editpontoresposta'])->middleware('auth');
Route::put('/alunos/updatepr/{id}', [ExameController::class, 'updatepr'])->middleware('auth');


Route::get('/prova/editarprova/{id}', [ExameController::class, 'editprova'])->middleware('auth');
Route::put('/prova/updateprova/{id}', [ExameController::class, 'updateprova'])->middleware('auth');



Route::get('/questionarios/verucquest', [ExameController::class, 'veruc'])->middleware('auth');
Route::get('/questionarios/listaquest/{id}', [ExameController::class, 'listaquest'])->middleware('auth');
Route::get('/questionarios/editquest/{id}', [ExameController::class, 'editquest'])->middleware('auth');
Route::put('/questionarios/updatequest/{id}', [ExameController::class, 'updatequest'])->middleware('auth');






Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



