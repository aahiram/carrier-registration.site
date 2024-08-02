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
    return view('login');
});

Route::get('admin/login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'admin'])->name('admin.login');
Route::post('admin/login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);


Route::middleware('auth')->group(function () {
    Route::middleware('admin')->group(function () {
    Route::get('/dashboard',[\App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/contracts',[\App\Http\Controllers\AdminController::class, 'contracts'])->name('contracts');
    Route::post('/sendEmailLink/{user}',[\App\Http\Controllers\AdminController::class, 'sendLoginLink'])->name('sendLoginLink');
    });
    Route::get('/contract', [\App\Http\Controllers\UserController::class, 'contract'])->name('contract');
    Route::post('/contract/upload', [\App\Http\Controllers\ContractController::class, 'store'])->name('contract.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('login/{user}', [\App\Http\Controllers\LoginController::class, 'showPasswordForm'])
    ->name('user.login.form')
    ->middleware('signed');

Route::post('login/{user}', [\App\Http\Controllers\LoginController::class, 'login'])->name('user.login');


require __DIR__.'/auth.php';
