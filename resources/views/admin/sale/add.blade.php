@extends('admin.master')
@section('content')  

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Product Discount
                <small>Add</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">
            @include('admin.block.errors')
            <form action="{!! route('admin.sale.getAdd') !!}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label> name</label>
                    <select class="form-control" name="option_sale">
                         <option  value="">Please Choose product</option>
                         @foreach($product as $item)
                            <option  value="{!! $item['id'] !!}">{!! $item['name'] !!}</option>
                         @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>discount_%</label>
                    <input type="text" class="form-control" name="txtdiscount" placeholder="please enter discount" />
                </div>
                <button type="submit" class="btn btn-default">Add </button>
                <button type="reset" class="btn btn-default">Reset</button>
            <form>
        </div>
    </div>
@endsection