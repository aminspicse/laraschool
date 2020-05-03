@extends('layouts.master')


@section('title')
    Class Library
@endsection
 
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Table of Class <a href="{{url('/lib/class/create')}}">Create New Class</a></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Class Code</th>
                        <th>Class Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;?>
                    @foreach($data as $data)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$data->lib_cls_id}}</td>
                            <td>{{$data->class_name}}</td>               
                        </tr>
                    @endforeach
                </tbody>
                <tfoot> 
                    <tr>
                        <th>SL</th>
                        <th>Class Code</th>
                        <th>Class Name</th>
                    </tr>
                </tfoot>
            </table>
        </div>
            <!-- /.box-body -->
    </div>
    <!-- /.box -->

@endsection