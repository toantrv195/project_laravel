@extends('admin.master')
@section('content')  
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User
                <small>List</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
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
                    <th>Username</th>
                    <th>Level</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
            <?php $stt=0;?>
                @foreach($user as $item)
             <?php $stt++;?>
                    <tr class="odd gradeX" align="center">
                        <td>{!! $stt !!}</td>
                        <td>{!! $item['username'] !!}</td>
                        <td>
                            @if($item['id'] == 2 && $item['level'] == 1)
                                Super Admin
                            @elseif( $item['level'] == 1 )
                                Admin
                            @else
                                Member
                            @endif
                        </td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!!URL::route('admin.user.getdelete',$item['id'])!!}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.user.getEdit',$item['id']) !!}">Edit</a></td>
                    </tr>
                  @endforeach
            </tbody>
        </table>
    </div>
     <!-- /.row -->
@endsection()     
            