<?php

use App\Http\Controllers\TagsController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')
    ->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')
            ->middleware(Authenticate::class);

        Auth::routes([
            'register' => false,
            'reset' => true,
            'verify' => true,
        ]);

        Route::prefix('tags')->group(function () {
            Route::get('', [TagsController::class, 'index'])->name('tags.index')->middleware(Authenticate::class);
            Route::get('new', [TagsController::class, 'create'])->name('tags.create')->middleware(Authenticate::class);
            Route::post('save', [TagsController::class, 'store'])->name('tags.save')->middleware
            (Authenticate::class);

        });
    });



