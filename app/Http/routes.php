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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// Admin
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

	//category
	Route::group(['prefix'=>'cate'],function(){
		Route::get('list',['as'=>'admin.cate.list','uses'=>'Catecontroller@getList']);
		Route::get('add',['as'=>'admin.cate.getadd','uses'=>'Catecontroller@getAdd']);
		Route::post('add',['as'=>'admin.cate.postadd','uses'=>'Catecontroller@postAdd']);
		Route::get('delete/{id}',['as'=>'admin.cate.getdelete','uses'=>'Catecontroller@getDelete']);
		Route::get('edit/{id}',['as'=>'admin.cate.getEdit','uses'=>'Catecontroller@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.cate.postEdit','uses'=>'Catecontroller@postEdit']);
	});

	//product
	Route::group(['prefix'=>'product'],function(){
		Route::get('list',['as'=>'admin.product.list','uses'=>'Productcontroller@getList']);
		Route::get('add',['as'=>'admin.product.getadd','uses'=>'Productcontroller@getAdd']);
		Route::post('add',['as'=>'admin.product.postadd','uses'=>'Productcontroller@postAdd']);
		Route::get('delete/{id}',['as'=>'admin.product.getdelete','uses'=>'Productcontroller@getDelete']);
		Route::get('edit/{id}',['as'=>'admin.product.getEdit','uses'=>'Productcontroller@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.product.postEdit','uses'=>'Productcontroller@postEdit']);

		//del_image 
		Route::get('delimg/{id}',['as'=>'admin.product.getDelImg','uses'=>'Productcontroller@getDelImg']);

	});

	//slider
	Route::group(['prefix'=>'slider'],function(){
		Route::get('list',['as'=>'admin.slider.list','uses'=>'SliderController@getlist']);
		Route::get('add',['as'=>'admin.slider.getadd','uses'=>'SliderController@getAdd']);
		Route::post('add',['as'=>'admin.slider.postadd','uses'=>'SliderController@postAdd']);
		Route::get('delete/{id}',['as'=>'admin.slider.getdelete','uses'=>'SliderController@getDelete']);
		Route::get('edit/{id}',['as'=>'admin.slider.getEdit','uses'=>'SliderController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.slider.postEdit','uses'=>'SliderController@postEdit']);
	});

	//user
	Route::group(['prefix'=>'user'],function(){
		Route::get('list',['as'=>'admin.user.list','uses'=>'Usercontroller@getList']);
		Route::get('add',['as'=>'admin.user.getadd','uses'=>'Usercontroller@getAdd']);
		Route::post('add',['as'=>'admin.user.postadd','uses'=>'Usercontroller@postAdd']);
		Route::get('delete/{id}',['as'=>'admin.user.getdelete','uses'=>'Usercontroller@getDelete']);
		Route::get('edit/{id}',['as'=>'admin.user.getEdit','uses'=>'Usercontroller@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.user.postEdit','uses'=>'Usercontroller@postEdit']);
	});
	//sale
	Route::group(['prefix'=>'sale'],function(){
		Route::get('list',['as'=>'admin.sale.List','uses'=>'SaleController@getList']);
		Route::get('add',['as'=>'admin.sale.getAdd','uses'=>'SaleController@getAdd']);
		Route::post('add',['as'=>'admin.sale.postAdd','uses'=>'SaleController@postAdd']);
		Route::get('delete/{id}',['as'=>'admin.sale.getDelete','uses'=>'SaleController@getDelete']);
		Route::get('edit/{id}',['as'=>'admin.sale.getEdit','uses'=>'SaleController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.sale.postEdit','uses'=>'SaleController@postEdit']);
	});
	//Transaction
	Route::group(['prefix'=>'transaction'],function(){
		Route::get('list',['as'=>'admin.transaction.list','uses'=>'TransController@getList']);
		Route::get('delete/{id}',['as'=>'admin.transaction.getdelete','uses'=>'TransController@getDelete']);
		Route::get('list_detail/{id}',['as'=>'admin.transaction.detail','uses'=>'TransController@getListdetail']);
		Route::post('list_detail/{id}',['as'=>'admin.transaction.postEdit','uses'=>'TransController@postListdetail']);
	});
});


//sanpham
Route::get('loai-san-pham/{id}/{tenloai}',['as'=>'loaisanpham','uses'=>'WelcomeController@loaisanpham']);
//chi tiết sản phẩm
Route::get('chi-tiet-san-pham/{id}/{tenloai}',['as'=>'chitietsanpham','uses'=>'WelcomeController@chitietsanpham']);
//lien he
Route::get('lien-he',['as'=>'getlienhe','uses'=>'WelcomeController@getlienhe']);
Route::post('lien-he',['as'=>'postlienhe','uses'=>'WelcomeController@postlienhe']);

//shopping cart
Route::get('mua-hang/{id}/{tensanpham}',['as'=>'muahang','uses'=>'WelcomeController@muahang']);
//giỏ hàng
Route::get('gio-hang',['as'=>'giohang','uses'=>'WelcomeController@giohang']);
Route::get('xoa-san-pham/{id}',['as'=>'xoasanpham','uses'=>'WelcomeController@xoasanpham']);
Route::get('cap-nhat/{id}/{qty}',['as'=>'capnhat','uses'=>'WelcomeController@capnhat']);
//checkout
Route::get('thanh-toan',['as'=>'getthanhtoan','uses'=>'WelcomeController@getthanhtoan']);
Route::post('thanh-toan',['as'=>'postthanhtoan','uses'=>'WelcomeController@postthanhtoan']);