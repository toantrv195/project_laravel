@extends('admin.master')
@section('content')  
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Product Discount
                <small>List</small>
            </h1>
        </div>
        <div class="col-lg-12">
            @if(Session::Has('flash_message'))
            <div class="alert alert-{!! Session::get('flash_level') !!}">
                {!! Session::get('flash_message') !!}
            </div>
            @endif
        </div>
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Product</th>
                    <th>image</th>
                    <th>Discount</th> 
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
            <?php $stt= 0;?>
            @foreach($discount as $item_discounnt)
             <?php $stt++; ?>
                <tr class="odd gradeX" align="center">
                    <td>{!! $stt !!}</td>
                    @foreach($product as $product_discount)
                    @if($item_discounnt['product_id'] == $product_discount['id'])
                    <td>{!! $product_discount['name'] !!}</td>
                    <td><img style = "width: 40%; height: 50%;" src="{!! asset('resources/upload/'.$product_discount['image']) !!}"></td>
                    @endif
                    @endforeach()
                    <td>{!! $item_discounnt['discount'] !!} %</td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('bạn có chắc chắn xóa')" href="{!! URL::route('admin.sale.getDelete',$item_discounnt['id']) !!}"> Delete</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.sale.getEdit',$item_discounnt['id']) !!}">Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
</div>
@endsection()