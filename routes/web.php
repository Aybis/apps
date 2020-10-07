<?php

use App\Models\Lpl;
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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');



Route::resource('spph', 'SpphController', [
    'only' => ['all', 'draft', 'list', 'done', 'create', 'edit', 'store', 'update', 'destroy'] ,
]);
Route::group(['prefix' => 'spph'], function () {

    Route::view('draft', 'modules.spph.draft')->name('spph.draft');
    Route::view('list', 'modules.spph.list')->name('spph.list');
    Route::view('done', 'modules.spph.done')->name('spph.done');
    Route::view('all', 'modules.spph.all')->name('spph.all');
});

//-------- Route MASTER DATA ----------------------


//-------- End Route MASTER DATA --------
