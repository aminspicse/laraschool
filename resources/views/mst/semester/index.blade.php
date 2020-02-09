@extends('layouts.master')


@section('title')
    Semester List
@endsection
 
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Table of Semester <a href="{{url('semester/create')}}">Create New Semester</a></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Semester ID</th>
                        <th>Semester Name</th>
                        <th>Created By</th>
                        <th>Auth Code</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;?>
                    @foreach($data as $data)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$data->semester_id}}</td>
                            <td>{{$data->semester_name}}</td>
                            <td>{{$data->user_id}}</td>
                            <td>{{$data->auth_code}}</td>
                            <td>
                                <!-- <a href="" disabled class="btn btn-info">Edit</a> -->
                                <a href="{{url('/semester/delete/')}}/{{$data->semester_id}}" class="btn btn-danger" title="Inactive">
                                    <span class="fa fa-remove"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot> 
                    <tr>
                        <th>SL</th>
                        <th>Semester ID</th>
                        <th>Semester Name</th>
                        <th>Created By</th>
                        <th>Auth Code</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
            <!-- /.box-body -->
    </div>
    <!-- /.box -->

@endsection