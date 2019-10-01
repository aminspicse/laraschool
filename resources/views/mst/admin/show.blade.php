@extends('layouts.master')

@foreach($data as $data)
@section('title')

    User::
    {{$data->user_name}}
@endsection

@section('content')
    <div class="container row">
        <div class="col-md-5"><h2>View User Data</h2></div>
        
        <div class="col-md-2"><h2><a href="{{url('/admin/list')}}">Back</a></h2></div>
    </div>
    <table class="table" style="font-size:20px">
        <tr>
            <td>User Id</td>
            <td>{{$data->id}}</td>
            <td>Auth Code</td>
            <td>{{$data->auth_code}}</td>
        </tr>
        <tr>
            <td>User Name</td>
            <td>{{$data->user_name}}</td>
            <td>Email</td>
            <td>{{$data->email}}</td>
        </tr>
        <tr>
            <td>Inst Name</td>
            <td>{{$data->inst_name}}</td>
            <td>Inst Code</td>
            <td>{{$data->inst_code}}</td>
        </tr>
        <tr>
            <td>Inst EIN</td>
            <td>{{$data->inst_ein}}</td>
            <td>Inst Address</td>
            <td>{{$data->inst_address}}</td>
        </tr>
       
    </table>
@endsection
@endforeach