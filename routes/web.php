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
    return view('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('/admin', 'AdminUsersController');

Route::resource('/employee', 'EmployeeController');

Route::resource('/category', 'AdminCategoryController');

Route::resource('/product', 'AdminProductController');

Route::resource('/contact', 'ContactController');

Route::get('/contact/{id}', 'ContactController@display');
//
// Route::get('/contact/{id}', 'ContactController@show');

Route::resource('/transaction', 'TransactionController');

Route::get('/get', 'TransactionController@productList');

// Route::get('/profile', 'ProfileController@index');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::resource('/register', 'RegisterController');



// Route::get('/middleware', ['middleware'=>['role'], function(){
//
//   return
// }]);
