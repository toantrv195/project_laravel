<?php namespace App\Http\Controllers;
use DB;
use Mail;
use Request;
use Cart;
use App\Sale;
use App\Transaction;
use App\Product_order;
use App\Http\Requests\TransactionRequest;
class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$product = DB::table('products')->select('id','name','alias','price','image')->orderBy('id','DESC')->skip(0)->take(4)->get();
		$product_sale = DB::table('products')->join('sales','products.id','=','sales.product_id')->select('products.*','sales.id','sales.discount')->orderBy('sales.id','DESC')->take(4)->get();
		return view('user.pages.home',compact('product','product_sale'));
	}

	

	//category
	public function loaisanpham($id){
		$product_cate = DB::table('products')->select('id','name','alias','price','image','cate_id')->where('cate_id',$id)->paginate(3);
		$cate = DB::table('category')->select('name','parent_id')->where('id',$product_cate[0]->cate_id)->first();
		$menu_cate = DB::table('category')->select('id','name','alias')->where('parent_id',$cate->parent_id)->get();
		$name_cate = DB::table('category')->select('name')->where('id',$id)->first();
		$lasted_product = DB::table('products')->select('id','name','alias','price','image')->orderBy('id','DESC')->skip(3)->take(2)->get();
		$best_product = DB::table('products')->select('id','name','alias','price','image')->orderBy('id','DESC')->take(3)->get();
		return view('user.pages.category',compact('product_cate','cate','menu_cate','lasted_product','name_cate','best_product'));
	}

	//detail
	public function chitietsanpham($id){
		$product_detail = DB::table('products')->where('id',$id)->first();
		$image = DB::table('product_images')->select('id','image')->where('product_id',$product_detail->id)->get();
		$product_cate = DB::table('products')->where('cate_id',$product_detail->cate_id)->where('id','<>',$id)->take(4)->get();
		return view('user.pages.detail',compact('product_detail','image','product_cate'));
	}

	//lien he
	public function getlienhe(){
		return view('user.pages.contact');
	}

	public function postlienhe(Request $request){
		$data = ['hoten'=>Request::input('name'),'tinnhan'=>Request::input('message')];
		Mail::send('emails.blank',$data,function($msg){
			$msg->from('trieutoan2095@gmail.com','trieu toan');
			$msg->to('trieutoan2095@gmail.com','conan')->subject('day la mail lien he');
		});
		echo"<script>
			alert('Cám ơn bạn đã góp ý. Chúng thôi sẽ liên hệ với bạn trong thời gian sớm nhất.');
			window.location = '".url('/')."'
		</script>";
	}

	//shopping
	public function muahang($id){
		$product_buy = DB::table('products')->where('id',$id)->first();
		Cart::add(array('id'=>$id,'name'=>$product_buy->name,'qty'=>1,'price'=>$product_buy->price,'options'=>array('img'=>$product_buy->image)));
		$content = cart::content();
		return redirect()->route('giohang');
	}

	//giỏ hàng
	public function giohang(){
		$content = cart::content();
		$total = cart::total();
		return view('user.pages.shopping-cart',compact('content','total'));
	}

	public function xoasanpham($id){
		Cart::remove($id);
		return redirect()->route('giohang');
	}

	public function capnhat(){
		if(Request::ajax()) {
			$id = Request::get('rowid');
			$qty =Request::get('qty');
			Cart::update($id,$qty);
			echo "Oke";
		}
	}

	//thanh toán
	public function getthanhtoan(){
		$content = cart::content();
		$total= cart::total();
		return view('user.pages.checkout',compact('content','total'));
	}

	public function postthanhtoan(TransactionRequest $request){
		$transaction_id = Transaction::select('id')->where('id', DB::raw("(select max(`id`) from transaction)"))->first();
		if ($transaction_id['id']==0) {
			$id = 1;
		}
		else{
			$id = $transaction_id['id']+1;
		}
		

		$transaction = new Transaction();
		$transaction->id = $id;
		$transaction->name = $request->txtname;
		$transaction->email = $request->txtmail;
		$transaction->phone = $request->txtphone;
		$transaction->address = $request->txtaddress;
		$transaction->city = $request->txtcity;
		$transaction->intro = $request->txtIntro;
		$transaction->status = 0;
		$transaction->total = $request->txttotal;
		$transaction->save();

		$content = Cart::content();
		foreach ($content as $data) {
			$product_order = new Product_order();
			$product_order->product_id = $data['id'];
			$product_order->transaction_id = $id;
			$product_order->quantity = $data['qty'];
			$product_order->total =  $data['price']*$data['qty'];
			$product_order->status = 0;
			$product_order->save();
		}
		

		echo"<script>
			alert('Cám ơn bạn đã mua hàng tại Fanshop. Chúng thôi sẽ liên hệ với bạn trong thời gian sớm nhất.');
			window.location = '".url('/')."'
		</script>";

	}
}
