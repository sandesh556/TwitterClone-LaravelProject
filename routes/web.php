<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\TweetController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\ExploreController;



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
    Route::post('/Profiles/{user:username}/follow',[FollowsController::class,'store']);
    Route::get('/Profiles/{user:username}/edit',[ProfilesController::class,'edit'])->middleware('can:edit,user');
    Route::patch('/Profiles/{user:username}',[ProfilesController::class,'update'])->middleware('can:edit, user');
    Route::get('/explore',[ExploreController::class,'index']);

});
Route::get('/Profiles/{user:username}',[ProfilesController::class,'show'])->name('profile');



Auth::routes();



//Route::get('/home', [HomeController::class, 'index']);

