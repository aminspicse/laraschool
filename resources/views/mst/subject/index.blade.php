@extends('layouts.master')


@section('title')
    Subject List
@endsection

@section('content')
    
    <div class="row container">
        <div class="col-md-5"><h2>Subject List</h2></div>
        <div class="col-md-5"><h3><a href="{{url('/subject/create')}}">Create New Subject</a></h3></div>
    </div>
    <table class="table table-striped">
        <tr>
            <th>SL</th>
            <th>Subject ID</th>
            <th>Auth Code</th>
            <th>Subject Code</th>
            <th>Subject Name</th>
            <th>Created By</th>
            <th>Action</th>
        </tr>
        <?php $i=1;?>
        @foreach($data as $data)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$data->subject_id}}</td>
            <td>{{$data->auth_code}}</td>
            <td>{{$data->subject_code}}</td>
            <td>{{$data->subject_name}}</td>
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