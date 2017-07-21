@extends('admin.master')
@section('content')  

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Slider
                <small>edit</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <form action="" method="POST" enctype="multipart/form-data" >
            <div class="col-lg-7" style="padding-bottom:120px">
             @include('admin.block.errors')  
                <input type="hidden" name="_token" value="{!! csrf_token() !!}"  />
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="txtName" placeholder="Please Enter name" value="{!! old('txtName',isset($slider_edit) ? $slider_edit['name'] : Null) !!}" />
                    </div>
                    
                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control" rows="3" name="txtContent"> {!! old('txtContent', isset($slider_edit) ? $slider_edit['content'] : Null) !!}</textarea>
                        <script type="text/javascript">ckeditor("txtContent")</script>
                    </div>
                    <div class="form-group">
                        <label>Images current</label>
                        <img style="width: 100%;" src="{!! asset('resources/upload/slider/'.$slider_edit['image']) !!}" alt="" class="img_current">
                    </div>

                    <div class="form-group">
                        <label>Images</label>
                        <input type="file" name="fImages">
                    </div>
                    <div class="form-group">
                        <label>Link</label>

                        <input class="form-control" name="link" placeholder="Please Enter link" value="{!! old('link',isset($slider_edit) ? $slider_edit['link'] : Null) !!}"/>
                    </div>
                    
                    <button type="submit" class="btn btn-default">Slider update</button>
                    <button type="reset" class="btn btn-default">Reset</button>
            </div>
        </form>
</div>

    <!-- /.row @endsection()