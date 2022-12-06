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

Auth::routes();
Route::group( ['middleware' => 'auth' ], function()
{
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

    Route::get('/monthly-income', [App\Http\Controllers\MonthlyIncomeController::class, 'index'])->name('monthly-income');
    Route::get('/daily-expense', [App\Http\Controllers\DailyExpenseController::class, 'index'])->name('daily-expense');
    // Để nhìn popup wallet report
    // Route::get('/wallet-popup', function () {
    //     return view('wallet');
    // });
});

