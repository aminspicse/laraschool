@extends('layouts.master')

@section('title')
    Create new Subject 
@endsection

@section('content')
    <div class="card container">
        <div class=" row card-header">
            <div class="col-md-5"><h1>Create New Subject</h1></div>
            <div class="col-md-5"><h3><a href="{{url('/lib/subject/store')}}">Back</a></h3></div>
        </div>
        <div class="card-body">

            <form action="{{url('/lib/subject/store')}}" method="post">
                @csrf
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for="">Subject Name</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="subject_name" value="{{old('subject_name')}}" required class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for="">Subject Code</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="subject_code" value="{{old('subject_code')}}" required class="form-control">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-2 col-md-offset-3">
                        <button class="btn btn-success btn-block">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @foreach($errors->all() as $error)
    <h1 class="text-danger">{{$error}}</h1>
    @endforeach
@endsection