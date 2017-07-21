@extends('admin.master')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Category
            <small>edit</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->           
    <div class="col-lg-7" style="padding-bottom:120px">
        @include('admin.block.errors')
        <form action="" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
            <div class="form-group">
                <label>Category Parent</label>
                <select class="form-control" name="sltparent">
                    <option value="0">Please Choose Category</option>
                    <?php cate_parent($parent,0,'--',$data['parent_id']); ?>
                </select>
            </div>
            <div class="form-group">
                <label>Category Name</label>
                <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" value="{!! old('txtCateName',isset($data) ? $data['name'] : null) !!}" />
            </div>
            <div class="form-group">
                <label>Category Order</label>
                <input class="form-control" name="txtOrder" placeholder="Please Enter Category Order" value="{!! old('txtOrder',isset($data) ? $data['order'] : null) !!}" />
            </div>
            <div class="form-group">
                <label>Category Keywords</label>
                <input class="form-control" name="txtkeywords" placeholder="Please Enter Category Keywords" value="{!! old('txtkeywords',isset($data) ? $data['keywords'] : null) !!}" />
            </div>
            <div class="form-group">
                <label>Category Description</label>
                <textarea class="form-control" rows="3" name="description">{!! old('description',isset($data) ? $data['description'] : null) !!}</textarea>
            </div>
            <div class="form-group">
            </div>
            <button type="submit" class="btn btn-default">Category Edit</button>
            <button type="reset" class="btn btn-default">Reset</button>
        <form>
    </div>
</div>
@endsection()               