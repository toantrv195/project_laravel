<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\Sale;
use App\Http\Requests\SaleRequest;

class SaleController extends Controller {

	public function getList(){
    	$product = Product::select('id','name','image')->get();
      $discount = Sale::select('id','discount','product_id')->orderBy('id','DESC')->get();
    	return view('admin.sale.list',compact('product','discount'));
    }
     public function getAdd(){
        $product = Product::select('id','name')->get();
        return view('admin.sale.add',compact('product'));
    }
    
    public function postAdd(SaleRequest $request){
      $sale = new Sale();
      $sale->discount = $request->txtdiscount;
      $sale->product_id= $request->option_sale;
      $sale->save();
      return redirect()->route('admin.sale.List')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Add Product Discount']);
    }
    
    public function getDelete($id)
   {
        $sale = Sale::find($id);
        $sale -> delete($id);
        return redirect()->route('admin.sale.List') ->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Delete Product Discount']);
   }
   
   public function getEdit($id)
   {    
        $sale = Sale::select('id','discount','product_id')->where('id',$id)->get();
        $data = Sale::findOrFail($id);
        $product = Product::select('id','name')->get();
        return view('admin.sale.edit',compact('sale','product','data'));
        
   }
  
   public function postEdit(Request $request,$id)
   {
        $sale = Sale::find($id);
        $sale->discount = $request->txtdiscount;
        $sale->product_id= $request->option_sale;
        $sale->save();
        return redirect()->route('admin.sale.List')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Update Product Discount']);

   }	
}
