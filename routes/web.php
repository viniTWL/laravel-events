<?php

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

use App\Http\Controllers\EventController; // método do controller

Route::get('/', [EventController::class, 'index']); // Rota padrão

Route::post('/events', [EventController::class, 'createEvent']); // Rota para criar evento

Route::get('/events/create', [EventController::class, 'create']);//->middleware('auth'); // Só pode criar eventos se estiver logado

Route::get('/events/{id}', [EventController::class, 'show']); // evento que recebe um id no parametro


Route::middleware([
    'auth:sanctum',
    'verified'
])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
 
Route::get('listar', function(){
  try{
    // vamos tentar obter o PDO da conexão
    $pdo = DB::connection()->getPdo();
 
    return "Conectado com sucesso à base de dados: " .
      DB::connection()->getDatabaseName();    
  }
  catch(\Exception $exc){
    return "Erro ao conectar: " . $exc;
  }  
}); 
