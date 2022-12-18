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
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home-page');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home-page');

    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/{user}/update', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::get('/monthly-income', [App\Http\Controllers\MonthlyIncomeController::class, 'index'])->name('monthly-income');
    // Route::get('/daily-expense', [App\Http\Controllers\DailyExpenseController::class, 'index'])->name('daily-expense');
    Route::post('/daily-expense', [App\Http\Controllers\DailyExpenseController::class, 'store'])->name('daily-expense.store');
    Route::get('/wallet-setting', [App\Http\Controllers\WalletSettingController::class, 'index'])->name('wallet-setting');
    Route::post('/wallet-setting', [App\Http\Controllers\WalletSettingController::class, 'store'])->name('wallet.store');
    Route::post('/wallet-active', [App\Http\Controllers\WalletSettingController::class, 'activeWallet'])->name('wallet.active');
    Route::get('/add-wallet', [App\Http\Controllers\AddWalletController::class, 'index'])->name('add-wallet');
    // Để nhìn popup wallet report
    // Route::get('/wallet-popup', function () {
    //     return view('wallet');
    // });
});

