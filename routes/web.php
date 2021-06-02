<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//admin
Route::prefix('admin')->group(function(){
Route::get('/',[
    'as'=> 'admin',
    'uses'=>'AdminController@index'
]);
Route::prefix('categories')->group(function () {
    Route::get('/',[
        'as'=>'categories.index',
        'uses'=>'CategoryController@index',
        'middleware'=>'can:category_list'
    ]);
    Route::get('/create',[
        'as'=>'categories.create',
        'uses'=>'CategoryController@create'
    ]);
    Route::post('/store',[
        'as'=>'category.store',
        'uses'=>'CategoryController@store'
    ]);
    Route::get('/edit/{id}',[
        'as'=>'category.edit',
        'uses'=>'CategoryController@edit'
    ]);
    Route::post('/update/{id}',[
        'as'=>'category.update',
        'uses'=>'CategoryController@update'
    ]);
    Route::get('/delete/{id}',[
        'as'=>'category.delete',
        'uses'=>'CategoryController@delete'
    ]);

});
Route::prefix('menus')->group(function () {
    Route::get('/',[
        'as'=>'menus.index',
        'uses'=>'menusController@index'
    ]);
    Route::get('/create',[
        'as'=>'menus.create',
        'uses'=>'menusController@create'
    ]);
    Route::post('/store',[
        'as'=>'menus.store',
        'uses'=>'menusController@store'
    ]);
    Route::get('/edit/{id}',[
        'as'=>'menus.edit',
        'uses'=>'menusController@edit'
    ]);
    Route::post('/update/{id}',[
        'as'=>'menus.update',
        'uses'=>'menusController@update'
    ]);
    Route::get('/delete/{id}',[
        'as'=>'menus.delete',
        'uses'=>'menusController@delete'
    ]);

});
Route::prefix('product')->group(function () {
    Route::get('/',[
        'as'=>'product.index',
        'uses'=>'ProductController@index'
    ]);
    Route::get('/create',[
        'as'=>'product.create',
        'uses'=>'ProductController@create'
    ]);
    Route::post('/store',[
        'as'=>'product.store',
        'uses'=>'ProductController@store'
    ]);
    Route::get('/edit/{id}',[
        'as'=>'product.edit',
        'uses'=>'ProductController@edit'/* ,
        'middleware'=>'can:product_update,id' */
    ]);
    Route::post('/update/{id}',[
        'as'=>'product.update',
        'uses'=>'ProductController@update'
    ]);
    Route::get('/delete/{id}',[
        'as'=>'product.delete',
        'uses'=>'ProductController@delete'
    ]);
});
Route::prefix('singer')->group(function () {
    Route::get('/',[
        'as'=>'singer.index',
        'uses'=>'singerController@index'
    ]);
    Route::get('/create',[
        'as'=>'singer.create',
        'uses'=>'singerController@create'
    ]);
    Route::post('/store',[
        'as'=>'singer.store',
        'uses'=>'singerController@store'
    ]);
    Route::get('/edit/{id}',[
        'as'=>'singer.edit',
        'uses'=>'singerController@edit'
    ]);
    Route::post('/update/{id}',[
        'as'=>'singer.update',
        'uses'=>'singerController@update'
    ]);
    Route::get('/delete/{id}',[
        'as'=>'singer.delete',
        'uses'=>'singerController@delete'
    ]);
});
Route::prefix('slider')->group(function(){
    Route::get('/',[
        'as'=>'slider.index',
        'uses'=>'sliderController@index'
    ]);
    Route::get('create',[
        'as'=>'slider.create',
        'uses'=>'sliderController@create'
    ]);
    Route::post('store',[
        'as'=>'slider.store',
        'uses'=>'sliderController@store'
    ]);
    Route::get('edit/{id}',[
        'as'=>'slider.edit',
        'uses'=>'sliderController@edit'
    ]);
    Route::post('update/{id}',[
        'as'=>'slider.update',
        'uses'=>'sliderController@update'
    ]);
    Route::get('delete/{id}',[
        'as'=>'slider.delete',
        'uses'=>'sliderController@delete'
    ]);
    
});
Route::prefix('settings')->group(function(){
    Route::get('/',[
        'as'=>'setting.index',
        'uses'=>'SettingController@index'
    ]);
    Route::get('create',[
        'as'=>'setting.create',
        'uses'=>'SettingController@create'
    ]);
    Route::post('store',[
        'as'=>'setting.store',
        'uses'=>'SettingController@store'
    ]);
    Route::get('edit/{id}',[
        'as'=>'setting.edit',
        'uses'=>'SettingController@edit'
    ]);
    Route::post('update/{id}',[
        'as'=>'setting.update',
        'uses'=>'SettingController@update'
    ]);
    Route::get('delete/{id}',[
        'as'=>'setting.delete',
        'uses'=>'SettingController@delete'
    ]);
    
    
});
Route::prefix('users')->group(function(){
    Route::get('/',[
        'as'=>'user.index',
        'uses'=>'userController@index'
    ]);
    Route::get('create',[
        'as'=>'user.create',
        'uses'=>'userController@create'
    ]);
    Route::post('store',[
        'as'=>'user.store',
        'uses'=>'userController@store'
    ]);
    Route::get('edit/{id}',[
        'as'=>'user.edit',
        'uses'=>'userController@edit'
    ]);
    Route::post('update/{id}',[
        'as'=>'user.update',
        'uses'=>'userController@update'
    ]);
    Route::get('delete/{id}',[
        'as'=>'user.delete',
        'uses'=>'userController@delete'
    ]);
    
    
});
Route::prefix('role')->group(function(){
    Route::get('/',[
        'as'=>'role.index',
        'uses'=>'roleController@index'
    ]);
    Route::get('create',[
        'as'=>'role.create',
        'uses'=>'roleController@create'
    ]);
    Route::post('store',[
        'as'=>'role.store',
        'uses'=>'roleController@store'
    ]);
    Route::get('edit/{id}',[
        'as'=>'role.edit',
        'uses'=>'roleController@edit'
    ]);
    Route::post('update/{id}',[
        'as'=>'role.update',
        'uses'=>'roleController@update'
    ]);
    Route::get('delete/{id}',[
        'as'=>'role.delete',
        'uses'=>'roleController@delete'
    ]);
    
});
Route::prefix('permission')->group(function(){
    Route::get('/',[
        'as'=>'permission.create',
        'uses'=>'permissionController@create'
    ]);
    Route::post('store',[
        'as'=>'permission.store',
        'uses'=>'permissionController@store'
    ]);
});
});
