<?php

use Illuminate\Support\Facades\Route;



// --------------- PASSANDO PARAMETRO NA ROTA
// Route::get('user/{id}', function ($id) {return $id;}); //Parametro obrigatório.
// Route::get('user/{id?}', function ($id = null) {return $id;}); //Parametro opcional.
// Route::get('user/{id?}/{name}', function ($id = null, $name = null) {return $id . ' - ' . $name;});
Route::get('user/{id?}/{name}', function ($id = null, $name = null) 
{
    return $id . ' - ' . $name;
})->where([
    'id' => '[0-9]+',
    'name' => '[a-z]+']); //limitar que o id e o nome devem ser numeros e letras, respectivamente. 

Route::get('token/{token}', function($token){return $token;})->whereNumber('token');

// --------------- FORMAS DE CHAMAR VIEW
// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

// Route::view('welcome', 'welcome');

// --------------- REDIRECT
// Route::get('user', function(){
//     //lógica para checagem
//     return redirect()->route('rotaB');
// }); //Caso eu queira estabelecer alguma lógica para redirecionamento. 
// Route::redirect('rota-a', 'rota-b', 301); //redirecionamento
// Route::permanentRedirect('rota-a', 'rota-b'); //redirecionamento
// Route::get('user', function() {return 'rota A';})->name('rotaA');
// Route::get('admin', function() {return 'rota B';})->name('rotaB');

