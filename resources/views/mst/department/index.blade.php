@extends('layouts.master')


@section('title')
    Department List
@endsection
 
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Table of Department <a href="{{url('department/create')}}">Create New Department</a></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Dept. ID</th>
                        <th>Auth Code</th>
                        <th>Dept. Name</th>
                        <th>Created By</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;?>
                    @foreach($data as $data)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$data->department_id}}</td>
                            <td>{{$data->auth_code}}</td>
                            <td>{{$data->department_name}}</td>
                            <td>{{$data->user_id}}</td>
                            <td>{{$data->description}}</td>
                            <td>
                                <a href="{{url('/department/edit')}}/{{$data->department_id}}" title="Edit" class="btn btn-success">
                                    <span class="fa fa-edit"></span>
                                </a>
                                <a href="{{url('/department/inactive')}}/{{$data->department_id}}" title="Inactive" class="btn btn-danger">
                                    <span class="fa fa-remove"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot> 
                    <tr>
                        <th>SL</th>
                        <th>Dept. ID</th>
                        <th>Auth Code</th>
                        <th>Dept. Name</th>
                        <th>Created By</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
            <!-- /.box-body -->
    </div>
    <!-- /.box -->

@endsection