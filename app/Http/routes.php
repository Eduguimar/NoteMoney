<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Autenticação*/

Route::get('/', 'NotebooksController@index');
Route::get('notebooks/search', 'NotebooksController@search');
Route::resource('notebooks', 'NotebooksController');
Route::resource('notebooks.notes', 'NotesController');
Route::get('notes/search', 'NotesController@search');
Route::get('notes', 'NotesController@display');
Route::resource('transactions', 'TransactionsController');
Route::post('filter-transactions', 'TransactionsController@filter');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
