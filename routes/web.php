<?php

use App\Exceptions\InvalidOrderException;
use App\Exceptions\ProductNotFoundException;
use App\Http\Controllers\CheckoutController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Test1;
use App\Http\Middleware\Test2;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;

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

    // --------------- CONTROLLERS DE AÇÃO ÚNICA (INVOKE)
    // Route::get('checkout', CheckoutController::class);

    // --------------- USANDO RESOURCE
    // Route::resource('users', UserController::class) //Cria todas as rotas de CRUD de uma vez só.   
    // Route::resource('users', UserController::class)->only(['index']); //Cria APENAS a rota index. 
    // Route::resource('users', UserController::class)->except(['destroy', 'edit']); //Cria todas EXCETO as rotas destroy e edit.  
    
    // Route::resources([
    //     'users' => UserController::class,
    //     'posts' => UserController::class
    // ]); //Organizando rotas de resources.
    
    //users/{users}/comments
    //users/{users}/comments/{comment}
    // Route::resource('users.comments', UserController::class); //Criando rotas aninhadas.
    
    // Route::resource('posts', UserController::class)->parameters([
    //     'posts' => 'admin_user'
    // ]); //Alterando o nome do parâmetro da rota.
    
    // Route::get('users/{user:name}', [UserController::class, 'show']); //o parametro pega o id por padrao, mas pode ser alterado para email, por exemplo.
    // Route::resource('users', UserController::class)->scoped([
    //     'user' => 'email'
    // ]); //Apontando para outro campo da tabela (id para email, por exemplo).
    
    // --------------- REQUEST
    // Route::get('user/{users}', function (Request $request) {
    //     // dd($request); //mostra todas as informações da requisição.
    //     // dd($request->path()); //caminho da url
    //     // dd($request->url()); //url sem query string
    //     // dd($request->fullUrl()); //url completa
    //     // dd($request->fullUrlWitgQuery(['curso' => 'laravel'])); //adiciona query string
    //     // dd($request->fullUrlIs('http://127.0.0.1:8000')); verifica se a url é igual a passada por parametro.
    //     // dd($request->is('user/*')); //verifica se a url é igual a passada por parametro (true).
    //     // dd($request->is('user')); //verifica se a url é igual a passada por parametro (false).
    //     // dd($request->routeIs('user')); //verifica se o nome rota é igual a passada por parametro.
    //     // dd($request->method()); //mostra o método da requisição (GET, POST, PUT...).
    //     // dd($request->isMethod('get')); //verifica se o método é igual ao passado por parametro.
    // })->name('user');
    
    // --------------- INPUT
    // Route::get('user/{users}', function (Request $request) {
    //     // dd($request); //mostra todas as informações da requisição.
    //     // dd($request->input('token')); //pega o valor do input token.
    //     // dd($request->input('curso', 'Laravel')); //pega o valor do input curso, se não existir, retorna Laravel.
    //     // dd($request->input('product.curso'));  //pega o valor do input product.name.
    //     // http://127.0.0.1:8000/user/12?token=abc&product[curso]=Laravel
    //     // dd($request->input()); //pega todos os inputs.
        
    //     // dd($request->query('product')); //pega o valor do query product.
    //     // dd($request->query('curso', 'Laravel')); //pega o valor do query curso, se não existir, retorna Laravel.
    //     // dd($request->query()); //pega todos os querys.
    
    //     // dd($request->token); //pega o valor do input token.
    //     // dd($request->only('token', 'product')); //pega os valores dos inputs token e product.
    //     // dd($request->except('token'));
    // })->name('user');

}

Route::get('/', function () {

    // throw new InvalidOrderException();
    // throw new ProductNotFoundException();

    return view('welcome');
});

Route::get('bd', function () {
    // $users = DB::table('users')->where(column:'email', operator:'frederique78@example.org')->exists(); //verifica se existe o usuário com email correspondente.
    // dd($users);
    
    // $users = DB::table('users')->get(); //retorna a collection de todos os usuários.
    // $users = DB::table('users')->find(3); //retorna o usuário com id 3.
    // $users = DB::table('users')->first();  //retorna o primeiro usuário.
    // $users = DB::table('users')->where('email', "dock10@example.org")->first(); //retorna o usuário com email correspondente
    // $users = DB::table('users')->select('name')->get(); //retorna apenas o campo/coluna específica.
    // $users = DB::table('users')->orderBy('name')->get(); //retorna a collection ordenada pelo campo name.
    // $users = DB::table('users')->inRandomOrder()->get(); //retorna a collection ordenada aleatoriamente.
    // $users = DB::table('users')->latest('email_verified_at')->get(); //retorna a collection ordenada pela data de criação.
    $users = DB::table('users')->oldest('email_verified_at')->get(); //retorna a collection ordenada pela data de criação.


    return view('database.users', compact('users'));
});
Route::get('users', [UserController::class, 'index']);