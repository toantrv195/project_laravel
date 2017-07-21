<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	//
	protected $table='products';
	protected $fillable=['name','alias','price','intro','content','image','keywords','description','user_id','cate_id'];
	public $timestamps = true;


	public function category(){
		return $this->belongTo('App\Category');
	}

	public function user(){
		return $this->belongTo('App\User');
	}

	public function pimage(){
		return $this->HasMany('App\ProductImage');
	}

	public function sale(){
		return $this->belongTo('App\Sale');
	}
	public function product_oder(){
		return $this->belongTo('App\Product_order');
	}
}
