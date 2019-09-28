@extends('layouts.master')


@section('title')
    Class List
@endsection

@section('content')
    
    <div class="row container">
        <div class="col-md-5"><h2>Class List</h2></div>
        <div class="col-md-5"><h3><a href="#">Create New Class</a></h3></div>
    </div>
    <table class="table table-striped">
        <tr>
            <th>SL</th>
            <th>Class ID</th>
            <th>Auth Code</th>
            <th>Class Name</th>
            <th>Created By</th>
            <th>Action</th>
        </tr>
        <?php $i=1;?>
        @foreach($data as $data)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$data->class_id}}</td>
            <td>{{$data->auth_code}}</td>
            <td>{{$data->class_name}}</td>
            <td>{{$data->user_id}}</td>
            <td>
                <a href="#" disabled class="btn btn-info">View</a>
                <a href="#" class="btn btn-success">Edit</a>
                <a href="#" disabled class="btn btn-danger">Inactive</a>
            </td>
        </tr>
        @endforeach
    </table>

@endsection