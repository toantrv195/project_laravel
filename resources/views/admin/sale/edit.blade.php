@extends('admin.master')
@section('content')  

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Product Discount
                <small>Edit</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">
            <form action="" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label> name</label>
                    <select class="form-control" name="option_sale">
                    @foreach($product as $item_product)
                    @foreach($sale as $item)
                    @if($item_product['id'] == $item['product_id'])
                    <option  value="{!! $item_product['id'] !!}">{!! $item_product['name'] !!} </option>
                    @endif
                    @endforeach
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>discount_%</label>
                    <input type="text"  class="form-control" name="txtdiscount" value="{!! old('txtdiscount',isset($data)? $data['discount']: null)!!}"" />
                </div>
                <button type="submit" class="btn btn-default">Edit </button>
                <button type="reset" class="btn btn-default">Reset</button>
            <form>
        </div>
    </div>
@endsection