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

Route::get('/','Page\IndexController@index');
Route::get('gio-hang','Page\CartController@index');
Route::get('{cat}','Page\ListController@index');
Route::get('{id}-{slug}','Page\DetailController@index');
Route::get('/cart/addItem/{id}', 'Page\CartController@addItem');

//Route::get('{cat}/{slug}','Page\DetailC');

Route::group(['prefix'=>'admin',/*'middleware'=> ['web', 'auth']*/],function()
{
    Route::get('/home', function() {
        return view('back-end.home');
    });
    // -------------------- quan ly danh muc----------------------
    Route::group(['prefix' => 'danhmuc'], function() {
        Route::get('add',['as'        =>'getaddcat','uses' => 'Category\CategoryController@getadd']);
        Route::post('add',['as'       =>'postaddcat','uses' => 'Category\CategoryController@postadd']);

        Route::get('/',['as'       =>'getcat','uses' => 'Category\CategoryController@getlist']);
        Route::get('del/{id}',['as'   =>'getdellcat','uses' => 'Category\CategoryController@getdel'])->where('id','[0-9]+');

        Route::get('sua/{id}',['as'  =>'geteditcat','uses' => 'Category\CategoryController@getedit'])->where('id','[0-9]+');
        Route::post('sua/{id}',['as' =>'posteditcat','uses' => 'Category\CategoryController@postedit'])->where('id','[0-9]+');
    });
    // -------------------- quan ly danh muc bài viết-----------------------------
    Route::group(['prefix' => '/danhmuc-tin-tuc'], function() {
        Route::get('/add',['as'        =>'getaddnews','uses' => 'CategoryNews\CategoryNewsController@getAdd']);
        Route::post('/add',['as'       =>'postaddnews','uses' => 'CategoryNews\CategoryNewsController@postAdd']);

        Route::get('/list', 'CategoryNews\CategoryNewsController@index')->name('category_news.list');
        Route::get('/del/{id}',['as'   =>'getdellnews','uses' => 'CategoryNews\CategoryNewsController@getDel'])->where('id','[0-9]+');

        Route::get('/edit/{id}',['as'  =>'geteditnews','uses' => 'CategoryNews\CategoryNewsController@getEdit'])->where('id','[0-9]+');
        Route::post('/edit/{id}',['as' =>'posteditnews','uses' => 'CategoryNews\CategoryNewsController@postEdit'])->where('id','[0-9]+');
    });
    Route::group(['prefix' => '/news'], function() {
        Route::get('/add',['as'        =>'getaddnews','uses' => 'News\NewsController@getadd']);
        Route::post('/add',['as'       =>'postaddnews','uses' => 'News\NewsController@postadd']);

        Route::get('/',['as'       =>'getnews','uses' => 'News\NewsController@getlist']);
        Route::get('/del/{id}',['as'   =>'getdellnews','uses' => 'News\NewsController@getdel'])->where('id','[0-9]+');

        Route::get('/edit/{id}',['as'  =>'geteditnews','uses' => 'News\NewsController@getedit'])->where('id','[0-9]+');
        Route::post('/edit/{id}',['as' =>'posteditnews','uses' => 'News\NewsController@postedit'])->where('id','[0-9]+');
    });

    // -------------------- quan ly danh muc--------------------
    Route::group(['prefix' => '/sanpham'], function() {
        Route::get('/{loai}/add',['as'        =>'getaddpro','uses' => 'Product\ProductsController@getadd']);
        Route::post('/{loai}/add',['as'       =>'postaddpro','uses' => 'Product\ProductsController@postadd']);

        Route::get('/{loai}',['as'       =>'getpro','uses' => 'Product\ProductsController@getlist']);
        Route::get('/del/{id}',['as'   =>'getdellpro','uses' => 'Product\ProductsController@getdel'])->where('id','[0-9]+');

        Route::get('/edit/{id}',['as'  =>'geteditpro','uses' => 'Product\ProductsController@getedit'])->where('id','[0-9]+');
        Route::post('/edit/{id}',['as' =>'posteditpro','uses' => 'Product\ProductsController@postedit'])->where('id','[0-9]+');
    });

    // -------------------- quan ly đơn đặt hàng--------------------
    Route::group(['prefix' => '/donhang'], function() {;

        Route::get('',['as'       =>'getpro','uses' => 'Order\OdersController@getlist']);
        Route::get('/del/{id}',['as'   =>'getdeloder','uses' => 'Order\OdersController@getdel'])->where('id','[0-9]+');

        Route::get('/detail/{id}',['as'  =>'getdetail','uses' => 'OdersController@getdetail'])->where('id','[0-9]+');
        Route::post('/detail/{id}',['as' =>'postdetail','uses' => 'OdersController@postdetail'])->where('id','[0-9]+');
    });
    // -------------------- quan ly thong tin khach hang--------------------
    Route::group(['prefix' => '/khachhang'], function() {;

        Route::get('',['as'       =>'getmem','uses' => 'UsersController@getlist']);
        Route::get('/del/{id}',['as'   =>'getdelmem','uses' => 'UsersController@getdel'])->where('id','[0-9]+');

        Route::get('/edit/{id}',['as'  =>'geteditmem','uses' => 'UsersController@getedit'])->where('id','[0-9]+');
        Route::post('/edit/{id}',['as' =>'posteditmem','uses' => 'UsersController@postedit'])->where('id','[0-9]+');
    });
    // -------------------- quan ly thong nhan vien--------------------
    Route::group(['prefix' => '/nhanvien'], function() {;

        Route::get('',['as'       =>'getnv','uses' => 'Admin_usersController@getlist']);
        Route::get('/del/{id}',['as'   =>'getdelnv','uses' => 'Admin_usersController@getdel'])->where('id','[0-9]+');

        Route::get('/edit/{id}',['as'  =>'geteditnv','uses' => 'Admin_usersController@getedit'])->where('id','[0-9]+');
        Route::post('/edit/{id}',['as' =>'posteditnv','uses' => 'Admin_usersController@postedit'])->where('id','[0-9]+');
    });
    // ---------------van de khac ----------------------
    Route::group(['prefix' => '/banner'], function() {;
        Route::get('/add','Banner\CreateController@index');
        Route::post('/add','Banner\StoreController@index')->name('banner.store');

        Route::get('list','Banner\BannerController@index')->name('banner.index');
        Route::get('/del/{id}','Banner\DeleteController@index')->where('id','[0-9]+');

        Route::get('/edit/{id}','Banner\EditController@index')->where('id','[0-9]+');
        Route::post('/update', 'Banner\UpdateController@index')->name('banner.update');
    });
    Route::group(['prefix' => '/brand'], function() {;
        Route::get('/add','Manufacturer\CreateController@index');
        Route::post('/add','Manufacturer\StoreController@index')->name('brand.store');

        Route::get('list','Manufacturer\IndexController@index')->name('brand.index');
        Route::get('/del/{id}','Manufacturer\DeleteController@index')->where('id','[0-9]+');

        Route::get('/edit/{id}','Manufacturer\EditController@index')->where('id','[0-9]+');
        Route::post('/update', 'Manufacturer\UpdateController@index')->name('brand.update');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
