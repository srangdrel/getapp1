<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AuthController;
use App\Livewire\Counter;
 
Route::get('/counter', Counter::class);

Route::get('/',function(){

      return view('test');
      
}
);

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

Route::get('/login', [FrontController::class, 'goLogin'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');


Route::get('/test', [FrontController::class, 'reports1'])->name('test');

//Route::group(['middleware' => ['auth']], function () {
   //Route::get('/Entry', [FrontController::class, 'studentRegistration'])->name('Entry');
   Route::get('/Entry', [FrontController::class, 'studentEntry'])->name('Entry');
   Route::get('/Exit', [FrontController::class, 'studentExit'])->name('Exit');
   Route::post('/studentdetails', [FrontController::class, 'studentdetailspost'])->name('studentdetials.post');
   Route::post('/studentdetails1', [FrontController::class, 'studentdetailspost1'])->name('studentdetials1.post1');
   Route::get('/reports', [FrontController::class, 'reports']);
   Route::post('/registration',[FrontController::class,'registration'])->name('registration.post');
   Route::post('/registration1',[FrontController::class,'registration1'])->name('registration1.post1');
   Route::post('/exit',[FrontController::class,'registration1'])->name('exit.post');
  Route::post('/getEntryRpt',[FrontController::class,'getStudentEntryRpt'])->name('getEntryRpt.Student');
  
   Route::get('logout', [AuthController::class, 'logout'])->name('logout');
  
   

//});

