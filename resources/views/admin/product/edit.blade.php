@extends('admin.master')
@section('content')  
<style>
    .img_current{width: 170px;}
    .img_detail{width: 180px; height: 200px; margin: 10px;}
    .icon_del{position: relative; top: -100px; left: -30px;}
    #insert{margin-top: 30px;}
</style>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Product
                <small>Edit</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
         <form action="" method="POST" name="frmEditproduct" enctype="multipart/form-data" >
            <div class="col-lg-7" style="padding-bottom:120px">
                @include('admin.block.errors')  
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}"  />
                        <div class="form-group">
                            <label>Category Parent</label>
                            <select class="form-control" name="sltparent">
                                <option value="">Please Choose Category</option>
                                <?php cate_parent($cate,0,'--',$product["cate_id"]); ?>
                            </select>
                        </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{!! old('txtName',isset($product) ? $product['name'] : Null)!!}" />
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" name="txtPrice" placeholder="Please Enter Password" value="{!! old('txtPrice',isset($product) ? $product['price'] : Null) !!}" />
                    </div>
                    <div class="form-group">
                        <label>Intro</label>
                        <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtIntro',isset($product) ? $product['intro'] : Null) !!}</textarea>
                        <script type="text/javascript">ckeditor('txtIntro')</script>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContent',isset($product) ? $product['content'] : Null) !!}</textarea>
                        <script type="text/javascript">ckeditor('txtContent')</script>
                    </div>
                    <div class="form-group">
                        <label>Images current</label>
                        <img src="{!! asset('resources/upload/'.$product['image']) !!}" alt="" class="img_current">
                        <input type="hidden" name="img_current" value="{!! $product['image'] !!}">
                    </div>

                    <div class="form-group">
                        <label>Images</label>
                        <input type="file" name="fImages">
                    </div>
                    <div class="form-group">
                        <label>Product Keywords</label>
                        <input class="form-control" name="txtkeywords" placeholder="Please Enter Category Keywords" value="{!! old('txtkeywords',isset($product) ? $product['keywords'] : Null) !!}"/>
                    </div>
                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription',isset($product) ? $product['description'] : Null) !!}</textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Product Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4">
                @foreach($product_image as $key=>$item)
                    <div class="form-group" id="{!! $item['id'] !!}">
                        <img src="{!! asset('resources/upload/detail/'.$item['image']) !!}" alt="" class="img_detail" idHinh=" {!! $item['id'] !!}" id="{!! $item['id'] !!}">
                        <a href="javascript:void(0)" type="button" id="del_img" class="btn btn-danger btn-circle icon_del"><i class="fa fa-times"></i></a>
                        <input type="hidden" name="fEditdetail[]">
                    </div>
                @endforeach 
                <button type="button" class="btn btn-primary" id="addimage">Add Image</button>
                <div id="insert"></div>   
            </div>
        <form>
    </div>
    <!-- /.row -->
@endsection()            