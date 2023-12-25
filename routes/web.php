<?php

use Illuminate\Support\Facades\Route;
use illumiante\Http\Request;

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
        echo 'Você não digitou nenhum nome.';
    }
});

//parâmetros com regras
//a cláusula 'where' permite que, por meio de expressões regulares, determine as regras dos parâmetros
Route::get('/rotacomregras/{nome}/{n}', function($nome, $n) {
    for ($i=0; $i < $n; $i++) {
        echo "Olá, Seja bem vindo, $nome <br>";
    }
})->where('nome','[A-Za-z]+')->where('n','[0-9]+');

//agrupamento de rodas
//para agrupamento de rotas é necessário trocar o método get por 'prefix'
//o agrupamento ocorre por meio da função group
Route::prefix('/app')->group(function() {
    Route::get('/', function(){
        return  view('app');
    });
    Route::get('/user', function(){
        return view('user');
    });
    Route::get('/profile', function(){
        return view('profile');
    });
});

//nomeando rotas
//A nomeação de rotas permite que não trabalhe com constantes no sistema.
Route::prefix('/aplication')->group(function() {
    Route::get('/', function(){
        return  view('app');
    })->name('app');

    Route::get('/user', function(){
        return view('user');
    })->name('app.user');

    Route::get('/profile', function(){
        return view('profile');
    })->name('app.profile');
});

//A renomeação de rotas não é necessariamente utilizanda dentro de um grupo, como está acima
Route::get('/produtos', function() {
    echo '<h1>Produtos</h1>';
    echo '<ol>';
    echo '<li>Notebook</li>';
    echo '<li>Mouse</li>';
    echo '<li>Keyboard</li>';
    echo '</ol>';
})->name('meusprodutos');

//redirecionamento de rota
Route::redirect('todososprodutos1', 'produtos', 301); //primeira forma -> usando o Route

//essa é a segunda forma de fazer redirecionamento
Route::get('todososprodutos2', function () {
    return redirect()->route('meusprodutos');
});

//////////////////////////////////////////////////////////

Route::post('requisicoes', function (Request $request) {
    return 'Olá Planeta';
});
