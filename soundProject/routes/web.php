<?php

use App\Http\Controllers\ClientMediaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\MediaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[HomeController::class,'Index'])->name('home');
Route::get('/ContectUs',[HomeController::class,'ContectUs'])->name('ContectUs');
Route::get('/AboutUs',[HomeController::class,'AboutUs'])->name('AboutUs');

Route::get('/', [HomeController::class,"Index"])->name("loginAccount");
Route::post('/Account/Register',[AccountController::class,'Register'])->name('account.register');
Route::post('/Account/Login',[AccountController::class,'Login'])->name('account.login');
Route::get('/Account/Login',[AccountController::class,'Logout'])->name('account.logout');


Route::get('/media/getSingleMedia', [ClientMediaController::class , 'single.media']);
Route::get('/media/listSingleMedia', [ClientMediaController::class , 'single.media']);

//_____ rationg submit _______
Route::get('/media/getAudios', [ClientMediaController::class , 'getAudios']);
Route::get('/media/submitRating', [ClientMediaController::class , 'submitRating']);

//_____ ClientMedia _______
Route::get('/media/clientMediaList/{mediaId}', [ClientMediaController::class , 'clientMediaList'])->name('clientMedia.list');
Route::get('/media/clientMediaSingle/{id}/{mediaId}', [ClientMediaController::class , 'clientMediaSingle'])->name('clientMedia.single');


//_____________ Admin ________________
Route::middleware('check.role:admin')->group(function () {
    Route::get('/Dashboard/Index',[DashboardController::class,'Index'])->name('dashboard.index');
    Route::get('/Dashboard/Media/{id}',[MediaController::class,'Index'])->name('dashboard.Media');

    Route::get('/Dashboard/Media/Insert/{id}',[MediaController::class,'Insert'])->name('dashboard.insertMedia');
    Route::post('/Dashboard/Media/InsertPost/{id}', [MediaController::class, 'InsertPost'])->name('dashboard.insertPostMedia');

    Route::get('/Dashboard/Media/Edit/{id}/{actionId}',[MediaController::class,'Edit'])->name('dashboard.editMedia');
    Route::post('/Dashboard/Media/EditPost/{id}',[MediaController::class,'editPost'])->name('dashboard.editePostMedia');

    Route::get('/Dashboard/Media/delete/{id}/{actionId}',[MediaController::class,'Delete'])->name('dashboard.deleteMedia');
});



//________________ user _______________________

Route::middleware('check.role:user','check.role:1')->group(function () {
    
});


