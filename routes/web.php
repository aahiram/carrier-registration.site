<?php

use App\Http\Controllers\ProfileController;
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
    return view('auth.login');
});

Route::get('/email/account', [\App\Http\Controllers\RegisterController::class, 'showEmailForm'])->name('register.email');
Route::post('/email/account', [\App\Http\Controllers\RegisterController::class, 'processEmailForm']);

Route::get('/password/account', [\App\Http\Controllers\RegisterController::class, 'showPasswordForm'])->name('register.password');
Route::post('/password/account', [\App\Http\Controllers\RegisterController::class, 'processPasswordForm']);


//Route::post('/password-send', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'passwordSend'])->name('passwordSend');

//Route::get('admin/login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'admin'])->name('admin.login');
//Route::post('admin/login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);


Route::middleware('auth')->group(function () {
    Route::middleware('admin')->group(function () {
    Route::get('/dashboard',[\App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/contracts',[\App\Http\Controllers\AdminController::class, 'contracts'])->name('contracts');
//    Route::post('/sendEmailLink/{user}',[\App\Http\Controllers\AdminController::class, 'sendLoginLink'])->name('sendLoginLink');
    Route::post('/sendCodeToUser/{user}',[\App\Http\Controllers\AdminController::class, 'sendCodeToUser'])->name('sendCodeToUser');
    });
//    Route::get('/contract', [\App\Http\Controllers\UserController::class, 'contract'])->name('contract');
//    Route::post('/contract/upload', [\App\Http\Controllers\ContractController::class, 'store'])->name('contract.store');
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::get('/account/password', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'showPasswordForm']);

//Route::post('/password-send', [\App\Http\Controllers\UserGoogleAuthenticate::class, 'passwordSend'])->name('passwordSend');

Route::get('contract/{user}', [\App\Http\Controllers\ContractController::class, 'showContractForm'])
    ->name('contract')
    ->middleware('signed');

Route::get('verification-code/{user}', [\App\Http\Controllers\AdminController::class, 'showCodeForm'])
    ->name('code');

Route::post('send-verify-code', [\App\Http\Controllers\AdminController::class, 'sendCodeVerify'])
    ->name('sendCodeVerify');

Route::post('contract/{user}', [\App\Http\Controllers\ContractController::class, 'store'])->name('contract.store');


require __DIR__.'/auth.php';
