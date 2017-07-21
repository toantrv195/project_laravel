<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SaleRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'option_sale'=>'required',
			'txtdiscount'=>'required'
		];
	}

	public function messages(){
		return [
			'option_sale.required'=>'Please Choose product Name',
			'txtdiscount.required'=>'Please Enter Discount'
		];
	}

}
