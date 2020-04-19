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
                <div class="col-md-2"><p><b>GPA System</b></p></div>
                <div class="col-md-3">
                    <select name="gpa_outof" class="form-control" id="">
                        <option value="5">GPA: 5.00 (A+)</option>
                        <option value="4">GPA: 4.00 (A+)</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"><p><b>Remarks</b></p></div>
                <div class="col-md-3">
                    <textarea name="remarks" class="form-control" id="" cols="32" rows="2"></textarea>
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