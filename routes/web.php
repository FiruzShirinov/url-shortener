<?php

use App\Http\Controllers\UrlController;
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

Route::get('/', function(){
    return redirect()->route('urls.index');
});

Route::controller(UrlController::class)->group(function(){
    Route::get('/urls', 'index')->name('urls.index');
    Route::post('/urls/store-and-list', 'storeAndList')->name('urls.store_and_list');
});
