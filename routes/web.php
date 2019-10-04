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
    return view('index');
});

Route::get('/login', function(){
    return view('login');
});

Route::get('/upload', function(){
    return view('upload');
});

Route::get('/AllFiles', function(){
    return view('AllFiles');
});

Route::get('/test', function(){
    return authorize();
});

Route::get('/logout', function(){
    return logout();
});

Route::get('/createForm', function(){
    return view('create-form');
});

Route::get('/sendDocument', function(){
    return view('SendFile');
});

Route::get('/getAllFiles','Upload@showUploadedFiles');

Route::post('/upload', 'Upload@uploadFile');

Route::post('/deleteFile/{id}', 'Upload@deleteFile');


