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
Route::get('/404', function () {
  return view('404');
});
Route::get('/test', function () {
  return view('home');
});
Route::get('/about', function () {
  return view('about');
});

Route::get('submissions/{s?}', array('uses'=>'submissionViewController@view' ));
Route::post('submissions', array('uses'=>'submissionsController@submit' ));


Route::get('submissionViewPage/{id?}', array('uses'=>'submissionViewPageController@view' ));
Route::get('/remedies', function(){
  return view('remedyViewPage');
});

Route::get('remedyViewPage/{id?}', array('uses'=>'remedyViewPageController@view' ));
//Route::post('remedyViewPage/{id}', array('uses'=>'remedyViewPageController@comment' ));


/*Professional Pages*/
Route::get('/profile', 'professionalController@index');
Route::get('/insert', function(){
  return view('insertRemedy');
});//InsertRemedy
Route::get('/InsertRemedy', 'InsertRemedy@index');
Route::get('/debunk/{id}', 'debunkController@index');

Route::get('/settings', 'settingsController@index');
//generalEdit pass_edit
Route::post('/generalEdit', 'settingsController@general');
Route::post('/pass_edit', 'settingsController@specific');




Route::get('/catagory', 'DiseasesListController@index');
Route::post('/getdisease', 'DiseasesListController@getAjax');
Route::get('/diseases', 'RemdeyList@index');
Route::post('/getremedies', 'RemedyList@getAjax');
Route::get('/articles', 'RetrieveArticleController@index');
Route::post('/getarticles', 'RetrieveArticleController@getAjax');
Route::get('/home', function () {
  return view('index');
});


/*

var url = document.location.toString();
if (url.match('#')) {
    $('.nav-tabs a[href=#'+url.split('#')[1]+']').tab('show') ;
}

$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    window.location.hash = e.target.hash;
});
 /****** PUT IN AUTH MIDDLEWARE ROUTE GROUP *****/


//Route::get('/home', 'professionalController@index');
Route::group(['middleware'=>'auth'], function(){
  //
});
Auth::routes();
