@extends('layouts.master')


@section('title')
    Subject Library
@endsection
 
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Table of Subject <a href="{{url('/lib/subject/create')}}">Create New Subject</a></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>ID</th>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;?>
                    @foreach($data as $data)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$data->lib_sub_id}}</td>
                            <td>{{$data->subject_code}}</td>
                            <td>{{$data->subject_name}}</td>
                            
                        </tr>
                    @endforeach
                </tbody>
                <tfoot> 
                    <tr>
                    <th>SL</th>
                        <th>ID</th>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                    </tr>
                </tfoot>
            </table>
        </div>
            <!-- /.box-body -->
    </div>
    <!-- /.box -->

@endsection