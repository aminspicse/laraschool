@extends('layouts.master')

@section('title')
    Update Default Data
@endsection

@section('content')
    <div class="card container">
        <div class=" row card-header">
            <div class="col-md-5"><h1>Update Default Data</h1></div>
            <div class="col-md-5"><h3><a href="{{url('/setting')}}">Back</a></h3></div>
        </div>
        <div class="card-body">

            <form action="{{url('/setting/update')}}/{{$setting->setting_id}}" method="post">
                @csrf
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for="">Class</label>
                    </div>
                    <div class="col-md-3">
                        <select name="class_id" id="" class="form-control">
                            <option value="{{$setting->class_id}}">{{$setting->class_name}}</option>
                            @foreach($class as $class)
                                <option value="{{$class->class_id}}">{{$class->class_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for="">Department</label>
                    </div>
                    <div class="col-md-3">
                        <select name="department_id" id="" class="form-control">
                            <option value="{{$setting->department_id}}">{{$setting->department_name}}</option>
                            @foreach($department as $dept)
                                <option value="{{$dept->department_id}}">{{$dept->department_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for="">Semester</label>
                    </div>
                    <div class="col-md-3">
                        <select name="semester_id" id="" class="form-control">
                            <option value="{{$setting->semester_id}}">{{$setting->semester_name}}</option>
                            @foreach($semester as $sem)
                                <option value="{{$sem->semester_id}}">{{$sem->semester_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for="">Year</label>
                    </div>
                    <div class="col-md-3">
                        <select name="year_name" id="" class="form-control">
                            <option value="{{$setting->year_name}}">{{$setting->year_name}}</option>
                            @foreach($year as $year)
                                <option value="{{$year->year_name}}">{{$year->year_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2 col-md-offset-2">
                        <button class="btn btn-info">Save Change</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @foreach($errors->all() as $error)
    <h1 class="text-danger">{{$error}}</h1>
    @endforeach
@endsection