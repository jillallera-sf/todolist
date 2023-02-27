<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodolistController;
use App\Http\Controllers\SubtaskController;
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

Route::get('/edit', function () {
    return view('edit');
});

Route::get('/add', function () {
    return view('add');
});

Route::get('/list', [TodolistController::class, 'list'])->name('list');

//used in saving data
Route::post('/save-task', [TodolistController::class, 'saveTask'])->name('saveTask');

//deleting task
Route::get('/delete-task/{id}', [TodolistController::class, 'deleteTask'])->name('deleteTask');

//updating
Route::get('/update-task/{id}', [TodolistController::class, 'updateTask'])->name('updateTask');

//for the update button
Route::post('/save-edit', [TodolistController::class, 'saveEdit'])->name('saveEdit');


//SUBTASK ROUTES

Route::get('/sub', [SubtaskController::class, 'add'])->name('add');

Route::post('/save-subtask', [SubtaskController::class, 'saveSubtask'])->name('saveSubtask');


Route::get('/delete-subtask/{id}', [SubtaskController::class, 'deleteSubtask'])->name('deleteSubtask');

Route::get('/update-subtask/{id}', [SubtaskController::class, 'updateSubtask'])->name('updateSubtask');

Route::post('/save-editsub', [SubtaskController::class, 'saveEditsub'])->name('saveEditsub');



//TODO CHECKBOX 
Route::patch('/save-checked/{id}', [TodolistController::class, 'saveChecked'])->name('saveChecked');

Route::get('/update-checked/{id}', [TodolistController::class, 'updateChecked'])->name('updateChecked');

//SUBTASK CHECKBOX
Route::patch('/save-subchecked/{id}', [SubtaskController::class, 'savesubChecked'])->name('savesubChecked');

Route::get('/update-subchecked/{id}', [SubtaskController::class, 'updatesubChecked'])->name('updatesubChecked');


Auth::routes();

Route::get('/home', [App\Http\Controllers\TodolistController::class, 'list'])->name('home');



Route::get('/', function () {
    return view('welcome');
});

