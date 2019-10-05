@extends('layouts.master')

@section('title')
    Create new Subject 
@endsection

@section('content')
    <div class="card container">
        <div class=" row card-header">
            <div class="col-md-5"><h1>Create New Subject</h1></div>
            <div class="col-md-5"><h3><a href="{{url('/subject')}}">Back</a></h3></div>
        </div>
        <div class="card-body">

            <form action="{{url('/subject/store')}}" method="post">
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
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for="">Class Name</label>
                    </div>
                    <div class="col-md-5">
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
                        <label for="">Department <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-5">
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
                        <label for="">Incourse Mark</label>
                    </div>
                    <div class="col-md-1">
                        <input type="text" name="incourse" value="{{old('incourse')}}" class="form-control">
                    </div>

                    <div class="col-md-2"><label for="">Passed Mark</label></div>
                    <div class="col-md-1">
                        <input type="text" name="incourse_pass" value="{{old('incourse_pass')}}" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2"><label for="">MCQ Mark</label></div>
                    <div class="col-md-1">
                        <input type="text" name="mcq" value="{{old('mcq')}}" class="form-control">
                    </div>
                    <div class="col-md-2"><label for="">Passed Mark</label></div>
                    <div class="col-md-1">
                        <input type="text" name="mcq_pass" value="{{old('mcq_pass')}}" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2"><label for="">CQ Mark</label></div>
                    <div class="col-md-1">
                        <input type="text" name="cq" value="{{old('cq')}}" class="form-control">
                    </div>
                    <div class="col-md-2"><label for="">Passed Mark</label></div>
                    <div class="col-md-1">
                        <input type="text" name="cq_pass" value="{{old('cq_pass')}}" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2"><label for="">PT Mark</label></div>
                    <div class="col-md-1">
                        <input type="text" name="pt" value="{{old('pt')}}" class="form-control">
                    </div>
                    <div class="col-md-2"><label for="">Passed Mark</label></div>
                    <div class="col-md-1">
                        <input type="text" name="pt_pass" value="{{old('pt_pass')}}" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2"><label for="">Total Mark</label></div>
                    <div class="col-md-1">
                        <input type="text" name="total" value="{{old('total')}}" class="form-control">
                    </div>
                    <div class="col-md-2"><label for="">Passed Mark</label></div>
                    <div class="col-md-1">
                        <input type="text" name="total_pass" value="{{old('total_pass')}}" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2"><label for="">Mark System</label></div>
                    <div class="col-md-1">
                        <select name="mark_system" id="" class="form-control">
                            <option value="5">GPA</option>
                            <option value="4">CGPA</option>
                        </select>
                    </div>

                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for="">Description</label>
                    </div>
                    <div class="col-md-5">
                        <textarea name="description" id="" cols="10" rows="3" class="form-control">{{old('description')}}</textarea>
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