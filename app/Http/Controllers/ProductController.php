<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/*use Illuminate\Http\Request;*/
use App\Category;
use App\Product;
use App\ProductImage;
use File; 
use Input;
use Request;
use Auth;
use App\Http\Requests\ProductRequest;
class ProductController extends Controller {

	public function getList(){
		$data = Product::select('id','name','price','cate_id','created_at')->orderBy('id','DESC')->get()->toArray();
		return view('admin.product.list',compact('data'));
	}

	public function getAdd(){
		$cate = Category::select('id','name','parent_id')->get()->toArray();
		return view('admin.product.add',compact('cate'));
	} 
	public function postAdd(ProductRequest $request){
		$file_name=$request->file('fImages')->getClientOriginalName();
		$product = new Product();
		$product->name = $request->txtName;
		$product->alias =changeTitle($request->txtName);
		$product->price =$request->txtPrice;
		$product->intro =$request->txtIntro;
		$product->content =$request->txtContent;
		$product->image = $file_name;
		$product->keywords =$request->txtKeywords;
		$product->description =$request->txtDescription;
		$product->user_id = Auth::user()->id;
		$product->cate_id =$request->sltparent;
		$request -> file('fImages')->move('resources/upload/', $file_name);
		$product->save();

		//detail product Image
		$product_id = $product->id;
		if(Input::hasFile('productdetail'))
		{
			foreach (Input::file('productdetail') as $file) {
				$product_img = new ProductImage();
				if(isset($file)){
					$product_img->image = $file->getClientOriginalName();
					$product_img->product_id = $product_id;
					$file->move('resources/upload/detail/', $file->getClientOriginalName());
					$product_img->save();
				}
			}
		}
		return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Add Product']);
	}

	public function getDelete($id){
		//delete data in product_image
		$product_detail = Product::find($id)->pimage->toArray();
		foreach ($product_detail as $value) {
			File::delete('resources/upload/detail/'.$value["image"]);
		}
		//del data in Product
		$product = Product::find($id);
		File::delete('resources/upload/'.$product->image);
		$product->delete($id);
		return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Delete Product']);
	}

	public function getEdit($id){
		$cate = Category::select('id','name','parent_id')->get()->toArray();
		$product =Product::find($id);
		$product_image = Product::find($id)->pimage()->get()->toArray();
		return view('admin.product.edit',compact('cate','product','product_image'));
	}

	//post edit product
	public function postEdit($id,Request $request){

		$product = Product::find($id);
		$product->name = request::input('txtName');
		$product->alias = changeTitle(Request::input('txtName'));
		$product->price = request::input('txtPrice');
		$product->intro = request::input('txtIntro');
		$product->content = request::input('txtContent');
		$product->keywords = request::input('txtkeywords');
		$product->description = request::input('txtDescription');
		$product->user_id =  Auth::user()->id;
		$product->cate_id = request::input('sltparent');
		$img_current = 'resources/upload/'.Request::input('img_current');
		if (!empty(Request::file('fImages')))  
		{ 
			$file_name = Request::file('fImages')->getClientOriginalName();
			$product->image = $file_name;
			Request::file('fImages')->move('resources/upload/',$file_name);
			if(File::exists($img_current)) {
				File::delete($img_current);
			} 

		}else{
			echo "Not Exists File";
			
		}
		$product->save();

		//product_image
		if (!empty(Request::file('fEditdetail'))) {
			foreach (Request::file('fEditdetail') as $file) {
				$image_product = new ProductImage();
				if (isset($file)) {
					$image_product->image = $file->getClientOriginalName();
					$image_product->product_id = $id;
					$file->move('resources/upload/detail/',$file->getClientOriginalName());
					$image_product->save();
				}
			}
		}

		return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Update Product']);
		
	}

	public function getDelImg($id){
		if (Request::ajax()) {
			$idHinh = (int)Request::get('idHinh');
			$image_detail = ProductImage::find($idHinh);
			if (!empty($image_detail)) {
				$img = 'resources/upload/detail/'.$image_detail->image;
				if(File::exists($img)) {
				File::delete($img);
			} 
				$image_detail->delete();
			}
			return "Oke";
		}
	}

	

}
