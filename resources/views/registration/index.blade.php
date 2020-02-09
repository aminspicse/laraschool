@extends('layouts.master')


@section('title')
    Registred Student List
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Table of Registred Student <a href="{{url('admission/downloadall')}}">Generate Report</a></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>F'Name</th>
                        <th>Reg. Date</th>
                        <th>Class</th>
                        <th>Year</th>
                    </tr>
                </thead>
                @foreach($data as $data)
                    <tr>
                        <td>{{$data->student_id}}</td>
                        <td>{{$data->student_name}}</td>
                        <td>{{$data->father_name}}</td>
                        <td>{{$data->registration_date}}</td>
                        <td>{{$data->class_name}}</td>
                        <td>{{$data->registration_year}}</td>
                    </tr>
                @endforeach
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>F'Name</th>
                        <th>Reg. Date</th>
                        <th>Class</th>
                        <th>Year</th>
                    </tr>
                </tfoot>
            </table>
        </div>
            <!-- /.box-body -->
    </div>
    <!-- /.box -->

@endsection