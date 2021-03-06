@extends('layouts.master')

@section('title')
    Create New Student {{Auth::user()->user_name}} 
@endsection
@section('content')

    <div class="container" style="background:white">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-body">
            <div class="row" ><h3 style="margin-top:0px" class="text-danger">New Student Admission</h3></div>
            <form action="{{url('/admission/store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row form-group">
                    <div class="col-md-4 thumbnail bg-info">
                        <label for="">Student Name <span class="text-danger">*</span></label>
                        <input type="text" name="student_name" value="{{old('student_name')}}" required placeholder="Student Name" class="form-control">
                        <label for="">Father's Name</label>
                        <input type="text" name="father_name" value="{{old('father_name')}}" placeholder="Father's Name" class="form-control">
                        <label for="">Mother's Name</label>
                        <input type="text" name="mother_name" value="{{old('mother_name')}}" class="form-control" placeholder="Mother Name">
                        <label for="">Mobile Number</label>
                        <input type="text" name="mobile_number" value="{{old('mobile_number')}}" class="form-control" placeholder="Mobile">
                        <label for="">Nationality</label>
                        <select name="nationality" id="" class="form-control">
                            @foreach($nationality as $na)
                                <option value="{{$na->nationality_id}}">{{$na->nationality_name}}</option>
                            @endforeach
                        </select>
                        <label for="">NID/Birth Certificate No</label>
                        <input type="text" name="nid" value="{{old('nid')}}" class="form-control" placeholder="NID/Birth Card No">
                        <label for="">Date of Birth</label>
                        <input type="date" name="dateofbirth" value="{{old('dateofbirth')}}" class="form-control" placeholder="Date of Birth">
                        
                        <label for="">Religion</label>
                        <select name="religion_id" id="" class="form-control">
                            @foreach($religion as $re)
                                <option value="{{$re->religion_id}}">{{$re->religion_name}}</option>
                            @endforeach
                        </select>
                        <label for="">Quota</label>
                        <select name="quota_id" id="" class="form-control">
                            @foreach($quota as $qt)
                                <option value="{{$qt->quota_id}}">{{$qt->quota_name}}</option>
                            @endforeach
                        </select>
                        <label for="">Admission Date</label>
                        <input type="date" name="admissiondate" value="{{old('admissiondate')}}" class="form-control" placeholder="Admission Date">

                    </div>
                    <div class="col-md-4 thumbnail">
                        <p><b>Present Address</b></p>
                        <label for="">Country</label>
                        <select name="country_id" id="" class="form-control">
                            @foreach($country as $country)
                                <option value="{{$country->country_id}}">{{$country->country_name}} ({{$country->country_code}})</option>
                            @endforeach
                        </select>
                        <label for="">Division/State</label>
                        <select name="division_id" id="" class="form-control">
                            @foreach($division as $div)
                                <option value="{{$div->division_id}}">{{$div->division_name}} ({{$div->local_name}})</option>
                            @endforeach
                        </select>
                        <label for="">District</label>
                        <select name="district_id" id="" class="form-control">
                            @foreach($district as $dis)
                                <option value="{{$dis->district_id}}">{{$dis->district_name}} ({{$dis->local_name}})</option>
                            @endforeach
                        </select>
                        <label for="">Upazila</label>
                        <select name="upazila_id" id="" class="form-control">
                            @foreach($upazila as $up)
                                <option value="{{$up->upazila_id}}">{{$up->upazila_name}} ({{$up->local_name}})</option>
                            @endforeach
                        </select>
                        <label for="">Union</label>
                        <select name="union_id" id="" class="form-control">
                            @foreach($union as $un)
                                <option value="{{$un->union_id}}">{{$un->union_name}} ({{$un->local_name}})</option>
                            @endforeach
                        </select>
                        <label for="">Post/Road</label>
                        <input type="text" name="post_office" class="form-control" placeholder="Post and Road">
                        <label for="">Permanent Address</label>
                        <textarea name="permanent_address" id="" cols="30" rows="2" placeholder="Permanent Address" class="form-control"></textarea>
                        <button class="btn btn-success">Save</button>
                    </div>
                    <div class="col-md-3">
                        <p><b>Previous Educational Info</b> (if any)</p>
                        <textarea name="previous_education_info" id="" cols="30" rows="2" placeholder="Previous Educational Info" class="form-control"></textarea>
                        <p><u>Admission Info</u></p>
                        <label for="">Class</label>
                        <select name="class_id" id="" class="form-control">
                            @foreach($class as $class)
                                <option value="{{$class->class_id}}">{{$class->class_name}}</option>
                            @endforeach
                        </select>
                        <label for="">Department</label>
                        <select name="department_id" id="" class="form-control">
                            @foreach($department as $dept)
                                <option value="{{$dept->department_id}}">{{$dept->department_name}}</option>
                            @endforeach
                        </select>
                        <label for="">Semester</label>
                        <select name="admission_semester" id="" class="form-control">
                            @foreach($semester as $sem)
                                <option value="{{$sem->semester_id}}">{{$sem->semester_name}}</option>
                            @endforeach
                        </select>
                        <label for="">Year</label>
                        <select name="admission_year" id="" class="form-control">
                            @foreach($year as $year)
                                <option value="{{$year->year_name}}">{{$year->year_name}}</option>
                            @endforeach
                        </select>
                        <label for="">Photo</label>
                        <input type="file" name="image" value="{{old('image')}}" id="">
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection