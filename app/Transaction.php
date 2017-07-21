<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {

	protected $table='transaction';
	protected $fillable=['name','email','phone','address','city','intro','status','total'];
	public $timestamps = true;

	public function product_order(){
		return $this->HasMany('App\Product_order');
	}

}
