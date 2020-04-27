<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Departmets
Route::prefix('departamentos')->group(function () {
    Route::name('departments.index')->get('/', 'Departments\DepartmentController@index');
    Route::name('departments.store')->post('/', 'Departments\DepartmentController@store');
    Route::name('departments.update')->put('/{id}', 'Departments\DepartmentController@update');
    Route::name('departments.destroy')->delete('/{id}', 'Departments\DepartmentController@destroy');
});

// Departmets
Route::prefix('pessoas')->group(function () {
    Route::name('persons.index')->get('/', 'Persons\PersonController@index');
    Route::name('persons.store')->post('/', 'Persons\PersonController@store');
    Route::name('persons.update')->put('/{id}', 'Persons\PersonController@update');
    Route::name('persons.destroy')->delete('/{id}', 'Persons\PersonController@destroy');
});

// Projects
Route::prefix('projetos')->group(function () {
    Route::name('projects.index')->get('/', 'Projects\ProjectController@index');
    Route::name('projects.store')->post('/', 'Projects\ProjectController@store');
    Route::name('projects.update')->put('/{id}', 'Projects\ProjectController@update');
    Route::name('projects.destroy')->delete('/{id}', 'Projects\ProjectController@destroy');
});


// Departmets
Route::prefix('tarefas')->group(function () {
    Route::name('tasks.index')->get('/', 'Tasks\TaskController@index');
    Route::name('tasks.dates')->get('/datas/{inicio}/{fim}', 'Tasks\TaskController@dates');
    Route::name('tasks.dates')->get('/datas/ativo/{inicio}/{fim}', 'Tasks\TaskController@active');
    Route::name('tasks.dates')->get('/datas/desativo/{inicio}/{fim}', 'Tasks\TaskController@deactive');
    Route::name('tasks.store')->post('/', 'Tasks\TaskController@store');
    Route::name('tasks.update')->put('/{id}', 'Tasks\TaskController@update');
    Route::name('tasks.destroy')->delete('/{id}', 'Tasks\TaskController@destroy');
});

