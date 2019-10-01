@extends('layouts.master')

@section('title')
    Create New Semester
@endsection

@section('content')
    <div class="card container">
        <div class=" row card-header">
            <div class="col-md-5"><h1>Create New Admin</h1></div>
            <div class="col-md-5"><h3><a href="{{url('/semester')}}">Back</a></h3></div>
        </div>
        <div class="card-body">

            <form action="{{url('/semester/store')}}" method="post">
                @csrf
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for="">Semester Name</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="semseter_name" required class="form-control">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-success">Create</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>

    @foreach($errors->all() as $error)
    <h1 class="text-danger">{{$error}}</h1>
    @endforeach
@endsection