<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

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

Route::get('/',[EventController::class, 'index']); //Index para mostrar a página inicial
Route::get('/events/create',[EventController::class, 'create'])->middleware('auth'); //create para criar novos formularios
Route::get('/events/{id}',[EventController::class, 'show']); //show mostrar um dado especifico
Route::post('/events',[EventController::class, 'store']); //Enviar os dados
Route::delete('/events/{id}', [EventController::class,'destroy'])->middleware('auth');
Route::get('/events/edit/{id}', [EventController::class,'edit'])->middleware('auth');
Route::put('events/update/{id}', [EventController::class,'update'])->middleware('auth');
Route::post('events/join/{id}', [EventController::class,'joinEvent'])->middleware('auth');
Route::delete('events/leave/{id}', [EventController::class,'leaveEvent'])->middleware('auth');

Route::get('/contact', function(){
    return view('contact');
});

Route::get('/dashboard',[EventController::class,'dashboard'])->middleware('auth');



