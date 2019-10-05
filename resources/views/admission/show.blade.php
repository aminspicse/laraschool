@extends('layouts.master')

@foreach($data as $data)
@section('title')

    User::
    {{$data->student_name}}
@endsection

@section('content')
    <div class="container row">
        <div class="col-md-5"><h2>View User Data</h2></div>
        
        <div class="col-md-2"><h2><a href="{{url('/admission')}}">Back</a></h2></div>
    </div>
    <table class="table" style="font-size:">
        <tr>
            <td>Student ID</td>
            <td>{{$data->student_id}}</td>
            <td>Auth Code</td>
            <td>{{$data->auth_code}}</td>
        </tr>
        <tr>
            <td>Student Name</td>
            <td>{{$data->student_name}}</td>
            <td>Father Name</td>
            <td>{{$data->father_name}}</td>
        </tr>
        <tr>
            <td>Mother Name </td>
            <td>{{$data->mother_name}}</td>
            <td>Mobile</td>
            <td>{{$data->mobile_number}}</td>
        </tr>
        <tr>
            <td>Nationality</td>
            <td>{{$data->nationality_name}}</td>
            <td>Date of Birth</td>
            <td>{{$data->dateofbirth}}</td>
        </tr>
        <tr>
            <td>Religion</td>
            <td>{{$data->religion_name}}</td>
            <td>Quota</td>
            <td>{{$data->quota_name}}</td>
        </tr>
        <tr>
            <td>Present Address</td>
            <td>{{$data->country_name.', '.$data->division_name.', '.$data->district_name.', '.$data->upazila_name.', '.$data->post_office}}</td>
            <td>Permanent Address</td>
            <td>{{$data->permanent_address}}</td>
        </tr>
        <tr>
            <td>Previous Education</td>
            <td>{{$data->previous_education}}</td>
            <td>Admission Year</td>
            <td>{{$data->admission_year}}</td>
        </tr>
        <tr>
            <td>Admission Date</td>
            <td>{{$data->admission_date}}</td>
            <td>Photo</td>
            <td><img src="{{url('public/storage')}}/{{$data->student_photo}}" alt="" style="height:100px; width:100px"></td>
        </tr>
    </table>
@endsection
@endforeach