<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\TweetController;
use App\Http\Controllers\ProfilesController;



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

Route::middleware('auth')->group(function(){
    Route::post('/tweets',[TweetController::class,'store']);
    Route::get('/tweets',[TweetController::class,'index'])->name('home');

});
Route::get('/Profiles/{user:name}',[ProfilesController::class,'show'])->name('profile');


Auth::routes();



//Route::get('/home', [HomeController::class, 'index']);

