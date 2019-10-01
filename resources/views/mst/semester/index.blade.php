@extends('layouts.master')


@section('title')
    Semester List
@endsection

@section('content')
    <div class="row container">

        <div class="col-md-5"><h3>Semester List</h3></div>
        <div class="col-md-3"><h3><a href="{{url('/semester/create')}}">Create New Semester</a></h3></div>
    </div>
    <table class="table table-striped">
        <tr>
            <th>SL</th>
            <th>Semester ID</th>
            <th>Semester Name</th>
            <th>Created By</th>
            <th>Auth Code</th>
            <th>Action</th>
        </tr>
        <?php $i=1;?>
        @foreach($data as $data)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$data->semester_id}}</td>
                <td>{{$data->semester_name}}</td>
                <td>{{$data->user_id}}</td>
                <td>{{$data->auth_code}}</td>
                <td>
                    <a href="" class="btn btn-info">Edit</a>
                    <a href="{{url('/semester/delete/')}}/{{$data->semester_id}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection