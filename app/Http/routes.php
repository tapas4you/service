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



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['middleware' => ['auth']], function () {
Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('services', 'ServiceController@showAllSerivces');
Route::post('services/updateService', 'ServiceController@updateServices');
Route::post('services/createService', 'ServiceController@createServices');
Route::post('services/addEditServices', 'ServiceController@showServiceModal');
Route::post('services/deleteService', 'ServiceController@deleteService');

Route::get('animals', 'AnimalController@showAllAnimals');
Route::post('animals/update', 'AnimalController@updateAnimals');
Route::post('animals/create', 'AnimalController@createAnimals');
Route::post('animals/addEdit', 'AnimalController@showAnimalModal');
Route::post('animals/deleteAnimal', 'AnimalController@deleteAnimal');

Route::get('service-animals', 'ServiceController@showAllSerivcesAnimals');
Route::post('services/updateServiceAnimals', 'ServiceController@updateServiceAnimals');
Route::post('services/addEditServiceAnimals', 'ServiceController@showServiceAnimalsModal');
Route::post('services/deleteServiceAnimal', 'ServiceController@deleteServiceAnimal');
});
