@extends('admin.master')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Detail Transaction
        </h1>
    </div>
    <div class="col-lg-12">
        <div class="checkoutstep">
            <form action="" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="row" style=" border: 1px solid #72b972; padding: 20px; margin: 10px 0px 10px 0px;">
                  <fieldset>
                    <div class="span4">
                    @foreach($trans as $item_trans)
                      <div class="control-group">
                        <label class="control-label" style="text-transform: capitalize;"><span style="color: #8e0c0c; margin-right: 10px;">FullName:</span>{!! $item_trans->name !!}</label>
                      </div>
                      <div class="control-group">
                        <label class="control-label" style="text-transform: capitalize;"><span style="color: #8e0c0c; margin-right: 10px;">E-Mail:</span>{!! $item_trans->email !!}</label>
                      </div>
                      <div class="control-group">
                        <label class="control-label" style="text-transform: capitalize;"><span style="color: #8e0c0c; margin-right: 10px;">Telephone:</span>{!! $item_trans->phone !!}</label>
                      </div>
                      <div class="control-group">
                        <label class="control-label" style="text-transform: capitalize;"><span style="color: #8e0c0c; margin-right: 10px;">City:</span>{!! $item_trans->city !!}</label>
                      </div>
                      <div class="control-group">
                        <label class="control-label" style="text-transform: capitalize;"><span style="color: #8e0c0c; margin-right: 10px;">Address:</span>{!! $item_trans->address !!}</label>
                      </div>
                    @endforeach
                    </div>   
                  </fieldset>
              </div>
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
                  @foreach($product_order as $data_order)
                  <tr>
                    <td class="image"><a href="#"><img  src="{!! asset('resources/upload/'.$data_order->image) !!}" title="product" alt="product" src="" height="70" width="60"></a></td>
                    <td  class="name"><a href="#">{!! $data_order->name !!}</a></td>
                    <td class="quantity">{!! $data_order->quantity !!}</td>
                    <td class="price">{!! number_format($data_order->total,0,",",".") !!}</td>
                    <td class="total">{!! number_format($data_order->total,0,",",".") !!}</td>
                  </tr>
                  @endforeach
                </table>
              </div>
              <div class="row" style="margin-right: 0px;">
                <div class="pull-right">
                  <div class="span4 pull-right">
                    <table class="table table-striped table-bordered ">
                      <tbody>
                        
                        <tr>
                          <td><span style="color:black; text-transform: capitalize;">Total :</span></td>
                          <td><span style="color: red; font-weight: bold;">{!! number_format($item_trans->total,0,",",".") !!} VNĐ</span></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-orange pull-right" style="background:#F25C27; color: white;">Order</button>
            </div>
            </form>  
             <a href="{!!route('admin.transaction.list')!!}"><button type="submit" class="btn btn-orange pull-right" style="background:#F25C27; color: white; margin-right: 20px;">Back</button></a>
          </div>
     
    
    </div>
    
</div>
 @endsection()               
