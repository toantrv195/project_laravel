@extends('user.master')
@section('content')
<section id="product">
    <div class="container">
     <!--  breadcrumb --> 
      <ul class="breadcrumb">
        <li>
          <a href="#">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active"> Shopping Cart</li>
      </ul>       
      <h1 class="heading1"><span class="maintext"> Shopping Cart</span><span class="subtext"> All items in your  Shopping Cart</span></h1>
      <!-- Cart-->
      <div class="cart-info">
        <table class="table table-striped table-bordered">
          <tr>
            <th class="image">Image</th>
            <th class="name">Product Name</th>
            <th class="quantity">Qty</th>
            <th class="total">Action</th>
            <th class="price">Unit Price</th>
            <th class="total">Total</th>
           
          </tr>
          <form action="" method="post">
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          @foreach($content as $item)
          <tr>
            <td class="image"><a href="#"><img title="product" alt="product" src="{!! asset('resources/upload/'.$item["options"]["img"]) !!}" height="50" width="50" /></a></td>
            <td  class="name"><a href="#">{!! $item['name'] !!}</a></td>
            <td class="quantity"><input type="text" size="1" value="{!! $item['qty'] !!}" class="qty span1" name="quantity[40]" /></td>
            <td class="total">
              <a href="#" class="update" id="{!! $item['rowid'] !!}"><img class="tooltip-test" data-original-title="Update" src="{!! url('public/user/img/update.png') !!}" alt=""></a>
              <a href="{!! url('xoa-san-pham',['id'=>$item['rowid']]) !!}"><img class="tooltip-test" data-original-title="Remove"  src="{!! url('public/user/img/remove.png') !!}" alt=""></a>
            </td>
            <td class="price">{!! number_format($item["price"],0,",",".") !!}</td>
            <td class="total">{!! number_format($item["price"] * $item['qty'],0,",",".") !!}</td>  
          </tr>
          @endforeach
          </form>
         
        </table>
      </div>
      <div class="container">
      <div class="pull-right">
          <div class="span4 pull-right">
            <table class="table table-striped table-bordered ">
              <tr>
                <td><span class="extra bold totalamout">Total :</span></td>
                <td><span class="bold totalamout">{!! number_format($total,0,",",".") !!}</span></td>
              </tr>
            </table>
            <a href="{!! URL::route('getthanhtoan') !!}"><input type="submit" value="CheckOut" class="btn btn-orange pull-right"></a>
            <a href="{!! url('/') !!}"><input type="submit" value="Continue Shopping" class="btn btn-orange pull-right mr10"></a>
          </div>
        </div>
        </div>
    </div>
  </section>
@endsection() 