@extends('layouts.master')


@section('title')
    Subject List
@endsection
 
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Table of Subject <a href="{{url('subject/create')}}">Create New Subject</a></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Subject ID</th>
                        <th>Auth Code</th>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Class</th>
                        <th>Department</th>
                        <th>Created By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;?>
                    @foreach($data as $data)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$data->subject_id}}</td>
                            <td>{{$data->auth_code}}</td>
                            <td>{{$data->subject_code}}</td>
                            <td>{{$data->subject_name}}</td>
                            <td>{{$data->class_name}}</td>
                            <td>{{$data->department_name}}</td>
                            <td>{{$data->user_id}}</td>
                            <td>
                                <a href="#" class="btn btn-success" title="View">
                                    <span class="fa fa-eye"></span>
                                </a>
                                <a href="{{url('subject/inactive')}}/{{$data->subject_id}}"  class="btn btn-danger" title="Inactive">
                                    <span class="fa fa-remove"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot> 
                    <tr>
                    <th>SL</th>
                        <th>Subject ID</th>
                        <th>Auth Code</th>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Class</th>
                        <th>Department</th>
                        <th>Created By</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
            <!-- /.box-body -->
    </div>
    <!-- /.box -->

@endsection