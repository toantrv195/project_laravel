@extends('admin.master')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">List Transaction
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
                <th>Total</th>
                <th>Status</th>
                <th>Create Date</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
                @foreach($data as $item)
                <tr class="odd gradeX" align="center">
                    <td>1</td>
                    <td>{!! $item['name'] !!}</td>
                    <td>{!! number_format($item['total'],0,",",".") !!} VNĐ</td>
                    <td>
                        @if($item['status']!=0)
                        {!! " Đã xử Lý" !!}
                        @else
                            {!! "Đang chờ xử lý" !!}
                        @endif
                    </td>
                    <td>{!! \Carbon\Carbon::createFromTimeStamp(strtotime($item['created_at']))->diffForHumans() !!}</td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.transaction.detail',$item['id']) !!}">Detail</a></td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('Do You Want To Delete?')" href="{!! URL::route('admin.transaction.getdelete',$item['id']) !!}"> Delete</a></td>
                </tr> 
                @endforeach
        </tbody>
    </table>
</div>
 @endsection()               
