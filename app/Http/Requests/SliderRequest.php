<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SliderRequest extends Request {

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
			'txtName' => 'required|unique:products,name',
			'fImages'=>'required|image' 
		];
	}

	public function messages(){
		return[

			'txtName.required' => 'Please Enter Name Slider',
			'txtName.unique' => 'Slider Name Is Exist',
			'fImages.required' => 'Please Choose Images',
			'fImages.image' => 'This File Is Not Images'
		];
	}

}
