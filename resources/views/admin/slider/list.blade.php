@extends('admin.master')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">slider
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
    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Name</th>
                <th>Content</th>
                <th>image</th>
                <th>Link</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
        <?php $stt= 0;?>
            @foreach($slider_list as $item_slider)
            <?php $stt++ ?>
                <tr class="odd gradeX" align="center">
                    <td>{!! $stt !!}</td>
                    <td>{!! $item_slider['name'] !!}</td>
                    <td> {!! $item_slider['content'] !!} </td>
                    <td><img  style="with:150px; height: 150px;" src="{!! asset('resources/upload/slider/'.$item_slider['image']) !!}"></td>
                    <td> {!! $item_slider['link'] !!} </td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('Do You Want To Delete?')" href="{!! URL::route('admin.slider.getdelete',$item_slider['id'])!!}"> Delete</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.slider.getEdit',$item_slider['id'])!!}">Edit</a></td>
                </tr>
            @endforeach  
        </tbody>
    </table>
</div>
 @endsection()               
