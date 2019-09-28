@extends('layouts.master')


@section('title')
    Department List
@endsection

@section('content')
    
    <div class="row container">
        <div class="col-md-5"><h2>Department List</h2></div>
        <div class="col-md-5"><h3><a href="/department/create">Create New Department</a></h3></div>
    </div>
    <table class="table table-striped">
        <tr>
            <th>SL</th>
            <th>Dept. ID</th>
            <th>Auth Code</th>
            <th>Dept. Name</th>
            <th>Created By</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
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
                <a href="#" disabled class="btn btn-info">View</a>
                <a href="/department/edit/{{$data->department_id}}" class="btn btn-success">Edit</a>
                <a href="#" disabled class="btn btn-danger">Inactive</a>
            </td>
        </tr>
        @endforeach
    </table>

@endsection