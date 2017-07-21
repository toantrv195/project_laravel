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
        <li class="active">Checkout</li>
      </ul>
      <div class="row">        
        <!-- Account Login-->
        <form class="form-horizontal" method="post" action="">
        <div class="span9">
          <div>
             @include('user.block.errors')
          </div>
          <div class="checkoutsteptitle">Step 1 : Delivery Details<a class="modify">Modify</a>
          </div>
          
          <div class="checkoutstep">
            <div class="row">
              
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <fieldset>
                  <div class="span4">
                    <div class="control-group">
                      <label class="control-label" >FullName<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="txtname"  value="">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >E-Mail<span class="red">*</span></label>
                      <div class="controls">
                        <input type="email" name="txtmail" value="">
                      </div>
                    </div>
                    
                    <div class="control-group">
                      <label class="control-label" >Telephone<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="txtphone" class=""  value="">
                      </div>
                    </div>
                  </div>
                  <div class="span4">
                    <div class="control-group">
                      <label class="control-label" >Address <span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" class=""  value="" name="txtaddress">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >City<span class="red">*</span></label>
                      <div class="controls">
                        <select name="txtcity">
                          <option>Please Select</option>
                          <option value="Hà Nội">Hà Nội</option>
                          <option value="Hải Phòng">Hải Phòng</option>
                          <option value="Đà Nẵng">Đà nẵng</option>
                          <option value="Nha Trang">Nha Trang</option>
                          <option value="TP HCM">TP.HCM</option>
                        </select>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Intro</label>
                      <div class="controls">
                        <textarea class="form-control" rows="3" name="txtIntro" style="width: 110%;"></textarea>
                      </div>
                    </div> 
                  </div>   
                </fieldset>
              
            </div>
          </div>
          <div class="checkoutsteptitle">Step 2: Confirm Order<a class="modify">Modify</a>
          </div>
          <div class="checkoutstep">
            <div class="cart-info">
              <table class="table table-striped table-bordered">
                <tr>
                  <th class="image">Image</th>
                  <th class="name">Product Name</th>
                  <th class="quantity">Quantity</th>
                  <th class="price">Unit Price</th>
                  <th class="total">Total</th>
                </tr>
                @foreach($content as $item)
                <tr>
                  <td class="image"><a href="#"><img title="product" alt="product" src="{!! asset('resources/upload/'.$item['options']['img']) !!}" height="50" width="50"></a></td>
                  <input type="hidden" name="idproduct" value="{!! $item['id'] !!}">
                  <td  class="name"><a href="#">{!! $item['name'] !!}</a></td>
                  <td class="quantity"><input type="text" size="1" value="{!! $item['qty'] !!}" name="quantity" class="span1">
                  <td class="price">{!! number_format($item['price'],0,",",".") !!}</td>
                  <td class="total">{!! number_format($item['price']*$item['qty'],0,",",".") !!}<input type="hidden" name="totalproduct" value="{!! $item['price']*$item['qty'] !!}"></td>
                </tr>
                @endforeach
              </table>
            </div>
            <div class="row">
              <div class="pull-right">
                <div class="span4 pull-right">
                  <table class="table table-striped table-bordered ">
                    <tbody>
                      
                      <tr>
                        <td><span class="extra bold totalamout">Total :</span></td>
                        <td><span class="bold totalamout">
                        <input type="hidden" name="txttotal" value="{!! $total !!}">
                        {!! number_format($total,0,",",".") !!}</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-orange pull-right">Order</button>
            
          </div>
        </div>
        </form>
        <!-- Sidebar Start-->
        <div class="span3">
          <aside>
            <div class="sidewidt">
              <h2 class="heading2"><span> Checkout Steps</span></h2>
              <ul class="nav nav-list categories">
                <li>
                  <a class="active" href="#">Checkout Options</a>
                </li>
                <li>
                  <a href="#">Billing Details</a>
                </li>
                <li>
                  <a href="#">Delivery Details</a>
                </li>
                <li>
                  <a href="#">Delivery Method</a>
                </li>
                <li>
                  <a href="#"> Payment Method</a>
                </li>
              </ul>
            </div>
          </aside>
        </div>
        <!-- Sidebar End-->
      </div>
    </div>
  </section>
@endsection()