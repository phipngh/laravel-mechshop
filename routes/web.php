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
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//admin

Route::prefix('admin')->group(function (){
    Route::get('/dashboard','AdminController@dashboard')->name('adminDashboard');

    Route::get('/catelogies','AdminController@catelogies')->name('adminCatelogies');
    Route::post('/catelogies','AdminController@catelogiesCreate')->name('adminCatelogiesCreate');
    Route::get('/catelogies/{id}/edit','AdminController@catelogiesEdit')->name('adminCatelogiesEdit');
    Route::post('/catelogies/{id}/edit','AdminController@catelogiesUpdate')->name('adminCatelogiesUpdate');
    Route::post('/catelogies/{id}/delete','AdminController@catelogiesDestroy')->name('adminCatelogiesDestroy');

    Route::get('/brands','AdminController@brands')->name('adminBrands');
    Route::post('/brands','AdminController@brandssCreate')->name('adminBrandsCreate');
    Route::get('/brands/{id}/edit','AdminController@brandsEdit')->name('adminBrandsEdit');
    Route::post('/brands/{id}/edit','AdminController@brandsUpdate')->name('adminBrandsUpdate');
    Route::post('/brands/{id}/delete','AdminController@brandsDestroy')->name('adminBrandsDestroy');

    Route::get('/products','AdminController@products')->name('adminProducts');
    Route::post('/products','AdminController@productsCreate')->name('adminProductsCreate');
    Route::get('/products/{id}/edit','AdminController@productsEdit')->name('adminProductsEdit');
    Route::post('/products/{id}/edit','AdminController@productsUpdate')->name('adminProductsUpdate');
    Route::post('/products/{id}/delete','AdminController@productsDestroy')->name('adminProductsDestroy');

    Route::get('/users','AdminController@users')->name('adminUsers');
    Route::get('/users/{id}/admin','AdminController@usersAdmin')->name('adminUsersAdmin');
    Route::get('/users/{id}/unadmin','AdminController@usersUnAdmin')->name('adminUsersUnAdmin');
    Route::get('/users/{id}/manager','AdminController@usersManager')->name('adminUsersManager');
    Route::get('/users/{id}/unmanager','AdminController@usersUnManager')->name('adminUsersUnManager');

    Route::post('/users','AdminController@usersCreate')->name('adminUsersCreate');
    Route::post('/users/{id}/delete','AdminController@usersDestroy')->name('adminUsersDestroy');

    Route::get('/stocks','AdminController@stocks')->name('adminStocks');

    Route::get('/profile','AdminController@profile')->name('adminProfile');
    Route::post('/profile','AdminController@profileUpdate')->name('adminProfileUpdate');
});

