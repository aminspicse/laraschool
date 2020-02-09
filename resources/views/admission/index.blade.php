@extends('layouts.master')


@section('title')
    Student List
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Table of Admitted Student <a href="{{url('admission/downloadall')}}">Generate Report</a></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>F'Name</th>
                        <th>Ad.Date</th>
                        <th>Class</th>
                        <th>Year</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($student as $student)
                        <tr>
                            <td>{{$student->student_id}}</td>
                            <td>{{$student->student_name}}</td>
                            <td>{{$student->father_name}}</td>
                            <td>{{$student->admission_date}}</td>
                            <td>{{$student->class_name}}</td>
                            <td>{{$student->admission_year}}</td>
                            <td><img src="{{url('public/storage')}}/{{$student->student_photo}}" width="50px" height="30px" alt=""></td>
                            <td>
                                <a href="{{url('admission/view')}}/{{$student->student_id}}" 
                                    class="btn btn-info" title="View">
                                    <span class="fa fa-eye"></span>
                                </a>
                                <a href="{{url('admission/edit')}}/{{$student->student_id}}" 
                                    class="btn btn-warning" title="Edit">
                                    <span class="fa fa-edit"></span>    
                                </a>
                                <a href="{{url('admission/downloadstudent')}}/{{$student->student_id}}" 
                                class="btn btn-success" title="Download">
                                    <span class="fa fa-cloud-download"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>F'Name</th>
                        <th>Ad. Date</th>
                        <th>Class</th>
                        <th>Year</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
            <!-- /.box-body -->
    </div>
    <!-- /.box -->

@endsection