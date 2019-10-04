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

Route::get('/sharedDocuments', function(){
    return view('PublicDocuments');
});

Route::get('/sentDocuments', function(){
    return view('sentDocuments');
});

Route::post('/login', function(){
    return authorize();
});

Route::post('/signup', function(){
    return signUp();
});

Route::get('/logout', function(){
    return logout();
});

Route::post('/addForm', function(){
    return addForm();
});

Route::get('/createForm', function(){
    return view('create-form');
});

Route::get('/groups', function(){
    return view('groups');
});

Route::post('/submitForm', function(){
    return submitForm();
});

Route::get('/sendDocument', function(){
    return view('SendFile');
});

Route::get('/form', function(){
    return view('fillForm');
});

Route::get('/getAllGroups', function(){
    return getAllGroups();
});

Route::post('/sendDocument', function(){
    return send_document();
});

Route::post('/addNewGroup', function(){
    return addNewGroup();
});

Route::delete('/deleteGroup/{id}', function(){
    return deleteGroup();
});

Route::get('/addGroup', function(){
    return view('addGroup');
});

Route::get('/forms', function(){
    return view('forms');
});

Route::get('/getAllForms', function(){
    return getAllForms();
});

Route::get('/viewEntries', function(){
    return view('viewEntries');
});
Route::get('/getFormSubmissionData', function(){
    return getFormSubmissionData();
});

Route::get('/text2Image', function(){
    return view('text2Image');
});



Route::get('/getAllFiles','Upload@showUploadedFiles');
Route::get('/getUserFiles','Upload@showUserUploadedFiles');
Route::get('/getUserSentFiles','Upload@showUserSentFiles');
Route::get('/getSharedWithUserFiles','Upload@showSharedWithUserFiles');

Route::post('/upload', 'Upload@uploadFile');

Route::post('/deleteFile/{id}', 'Upload@deleteFile');


