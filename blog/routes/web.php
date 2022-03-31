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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logs', 'LogsController@index')->name('logs');

    Route::post('/status', 'StatusController@create')->name('status.create');
    Route::put('/status/update', 'StatusController@update')->name('status.update');

    Route::get('/home', 'HomeController@index')->name('home.index');
    Route::post('/home/create', 'HomeController@create')->name('home.create');
    Route::put('/home/{id}/update', 'HomeController@update')->name('home.update');
    Route::delete('/home/{id}/{path}/delete', 'HomeController@destroy')->name('home.delete');

    Route::get('/signUpInformation', 'SignUpInformationController@index')->name('signUpInformation.index');
    Route::post('/signUpInformation/create/CN', 'SignUpInformationController@createCN')->name('signUpInformation.createCN');
    Route::post('/signUpInformation/create/EN', 'SignUpInformationController@createEN')->name('signUpInformation.createEN');
    Route::put('/signUpInformation/{id}/update', 'SignUpInformationController@update')->name('signUpInformation.update');
    Route::delete('/signUpInformation/{id}/delete', 'SignUpInformationController@destroy')->name('signUpInformation.destroy');

    Route::get('/activity', 'ActivityController@index')->name('activity.index');
    Route::post('/activity/create', 'ActivityController@create')->name('activity.create');
    Route::put('/activity/{id}/update', 'ActivityController@update')->name('activity.update');
    Route::delete('/activity/{id}/delete', 'ActivityController@destroy')->name('activity.destroy');

    Route::put('/activity/information/{id}/update', 'ActivityInformationController@update')->name('activityInformation.update');

    Route::get('/route', 'RouteController@index')->name('route.index');
    Route::get('/route/controller/edit/{id}', 'RouteController@edit')->name('route.edit');
    Route::put('/route/controller/edit/{id}/update', 'RouteController@update')->name('route.update');
    Route::delete('/route/controller/edit/{id}/delete', 'RouteController@destroy')->name('route.destroy');
    Route::post('/route/controller/edit/{id}/routeInformation/create', 'RouteInformationController@create')->name('routeInformation.create');
    Route::put('/route/controller/edit/{id}/routeInformation/{information}/update', 'RouteInformationController@update')->name('routeInformation.update');
    Route::delete('/route/controller/edit/{id}/routeInformation/{information}/delete', 'RouteInformationController@destroy')->name('routeInformation.destroy');

    Route::post('/route/controller/edit/{id}/session/create', 'SessionController@create')->name('session.create');
    Route::put('/route/controller/edit/{id}/session/{session}/update', 'SessionController@update')->name('session.update');
    Route::delete('/route/controller/edit/{id}/session/{session}/delete', 'SessionController@destroy')->name('session.destroy');


    Route::get('/image', 'ImageController@index')->name('image.index');
    Route::get('/image/controller/edit/{id}', 'ImageController@edit')->name('image.edit');
    Route::put('/image/controller/edit/{id}/content/{cid}', 'ImageController@content')->name('image.content');

    Route::post('/image/controller/edit/{id}/create', 'ImageController@create')->name('image.create');
    Route::delete('/image/controller/edit/{id}/delete', 'ImageController@destroy')->name('image.destroy');

    Route::get('/new', 'NewsController@index')->name('news.index');
    Route::post('/new/create', 'NewsController@create')->name('news.create');
    Route::put('/new/{id}/update', 'NewsController@update')->name('news.update');
    Route::delete('/new/{id}/delete', 'NewsController@destroy')->name('news.destroy');

    Route::get('/story', 'StoryController@index')->name('story.index');
    Route::post('/story/create', 'StoryController@create')->name('story.create');
    Route::put('/story/{id}/update', 'StoryController@update')->name('story.update');
    Route::delete('/story/{id}/delete', 'StoryController@destroy')->name('story.destroy');

    Route::get('/video', 'VideoController@index')->name('video.index');
    Route::post('/video/create', 'VideoController@create')->name('video.create');
    Route::put('/video/{id}/update', 'VideoController@update')->name('video.update');
    Route::delete('/video/{id}/delete', 'VideoController@destroy')->name('video.destroy');


    Route::post('/route/create', 'RouteController@create')->name('route.create');
});

Route::get('/news', 'TaipeiCityController@news')->name('news');
Route::get('/news/{id}', 'TaipeiCityController@newsShow')->name('news.show');


Route::get('/Highlights', 'TaipeiCityController@Highlights')->name('Highlights');
Route::get('/Highlights/ExcitingActivity', 'TaipeiCityController@ExcitingActivity')->name('Highlights.EA');
Route::get('/Highlights/{type}/{id}', 'TaipeiCityController@select')->name('Highlights.select');
Route::get('/Highlights/{type}/{id}/{route}/{session}', 'TaipeiCityController@show')->name('Highlights.show');

Route::get('/Highlights/InstantActivity', 'TaipeiCityController@InstantActivity')->name('Highlights.IA');
Route::get('/Highlights/InstantActivity/show/{id}', 'TaipeiCityController@ShowInstantActivity')->name('Highlights.show.IA');


Route::get('/Highlights/WarmStory', 'TaipeiCityController@WarmStory')->name('Highlights.WS');
Route::get('/Highlights/WarmStory/{id}/show', 'TaipeiCityController@WarmStoryShow')->name('Highlights.WS.show');

Route::any('/show/image/download/{id}/{file}', function ($id, $file) {
    return response()->download(storage_path("app/" . $id . "/" . $file));
})->name('download');

Auth::routes();

Route::get('/manual', 'TaipeiCityController@manual')->name('index.manual');

Route::get('/map', 'TaipeiCityController@map')->name('index.map');
Route::get('/', 'TaipeiCityController@index')->name('index');
Route::get('/{id}', 'TaipeiCityController@activity')->name('index.activity');
Route::get('/{id}/{routeId}', 'TaipeiCityController@route')->name('index.route');





