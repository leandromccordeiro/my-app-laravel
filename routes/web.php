<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Test1;
use App\Http\Middleware\Test2;
use App\Http\Controllers\UserController;


{   
    // --------------- PASSANDO PARAMETRO NA ROTA
    // Route::get('user/{id}', function ($id) {return $id;}); //Parametro obrigatório.
    // Route::get('user/{id?}', function ($id = null) {return $id;}); //Parametro opcional.
    // Route::get('user/{id?}/{name}', function ($id = null, $name = null) {return $id . ' - ' . $name;});
    // Route::get('user/{id?}/{name}', function ($id = null, $name = null) 
    // {
    //     return $id . ' - ' . $name;
    // })->where([
    //     'id' => '[0-9]+',
    //     'name' => '[A-Za-z]+']); //limitar que o id e o nome devem ser numeros e letras, respectivamente. 
    // Alternativas às expressões regulares:
    // Route::get('token/{token}', function($token){return $token;})->whereNumber('token'); //validação numérica
    // Route::get('token/{token}', function($token){return $token;})->whereAlpha('token'); //validação letras.
    // Route::get('token/{token}', function($token){return $token;})->whereAlphaNumeric('token'); //validação letras e números.
    // Route::get('token/{token}', function($token){return $token;})->whereUuid('token'); //validação Uuids
    // Route::get('token/{id}', function($id) {return $id;}); //puxando do padrão AppService (Validação global)
    
    // --------------- AGRUPANDO ROTAS
    // Route::prefix('user')->name('admin.')->group(function() {
    //     Route::get('', function() {return 'Hello World';})->name('users');
    //     Route::get('{id}', function() {return 'Hello World1';})->name('user');
    // });
    
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
    
    // --------------- MIDDLEWARE
    // Route::middleware('signed')->group(function() {
    //     Route::get('', function(){
    //         return 'Hello world!';
    //     })->name('users');    
    //     Route::get('{id}', function($id){
    //         return 'Hello world!' . $id;
    //     })->name('users');
    // });
    // Route::get('admin', function(){
    //     return 'teste de middleware sem agrupar!';
    // })->middleware('signed');
    
    // --------------- SUB-DOMÍNIO (Não consegui fazer funcionar)
    // Route::domain('{user}.cursolaravelpro.test')->group(function(){
    //     Route::get('', function($user){
    //         return $user;
    //     });
    //     Route::get('user', function(){
    //         return 'User';
    //     });
    // });
    
    // --------------- FALLBACK 
    // Route::fallback(function (){
    //     return 'Hello world';
    // }); //Exibe a rota fallback, caso o usuário acesse rotas que não existam ou que estejam com problema. 
    
    // --------------- INJEÇÃO DE DEPENDENCIAS
    // Route::get('', function (Request $request) {
    //     dd($request->method());
    //     return $request;
    // });
    // Route::get('user/{user}', function(User $user){
    //     dd($user);
    // });

    // --------------- MIDDLEWARE GLOBAL
    // Route::get('', function() {
    //     return view('welcome'); //http://127.0.0.1:8001/?token=123
    // });
    // Route::get('users', function() {
    //     return ['users']; //http://127.0.0.1:8001/users?token=123
    // });
    
    // --------------- MIDDLEWARE DIRETAMENTE NAS ROTAS
    // Route::get('/', function () {
    //     return view('welcome');
    // })->middleware([Test2::class]);
    
    // Route::get('user', function(){
    //     return ['users'];
    // })->middleware([Test2::class, Test1::class]);

    // --------------- MIDDLEWARE AGRUPAMENTO
    // Route::middleware([Test2::class, Test1::class])->group(function() {
    //     Route::get('users', function() {
    //         return ['users'];
    //     });
    //     Route::get('profile', function() {
    //         return ['profile'];
    //     })->withoutMiddleware([Test2::class]);
    
    //     Route::withoutMiddleware([Test1::class])->group(function() {
    //         Route::get('admin', function() {
    //             return ['admin'];
    //         });
    //         Route::get('cord', function() {
    //             return ['cord'];
    //         });
    //     });
    // });
    
    // --------------- MIDDLEWARE AGRUPAMENTO
    // Route::middleware(['policia'])->group(function() { //agrupando middleware (config em class app.php)
    //     Route::get('users', function() {
    //         return ['users'];
    //     });
    //     Route::get('profile', function() {
    //         return ['profile'];
    //     });
    // });
}
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{user}', [UserController::class, 'show']);

