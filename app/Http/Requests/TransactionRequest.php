<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class TransactionRequest extends Request {

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
			'txtname'=>'required',
			'txtmail'=>'required',
			'txtphone'=>'required',
			'txtaddress'=>'required'
		];
	}

	public function messages(){
		return [
			'txtname.required'=>"Please Enter Your Name",
			'txtmail.required'=>"Please Enter Your Email",
			'txtphone.required'=>"Please Enter Your Phone Number",
			'txtaddress.required'=>"Please Enter Your Address"

		];
	}

}
