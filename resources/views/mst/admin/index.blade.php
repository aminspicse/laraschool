@extends('layouts.master')


@section('title')
    Admin List
@endsection

@section('content')
    
    <div class="row container">
        <div class="col-md-5"><h2>User List</h2></div>
        <div class="col-md-5"><h3><a href="/admin/create">Create New User</a></h3></div>
    </div>
    <table class="table table-striped">
        <tr>
            <th>SL</th>
            <th>User Code</th>
            <th>Auth Code</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        <?php $i=1;?>
        @foreach($data as $data)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$data->id}}</td>
            <td>{{$data->auth_code}}</td>
            <td>{{$data->user_name}}</td>
            <td>{{$data->email}}</td>
            <td>{{$data->inst_address}}</td>
            <td>
                <a href="/admin/show/{{$data->id}}" class="btn btn-info">View</a>
                <a href="" disabled class="btn btn-success">Edit</a>
                <a href="/admin/delete/{{$data->id}}" class="btn btn-danger">Inactive</a>
            </td>
        </tr>
        @endforeach
    </table>

@endsection