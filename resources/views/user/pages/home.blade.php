@extends('user.master')
@section('content')
  <section id="featured" class="row mt40">
    <div class="container">
      <h1 class="heading1"><span class="maintext">Latest Products</span><span class="subtext"> See Our Most Latest Products</span></h1>
      <ul class="thumbnails">
        @foreach($product as $item)
          <li class="span3">
            <a class="prdocutname" href="{!! url('chi-tiet-san-pham',[$item->id,$item->alias]) !!}">{!! $item->name !!}</a>
            <div class="thumbnail">
              <span class="new tooltip-test" data-original-title="">New</span>
              <a href="{!! url('chi-tiet-san-pham',[$item->id,$item->alias]) !!}"><img alt="" src="{!! asset('resources/upload/'.$item->image) !!}"></a>
              <div class="pricetag">
                <span class="spiral"></span><a href="{!! url('mua-hang',[$item->id,$item->alias]) !!}" class="productcart">ADD TO CART</a>
                <div class="price">
                  <div class="pricenew">{!! number_format($item->price,0,",",".") !!}</div>
                  <div class="priceold"></div>
                </div>
              </div>
            </div>
          </li>
        @endforeach
      </ul>
    </div>
  </section>
  
  <!-- Latest Product-->
  <section id="latest" class="row">
    <div class="container">
      <h1 class="heading1"><span class="maintext"> Products Sale</span><span class="subtext"> See Our Products sale</span></h1>
      <ul class="thumbnails">
      @foreach($product_sale as $data)
        <li class="span3">
          <a class="prdocutname" href="{!! url('chi-tiet-san-pham',[$data->id,$data->alias]) !!}">{!! $data->name !!}</a>
          <div class="thumbnail">
            <span class="sale tooltip-test" style="text-align: center; text-indent: 0px;">
              <span class="sales" style="color:white; position: relative; top: 10px; left: 17px;">{!! $data->discount !!}%</span></span>
            <a href="{!! url('chi-tiet-san-pham',[$data->id,$data->alias]) !!}"><img alt="" src="{!! asset('resources/upload/'.$data->image) !!}"></a>
            <div class="pricetag">
              <span class="spiral"></span><a href="{!! url('mua-hang',[$data->id,$data->alias]) !!}" class="productcart">ADD TO CART</a>
              <div class="price">
                <div class="pricenew">{!! number_format($data->price*(100- $data->discount)/100,0,",",".") !!}</div>
                <div class="priceold">{!! number_format($data->price,0,",",".") !!}</div>
              </div>
            </div>
          </div>
        </li>
      @endforeach
      </ul>
    </div>
  </section>
@endsection()