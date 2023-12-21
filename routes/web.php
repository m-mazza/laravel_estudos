<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


// criando rota e passando parâmetros
// nome da rota (/teste) recebendo parâmetro {$nome}
Route::get('/teste/{nome}/{sobrenome}', function ($nome, $sobrenome){
    echo "Olá $nome $sobrenome. Seja bem-vindo!";
});

// parâmetros opcionais
// {nome?} -> mostra que o nome é opcional
Route::get('/teste/{nome?}', function($nome=null) {
    if(isset($nome)){
        echo "Olá $nome. Seja bem-vindo";
    }
    else {
        echo 'não há nome setado.';
    }
});
