@extends('layouts.master')


@section('title')
    Year List
@endsection
 
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Table of Year <a href="{{url('year/create')}}">Create New Year</a></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Year ID</th>
                        <th>Year</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;?>
                    @foreach($data as $data)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$data->year_id}}</td>
                            <td>{{$data->year_name}}</td>
                            <td>{{$data->remarks}}</td>
                            <td>
                                <a href="{{url('/year/inactive')}}/{{$data->year_id}}" class="btn btn-danger" title="Inactive">
                                    <span class="fa fa-remove"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot> 
                    <tr>
                        <th>SL</th>
                        <th>Year ID</th>
                        <th>Year</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
            <!-- /.box-body -->
    </div>
    <!-- /.box -->

@endsection