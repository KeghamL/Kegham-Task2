<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


Route::get('/', [UserController::class, 'main']);
Route::get('/message', [AdminController::class, 'messageinfo']);
Route::get('/register', [UserController::class, 'registration']);
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/sendmessage', [UserController::class, 'message'])->name('sendmessage');
Route::get('/main', [UserController::class, 'loginUser'])->name('login-user');
Route::get('/userinfo', [UserController::class, 'userInfo']);
Route::post('/register-user', [UserController::class, 'registerUser'])->name('register-user');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/changepassword', [UserController::class, 'changepassword'])->name('changepassword');
Route::post('/updatepassword', [UserController::class, 'updatepassword'])->name('updatepassword');
Route::get('/dashboardpage', [AdminController::class, 'dashboardpage']);
Route::delete('/messagedelete/{message}', [AdminController::class, 'messagedelete'])->name('message-delete');
Route::get('/about', [AdminController::class, 'about'])->name('about-us');
Route::post('/createabout', [AdminController::class, 'createabout'])->name('create-about');
Route::get('/createservice', [AdminController::class, 'createservice'])->name('create-service');
Route::post('/addservice', [AdminController::class, 'addservice'])->name('add-service');
Route::get('/deleteservice', [AdminController::class, 'deleteservice'])->name('delete-service');
Route::delete('/destroyservice/{service}', [AdminController::class, 'destroyservice'])->name('destroy-service');
Route::get('/createevent', [AdminController::class, 'createevent'])->name('create-event');
Route::post('/addevent', [AdminController::class, 'addevent'])->name('add-event');
Route::get('/deleteevent', [AdminController::class, 'deleteevent'])->name('delete-event');
Route::delete('/destroyevent/{event}', [AdminController::class, 'destroyevent'])->name('destroy-event');
Route::post('/booking', [AdminController::class, 'book'])->name('booking');
Route::get('/history', [UserController::class, 'history'])->name('booking-history');
Route::delete('/cancelbook/{book}', [UserController::class, 'cancelbook'])->name('cancel-book');
Route::get('/showbook', [AdminController::class, 'showbook'])->name('show-book');
Route::get('/adminbook', [AdminController::class, 'adminbook'])->name('admin-book');
Route::get('/adminapprove/{id}', [AdminController::class, 'approve'])->name('admin-approve');
Route::get('/admincancel/{id}', [AdminController::class, 'cancel'])->name('admin-cancel');
Route::get('/search', [AdminController::class, 'search'])->name('search');
Route::get('/searchbook', [AdminController::class, 'searchbook'])->name('search-book');
Route::get('/payment', [UserController::class, 'payment'])->name('payment');
Route::post('/paymentprocess', [UserController::class, 'paymentprocess'])->name('payment-process');
Route::get('/paymentinfo', [AdminController::class, 'paymentinfo'])->name('payment-info');
Route::delete('/paymentdestroy{payment}', [AdminController::class, 'paymentdestroy'])->name('payment-destroy');
Route::get('/users', [AdminController::class, 'users'])->name('users');
Route::delete('/removeusers{user}', [AdminController::class, 'removeusers'])->name('remove-users');
Route::get('/notify', [AdminController::class, 'notify']);
