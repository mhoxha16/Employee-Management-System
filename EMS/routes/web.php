<?php
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UserController;
use App\Events\MessagePosted;

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

Route::get('/', 'HomeController@index')->name('home');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::post('home', 'HomeController@update_avatar');
Route::resource('User', 'HomeController');
Route::get('/users/showall', 'UserController@showAllUsers')->middleware('adminMiddleware');
Route::get('/users/edit/{user}', 'UserController@edit')->middleware('adminMiddleware');
Route::patch('/users/edit/{user}/update', 'UserController@update')->middleware('adminMiddleware');
Route::delete('users/showall/delete/{user}', 'UserController@destroy')->middleware('adminMiddleware');
Route::post('/departments/add_tree', 'DepartmentController@add_tree');
Route::get('/departments/tree', 'DepartmentController@treeView')->name('tree');
Route::get('/departments/show/{department}', 'DepartmentController@show_users_of_dep');
Route::delete('/departments/show/delete', 'DepartmentController@delete');
Route::patch('departments/show/update/{user_id}', 'DepartmentController@update_id_dep');
Route::get('/chat', 'MessagesController@index');
Route::get('/messages', 'MessagesController@fetchMessages');
Route::post('/messages', 'MessagesController@sendMessage');
