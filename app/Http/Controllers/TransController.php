<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Transaction;
use App\Product_order;
use DB;

class TransController extends Controller {

	public function getList(){
		$data = Transaction::select('id','name','email','total','status','created_at')->orderBy('id','DESC')->get();
		return view('admin.transaction.list',compact('data'));
	}

	public function getListdetail($id){
		$product_order=DB::table('products')->join('product_orders','products.id','=','product_orders.product_id')->select('products.id','products.name','products.image','product_orders.quantity','product_orders.total')->where('transaction_id',$id)->get();
		$trans=DB::table('transaction')->where('id',$id)->get();
		return view('admin.transaction.detail_product',compact('product_order','trans'));
	}

	public function postListdetail($id){
		$update_trans = Transaction::findOrFail($id);
		$update_trans->status=1;
		$update_trans->save();
		return redirect()->route('admin.transaction.list')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete processed orders']);

	}

	public function getDelete($id){
		$product_order = Product_order::find($id);
		$product_order->delete($id);

		$transaction = Transaction::find($id);
		$transaction->delete($id);
		return redirect()->route('admin.transaction.list')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Delete Orders']);

	}
}
