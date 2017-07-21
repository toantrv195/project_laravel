<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/*use Illuminate\Http\Request;*/
use App\Slider;
use File;
use Input;
use Request;
use App\Http\Requests\SliderRequest;

class SliderController extends Controller {

	public function getlist(){
		$slider_list =Slider::select('id','name','image','content','link')->orderBy('id','DESC')->get();
		return view('admin.slider.list',compact('slider_list'));
	}

	public function getAdd(){

		return view('admin.slider.add');
	}

	public function postAdd(SliderRequest $request){
		$file_name = $request->file('fImages')->getClientOriginalName();
		$slider = new Slider();
		$slider->name = $request->txtName;
		$slider->image=$file_name;
		$slider->content = $request->txtContent;
		$slider->link =$request->link;
		$request->file('fImages')->move('resources/upload/slider/', $file_name);
		$slider->save();
		return redirect()->route('admin.slider.list')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Add Slider']);
		
	}

	public function getDelete($id){
		$slider = Slider::find($id);
		File::delete('resources/upload/slider/'.$slider->image);
		$slider->delete($id);
		return redirect()->route('admin.slider.list')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Delete Slider']);
		
	}

	public function getEdit($id){
		$slider_edit = Slider::find($id);
		return view('admin.slider.edit',compact('slider_edit'));
		
	}

	public function postEdit($id,Request $request){
		$slider = Slider::find($id);
		$slider->name = request::input('txtName');
		$slider->content = request::input('txtContent');
		$slider->link = request::input('link');
		$img_current = 'resources/upload/slider/'.Request::input('img_current');
		if(!empty(Request::file('fImages')))
		{
			$file_name = Request::file('fImages')->getClientOriginalName();
			$slider->image = $file_name;
			Request::file('fImages')->move('resources/upload/slider/',$file_name);
			if(File::exists($img_current)){
				File::delete($img_current);
			}
		} else{
			echo "Not Exists File";
		}
		$slider->save();
		return redirect()->route('admin.slider.list')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete update Slider']); 
		
	}
}
