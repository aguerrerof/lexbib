<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\TagsController;
use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('admin')
    ->group(function () {
        Route::prefix('tags')->group(function () {
            Route::get('/search', [TagsController::class, 'search']);
        });

        Route::prefix('posts')->group(function () {
            //Route::post('save', [PostsController::class, 'store'])->middleware(Authenticate::class);
        });
    });
