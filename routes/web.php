<?php

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

Route::view('/ola', 'teste');

Route::prefix('tarefas')->group(function(){
    Route::get('/', 'Todo\TodoController@index')->name('tarefas.list'); //Listagem de tarefas

    Route::get('add', 'Todo\TodoController@add')->name('tarefas.add'); //Tela de Adição
    Route::post('add', 'Todo\TodoController@store'); //Ação de Adição

    Route::get('edit/{id}', 'Todo\TodoController@edit')->name('tarefas.edit'); //Tela de Edição
    Route::post('edit/{id}', 'Todo\TodoController@update'); //Ação de Edição

    Route::get('delete/{id}', 'Todo\TodoController@delete')->name('tarefas.delete'); //Ação de Deleção

    Route::get('check/{id}', 'Todo\TodoController@check')->name('tarefas.done');  //Açao de Marcar como Feito/Não Feito
});

Route::prefix('atividades')->group(function(){
    Route::get('/', 'atividade\AtividadeController@index')->name('atividades.list'); //Listagem de atividades

    Route::get('add', 'atividade\AtividadeController@add')->name('atividades.add'); //Tela de Adição
    Route::post('add', 'atividade\AtividadeController@store'); //Ação de Adição

    Route::get('edit/{id}', 'atividade\AtividadeController@edit')->name('atividades.edit'); //Tela de Edição
    Route::post('edit/{id}', 'atividade\AtividadeController@update'); //Ação de Edição

    Route::get('delete/{id}', 'atividade\AtividadeController@delete')->name('atividades.delete'); //Ação de Deleção

    Route::get('check/{id}', 'atividade\AtividadeController@check')->name('atividades.done');  //Açao de Marcar como Feito/Não Feito
});