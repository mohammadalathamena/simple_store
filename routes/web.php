<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;


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
    if (Session::get('login')=='loged') {
        return redirect()->back();
    }else{

        return view('auth/login');
    }
});

Route::get('/signup', function () {
    return view('sign_up');
});
Route::get('/logout', function () {
    \Auth::logout();
    return redirect('home');
});
Route::get('/indexCEO', "eremController@getdata")->middleware('auth');
Route::get('/indexSuper', "eremController@get_superuser_data")->middleware('auth');

Route::post('/save-medicine', "eremController@save");
Route::post('/add-medicine', "eremController@add_medicine");
// Route::post('/delet-select/{$id}', "eremController@delet_select");
Route::post('/add-employee', "eremController@add_employee");
Route::post('/edit-employee', "eremController@edit_employee");
Route::post('/userlogin', "eremController@login");
Route::get('/store', "eremController@get_user_data");
Route::get('/product/{id}', 'eremController@get_product');
// Route::get('/product/{id?}',function($id){
//     return $id ; 
// });



Route::post('/delete-all', "eremController@delet_select")->name('delete-all');
Route::post('/delete-all-emp', "eremController@delet_select_emp")->name('delete-all-emp');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
