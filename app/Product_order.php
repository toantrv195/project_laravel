<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_order extends Model {

	protected $table='product_orders';
	protected $fillable=['product_id','transaction_id','quantity','total','status'];
	public $timestamps = true;

	public function product(){
		return $this->HasMany('App\Product');
	}

	public function transaction(){
		return $this->belongTo('App\Transaction');
	}

}
