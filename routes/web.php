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

Route::get('/test',function (){
    return view('website.test');
})->name('text');
Route::post('/store','BlockController@store')->name('store');
Route::get('/map','BlockController@map')->name('map');
Route::post('/map','BlockController@path')->name('pathtorect');


Route::group(['namespace'=>'Website'],function (){

    Route::get('/','WebsiteController@index')->name('index');
    Route::post('/contact','WebsiteController@contact')->name('website.contact');

    Route::group(['prefix'=>'search'],function (){
       Route::get('/allsearch','SearchController@allSearch')->name('website.allsearch');
       Route::get('/allfactories','SearchController@allFactories')->name('website.allfactories');
       Route::get('/allproducts','SearchController@allProducts')->name('website.allproducts');
       Route::get('/allservices','SearchController@allServices')->name('website.allservices');
    });

    Route::group(['prefix'=>'shows'],function (){
        Route::get('/factory/{id}','ShowController@factory')->name('website.show.factory');
        Route::post('/product','ShowController@product')->name('website.show.product');
        Route::post('/service','ShowController@service')->name('website.show.service');
    });

    Route::group(['prefix'=>'map'],function (){
        Route::get('/map','MapController@index')->name('website.map');
        Route::post('/factory','MapController@factory')->name('website.map.factory');
       // Route::post('/service','ShowController@service')->name('website.show.service');
    });


});





/***************************************************/

//Start Admin Routes

/***************************************************/


Route::group(['prefix'=>'admin'],function (){
    Route::group(['namespace'=>'Auth'],function (){
        Route::get('/login','AdminLoginController@getLogin')->name('admin.getlogin');
        Route::post('/login','AdminLoginController@login')->name('admin.login');
        Route::get('/logout','AdminLoginController@logout')->name('admin.logout');
    });
    Route::group(['namespace'=>'Admin','middleware'=>'auth:admin'],function (){
        Route::get('/','DashboardController@index')->name('admin.index');
        Route::get('/profile','DashboardController@getProfile')->name('admin.getprofile');
        Route::post('/profile','DashboardController@profile')->name('admin.profile');
        Route::get('/password','DashboardController@getPassword')->name('admin.getpassword');
        Route::post('/password','DashboardController@password')->name('admin.password');

        Route::group(['prefix'=>'map'],function (){
            Route::get('/','MapController@map')->name('admin.map');
            Route::post('/show','MapController@show')->name('admin.map.show');
            Route::get('/block','MapController@getBlock')->name('admin.map.getblock');
            Route::post('/block','MapController@block')->name('admin.map.block');
            Route::get('/delete/{id}','MapController@delete')->name('admin.map.delete');
            Route::get('/accept/{id}','MapController@accept')->name('admin.map.accept');
        });

        Route::group(['prefix'=>'categories'],function (){
            Route::get('/','CategoryController@index')->name('admin.categories');
            Route::get('/create','CategoryController@create')->name('admin.categories.create');
            Route::post('/store','CategoryController@store')->name('admin.categories.store');
            Route::get('/edit/{id}','CategoryController@edit')->name('admin.categories.edit');
            Route::post('/update','CategoryController@update')->name('admin.categories.update');
            Route::get('/delete/{id}','CategoryController@delete')->name('admin.categories.delete');
        });

         Route::group(['prefix'=>'products'],function (){
             Route::get('/','ProductController@index')->name('admin.products');
             Route::get('/delete/{id}','ProductController@delete')->name('admin.products.delete');
             Route::post('/show','ProductController@show')->name('admin.products.show');
         });

         Route::group(['prefix'=>'services'],function (){
             Route::get('/','ServiceController@index')->name('admin.services');
             Route::get('/delete/{id}','ServiceController@delete')->name('admin.services.delete');
             Route::post('/show','ServiceController@show')->name('admin.services.show');
         });

        Route::group(['prefix'=>'factories'],function (){
            Route::get('/','FactoryController@index')->name('admin.factories');
            Route::get('/delete/{id}','FactoryController@delete')->name('admin.factories.delete');
            Route::post('/show','FactoryController@show')->name('admin.factories.show');
            Route::post('/status','FactoryController@status')->name('admin.factories.status');
        });

        Route::group(['prefix'=>'users'],function (){
            Route::get('/','UserController@index')->name('admin.users');
            Route::get('/delete/{id}','UserController@delete')->name('admin.users.delete');
            Route::post('/status','UserController@status')->name('admin.users.status');
        });




     });

});


/****************************************************/

//End Admin Routes

/****************************************************/





/***************************************************/

//Start Factory Routes

/***************************************************/

Route::group(['prefix'=>'factory'],function (){
    Route::group(['namespace'=>'Auth'],function (){
        Route::get('/login','FactoryLoginController@getLogin')->name('factory.getlogin');
        Route::post('/login','FactoryLoginController@login')->name('factory.login');
        Route::get('/register','FactoryRegisterController@getRegister')->name('factory.getregister');
        Route::post('/register','FactoryRegisterController@register')->name('factory.register');
        Route::get('/logout','FactoryLoginController@logout')->name('factory.logout');
    });
    Route::group(['namespace'=>'Factory','middleware'=>'auth:factory'],function (){
        Route::get('/','DashboardController@index')->name('factory.index');
        Route::get('/profile','DashboardController@getProfile')->name('factory.getprofile');
        Route::post('/profile','DashboardController@profile')->name('factory.profile');
        Route::get('/password','DashboardController@getPassword')->name('factory.getpassword');
        Route::post('/password','DashboardController@password')->name('factory.password');

        Route::group(['prefix'=>'map'],function (){
           Route::get('/','MapController@map')->name('factory.map');
           Route::post('/delete','MapController@delete')->name('factory.delete');
           Route::post('/add','MapController@add')->name('factory.add');
        });

        Route::group(['prefix'=>'categories'],function (){
            Route::get('/','CategoryController@index')->name('factory.categories');
            Route::get('/create','CategoryController@create')->name('factory.categories.create');
            Route::post('/store','CategoryController@store')->name('factory.categories.store');
            Route::get('/edit/{id}','CategoryController@edit')->name('factory.categories.edit');
            Route::post('/update','CategoryController@update')->name('factory.categories.update');
            Route::get('/delete/{id}','CategoryController@delete')->name('factory.categories.delete');
        });

        Route::group(['prefix'=>'mobiles'],function (){
            Route::get('/','MobileController@index')->name('factory.mobiles');
            Route::get('/create','MobileController@create')->name('factory.mobiles.create');
            Route::post('/store','MobileController@store')->name('factory.mobiles.store');
            Route::get('/edit/{id}','MobileController@edit')->name('factory.mobiles.edit');
            Route::post('/update','MobileController@update')->name('factory.mobiles.update');
            Route::get('/delete/{id}','MobileController@delete')->name('factory.mobiles.delete');
        });

        Route::group(['prefix'=>'products'],function (){
            Route::get('/','ProductController@index')->name('factory.products');
            Route::get('/create','ProductController@create')->name('factory.products.create');
            Route::post('/store','ProductController@store')->name('factory.products.store');
            Route::get('/edit/{id}','ProductController@edit')->name('factory.products.edit');
            Route::post('/update','ProductController@update')->name('factory.products.update');
            Route::get('/delete/{id}','ProductController@delete')->name('factory.products.delete');
            Route::post('/show','ProductController@show')->name('factory.products.show');
            Route::post('/status','ProductController@status')->name('factory.products.status');
        });

        Route::group(['prefix'=>'services'],function (){
            Route::get('/','ServiceController@index')->name('factory.services');
            Route::get('/create','ServiceController@create')->name('factory.services.create');
            Route::post('/store','ServiceController@store')->name('factory.services.store');
            Route::get('/edit/{id}','ServiceController@edit')->name('factory.services.edit');
            Route::post('/update','ServiceController@update')->name('factory.services.update');
            Route::get('/delete/{id}','ServiceController@delete')->name('factory.services.delete');
            Route::post('/show','ServiceController@show')->name('factory.services.show');
            Route::post('/status','ServiceController@status')->name('factory.services.status');
        });
    });

});











Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
