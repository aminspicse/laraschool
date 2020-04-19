@extends('layouts.master')

@section('title')
    Create new Collection Category 
@endsection

@section('content')
    <div class="card container">
        <div class=" row card-header">
            <div class="col-md-6"><h1>Create new Collection Category</h1></div>
            <div class="col-md-5"><h3><a href="{{url('/collectioncategory')}}">Back</a></h3></div>
        </div>
        <div class="card-body">

            <form action="{{url('/collectioncategory/store')}}" method="post">
                @csrf
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for="">Category Name</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="category_name" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for="">Description</label>
                    </div>
                    <div class="col-md-5">
                        <textarea name="description" id="" cols="10" rows="3" class="form-control"></textarea>
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