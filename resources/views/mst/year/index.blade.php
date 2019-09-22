@extends('layouts.master')


@section('title')
    Year List
@endsection

@section('content')
    <div class="row container">

        <div class="col-md-5"><h3>Year List</h3></div>
        <div class="col-md-3"><h3><a href="" disabled>Create New Year</a></h3></div>
    </div>
    <table class="table table-striped">
        <tr>
            <th>SL</th>
            <th>Year ID</th>
            <th>Year</th>
            <th>Action</th>
        </tr>
        <?php $i=1;?>
        @foreach($data as $data)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$data->year_id}}</td>
                <td>{{$data->year_name}}</td>
                <td>
                    <a href="" class="btn btn-info" disabled>Edit</a>
                    <a href="" class="btn btn-danger" disabled>Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection