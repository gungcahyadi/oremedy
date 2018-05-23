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

Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::group(['middleware' => 'guest'], function () {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
});

Route::get('/', 'FHomeController@index')->name('front.index');
$all_langs = config('app.all_langs');
foreach($all_langs as $prefix){
    Route::group(['prefix' => $prefix, 'middleware' => 'configcookieslang'], function() use ($prefix) {
        Route::get('/', 'FIndexController@index');
        Route::get(\Lang::get('route.product',[], $prefix), 'FProductController@index')->name('front.product.index');
        Route::get(\Lang::get('route.product',[], $prefix).'/{slug}', 'FProductController@detail')->name('front.product.detail');
        Route::get(\Lang::get('route.about',[], $prefix), 'FAboutController@index')->name('front.about');
        Route::get(\Lang::get('route.contact',[], $prefix), 'FContactController@index')->name('front.contact.index');
        Route::post(\Lang::get('route.contact',[], $prefix), 'FContactController@store')->name('front.contact.store');
    });
}

Route::get('sitemap.xml', 'FSiteMapController@siteMapRobot');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/', ['as' => 'admin.index', 'uses' => 'HomeController@index']);
    Route::resource('email', 'BEmailController', ['except' => 'show']);
    Route::resource('social-link', 'BSocialController', ['except' => 'show']);
    Route::resource('user', 'BAdminController', ['only' => [
        'index', 'create', 'store','destroy'
    ]]);
    Route::post('contact-messages/confirm',['as' => 'contact-messages.confirm', 'uses' => 'BContactController@confirm']);
    Route::resource('contact-messages', 'BContactController', ['only' => [
        'index', 'destroy'
    ]]);
    Route::get('changepassword','BUserController@password');
    Route::post('changepassword','BUserController@updatepassword');
    Route::get('menu-utama',['as' => 'menu-utama.index', 'uses' => 'BMenuUtamaController@index']);
    Route::get('menu-utama/{id}/edit',['as' => 'menu-utama.edit', 'uses' => 'BMenuUtamaController@edit']);
    Route::patch('menu-utama/{id}',['as' => 'menu-utama.update', 'uses' => 'BMenuUtamaController@update']);

    Route::get('config/homeslider',['as' => 'config.homeslider.index', 'uses' => 'BHomeSliderController@index']);
    Route::get('config/homeslider/create',['as' => 'config.homeslider.create', 'uses' => 'BHomeSliderController@create']);
    Route::post('config/homeslider',['as' => 'config.homeslider.store', 'uses' => 'BHomeSliderController@store']);
    Route::get('config/homeslider/{id}/edit',['as' => 'config.homeslider.edit', 'uses' => 'BHomeSliderController@edit']);
    Route::patch('config/homeslider/{id}',['as' => 'config.homeslider.update', 'uses' => 'BHomeSliderController@update']);
    Route::delete('config/homeslider/{id}',['as' => 'config.homeslider.destroy', 'uses' => 'BHomeSliderController@destroy']);

    Route::get('config/product',['as' => 'config.product.index', 'uses' => 'BProductController@index']);
    Route::get('config/product/create',['as' => 'config.product.create', 'uses' => 'BProductController@create']);
    Route::post('config/product',['as' => 'config.product.store', 'uses' => 'BProductController@store']);
    Route::get('config/product/{id}',['as' => 'config.product.edit', 'uses' => 'BProductController@edit']);
    Route::patch('config/product/{id}',['as' => 'config.product.update', 'uses' => 'BProductController@update']);
    Route::delete('config/product/{id}',['as' => 'config.product.destroy', 'uses' => 'BProductController@destroy']);

    Route::get('config/product-category/create',['as' => 'config.catproduct.create', 'uses' => 'BProductCatController@create']);
    Route::post('config/product-category',['as' => 'config.catproduct.store', 'uses' => 'BProductCatController@store']);
    Route::get('config/product-category/{id}',['as' => 'config.catproduct.edit', 'uses' => 'BProductCatController@edit']);
    Route::patch('config/product-category/{id}',['as' => 'config.catproduct.update', 'uses' => 'BProductCatController@update']);
    Route::delete('config/product-category/{id}',['as' => 'config.catproduct.destroy', 'uses' => 'BProductCatController@destroy']);

    Route::get('config/product-image/{parent_id}',['as' => 'config.productimage.index', 'uses' => 'BProductImageController@index']);
    Route::get('config/product-image/{parent_id}/create',['as' => 'config.productimage.create', 'uses' => 'BProductImageController@create']);
    Route::post('config/product-image/{parent_id}',['as' => 'config.productimage.store', 'uses' => 'BProductImageController@store']);
    Route::get('config/product-image/{id}/edit',['as' => 'config.productimage.edit', 'uses' => 'BProductImageController@edit']);
    Route::patch('config/product-image/{id}',['as' => 'config.productimage.update', 'uses' => 'BProductImageController@update']);
    Route::delete('config/product-image/{id}',['as' => 'config.productimage.destroy', 'uses' => 'BProductImageController@destroy']);

    Route::get('config/onpage-contact',['as' => 'config.onpage-contact.edit', 'uses' => 'BOnPageController@contact']);
    Route::patch('config/onpage-contact',['as' => 'config.onpage-contact.update', 'uses' => 'BOnPageController@updatecontact']);

    Route::get('web-config',['as' => 'web-config.index', 'uses' => 'BWebConfigController@index']);
    Route::patch('web-config',['as' => 'web-config.update', 'uses' => 'BWebConfigController@update']);

    Route::get('filemanager',['as' => 'filemanager.index', 'uses' => 'BWebConfigController@filemanager']);

    Route::post('data-registrasi/confirm',['as' => 'data-registrasi.confirm', 'uses' => 'BRegistrasiController@confirm']);
    Route::resource('data-registrasi', 'BRegistrasiController', ['only' => [
        'index', 'destroy'
    ]]);
});
Route::get('storage/{folder}/{filename}', 'StorageController@setstorage');
