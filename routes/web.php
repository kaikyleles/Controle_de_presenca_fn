<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

/* Route::get('/', function () {
    return view('auth.login');
}); */

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request'); 
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email'); 
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset'); 
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('/register', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        if (Auth::check()) {
            return redirect()->route('principal');
        }
    
        return view('auth.login');
    });
});

Route::middleware('auth')->group(function () {
/* 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']); */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('principal');
Route::any('/confirma', [App\Http\Controllers\HomeController::class, 'confirma']);
Route::any('/busca_colaboradores', [App\Http\Controllers\HomeController::class, 'busca_colaboradores']);
Route::any('/verifica_inscricao', [App\Http\Controllers\HomeController::class, 'verifica_inscricao']);
Route::any('/adm', [App\Http\Controllers\HomeController::class, 'adm'])->name('adm');
Route::any('/contaCredito', [App\Http\Controllers\HomeController::class, 'contaCredito']);
Route::any('/detalhes_credito', [App\Http\Controllers\HomeController::class, 'detalhes_credito']); 
Route::any('/registraPag', [App\Http\Controllers\HomeController::class, 'registraPag']);
Route::any('/usuarios', [App\Http\Controllers\HomeController::class, 'usuarios']);
Route::any('/PermissaoAdm', [App\Http\Controllers\HomeController::class, 'PermissaoAdm']);
Route::any('/AdicionaCreditosColab', [App\Http\Controllers\HomeController::class, 'AdicionaCreditosColab']);
Route::any('/cancela_inscricao', [App\Http\Controllers\HomeController::class, 'cancela_inscricao']);
Route::any('/verificaSaldo', [App\Http\Controllers\HomeController::class, 'VerificaSaldo']);
Route::any('/HistoricoReg', [App\Http\Controllers\HomeController::class, 'HistoricoReg']);

});