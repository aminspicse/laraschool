@extends('layouts.master')


@section('title')
    Class List
@endsection
 
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Table of Class <a href="{{url('class/create')}}">Create New Class</a></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Class ID</th>
                        <th>Auth Code</th>
                        <th>Class Name</th>
                        <th>GPA (A+)</th>
                        <th>Created By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;?>
                    @foreach($class as $data)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$data->class_id}}</td>
                        <td>{{$data->auth_code}}</td>
                        <td>{{$data->class_name}}</td>
                        <td>{{$data->gpa_outof}}</td>
                        <td>{{$data->user_id}}</td>
                        <td>
                            <a href="#" class="btn btn-success" title="Edit">
                                <span class="fa fa-edit"></span>
                            </a>
                            <a href="{{url('/class/inactive')}}/{{$data->class_id}}" class="btn btn-danger" title="Inactive">
                                <span class="fa fa-remove"></span>
                            </a>
                        </td>
                    </tr> 
                    @endforeach
                </tbody>
                <tfoot> 
                    <tr>
                        <th>SL</th>
                        <th>Class ID</th>
                        <th>Auth Code</th>
                        <th>Class Name</th>
                        <th>GPA (A+)</th>
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