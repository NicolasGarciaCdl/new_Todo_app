<?php

    use App\Http\Controllers\TaskController;
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

    Route::get('/',[TaskController::class, 'index']);
    Route::prefix('/task')->group(function() {
        Route::post('/store', [TaskController::class, 'store']);
        Route::get('/{id}', [TaskController::class, 'show']);
        Route::post('/{id}', [TaskController::class, 'edit']);
        Route::put('/{id}', [TaskController::class, 'update']);
        Route::delete('/{id}', [TaskController::class, 'destroy']);
        });
