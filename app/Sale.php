<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model {

	protected $table='sales';
	protected $fillable=['name','discount','product_id'];
	public $timestamps = true;

	public function product(){
		return $this->HasMany('App\Product');
	}

}
