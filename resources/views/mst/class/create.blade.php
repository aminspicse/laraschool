@extends('layouts.master')
@section('title')
    Create New Class
@endsection

@section('content')
    <div class="container">
        <div class="row"><h1>Create New Class</h1></div>
        <form action="{{url('class/store')}}" method="post">
        @csrf
            <div class="row">
                <div class="col-md-2"><p><b>Class Name</b></p></div>
                <div class="col-md-3">
                    <input type="text" name="class_name" required class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"><p><b>Remarks</b></p></div>
                <div class="col-md-3">
                    <textarea name="remarks" id="" cols="29" rows="2"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-md-offset-3">
                    <button class="btn btn-success">Create</button>
                </div>
            </div>
        </form>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
@endsection