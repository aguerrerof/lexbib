<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\PostsController;
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

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/404', function () {
    return view('not_found');
})->name('not-found');

Route::get('/posts/{uuid}', [PostsController::class, 'show'])->name('posts.show');

Route::prefix('admin')
    ->group(function () {

        Route::prefix('users')->group(function () {
            Route::get('',
                [App\Http\Controllers\UsersController::class, 'index'])
                ->name('users.list')
                ->middleware(Authenticate::class);
            Route::get('new',
                [App\Http\Controllers\UsersController::class, 'create'])
                ->name('users.new')
                ->middleware(Authenticate::class);

            Route::post('save',
                [App\Http\Controllers\UsersController::class, 'store'])
                ->name('users.store')
                ->middleware(Authenticate::class);

            Route::get('{id}/enable',
                [App\Http\Controllers\UsersController::class, 'enable'])
                ->name('users.enable')
                ->middleware(Authenticate::class);

            Route::get('{id}/disable',
                [App\Http\Controllers\UsersController::class, 'disable'])
                ->name('users.disable')
                ->middleware(Authenticate::class);
        });

        Route::prefix('me')->group(function () {
            Route::get('password',
                [App\Http\Controllers\UsersController::class, 'newPassword'])
                ->name('me.new_password')
                ->middleware(Authenticate::class);

            Route::post('password',
                [App\Http\Controllers\UsersController::class, 'updatePassword'])
                ->name('me.change_password')
                ->middleware(Authenticate::class);
        });

        Route::get('', function () {
            return redirect('/login');
        })->middleware(Authenticate::class);

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard')
            ->middleware(Authenticate::class);

        Auth::routes([
            'register' => false,
            'reset' => true,
            'verify' => false,
        ]);

        Route::prefix('tags')->group(function () {
            Route::get('', [TagsController::class, 'index'])->name('tags.index')->middleware(Authenticate::class);
            Route::get('new', [TagsController::class, 'create'])->name('tags.create')->middleware(Authenticate::class);
            Route::post('save', [TagsController::class, 'store'])->name('tags.save')->middleware
            (Authenticate::class);
            Route::get('{id}/edit', [TagsController::class, 'edit'])->name('tags.edit')->middleware
            (Authenticate::class);
            Route::post('{id}/update', [TagsController::class, 'update'])->name('tags.update')->middleware
            (Authenticate::class);
            Route::get('{id}/delete', [TagsController::class, 'destroy'])->name('tags.delete')->middleware
            (Authenticate::class);
        });

        Route::prefix('posts')->group(function () {
            Route::get('', [PostsController::class, 'index'])->name('posts.index')->middleware(Authenticate::class);
            Route::get('new', [PostsController::class, 'create'])->name('posts.new')->middleware(Authenticate::class);
            Route::post('save', [PostsController::class, 'store'])->name('posts.save')->middleware(Authenticate::class);
            Route::get('{id}/edit', [PostsController::class, 'edit'])->name('posts.edit')->middleware
            (Authenticate::class);
            Route::post('{id}/update', [PostsController::class, 'update'])->name('posts.update')->middleware
            (Authenticate::class);
            Route::get('{id}/delete', [PostsController::class, 'destroy'])->name('posts.delete')->middleware
            (Authenticate::class);
        });
    });



