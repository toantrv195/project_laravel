<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	protected $table='category';
	protected $fillable=['name','alias','order','parent_id','keywords','description'];
	public $timestamps = true;

	public function product(){
		return $this->HasMany('App\Product');
	}

}
