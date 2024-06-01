<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/contato', function () {
    echo 'estou na pagina de contato';
});
Route::get('/sobre', function () {
    echo 'estou na pagina de sobre';
});
Route::get('/produtos', function () {
    echo 'estou na pagina de produto';
});
