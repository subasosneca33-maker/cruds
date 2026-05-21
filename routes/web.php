<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudsController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/insert', function () {
    return view('create');
});
Route::post('/user/store', [CrudsController::class, 'store'])
    ->name('users.store');
Route::get('/show', [CrudsController::class, 'index'])
    ->name('users.index');
Route::get('/show/{id}', [CrudsController::class, 'show'])
    ->name('users.show');
Route::get('/edit/{id}', [CrudsController::class, 'edit'])
    ->name('users.edit');
Route::post('/update/{id}', [CrudsController::class, 'update'])
    ->name('users.update');
Route::delete('/destroy/{id}', [CrudsController::class, 'destroy'])
    ->name('users.destroy');
