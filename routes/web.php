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

Route::get('/', [\App\Http\Controllers\TreeController::class, 'index']);
Route::get('/with-ajax', [\App\Http\Controllers\TreeController::class, 'ajax_view']);
Route::post('/entry/add', [\App\Http\Controllers\TreeController::class, 'create']);

Route::get('/fetch-branch/{id}', [\App\Http\Controllers\TreeController::class, 'ajax']);



