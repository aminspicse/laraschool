@extends('layouts.master')
@section('title')
    Generate Tusion Fees
@endsection

@section('content')
<h2 style="margin:0px">Tution Fees</h2>
<div class="alert" id="msg" style="display:none"></div>

<form id="registration" style="margin:0px" class="container">
    @csrf
   
    <div class="row">
        <div class="col-md-2"><label for="">Class Name</label></div>
        <div class="col-md-3">
            <select name="class_id" id="" class="form-control">
                <option value="{{$setting->class_id}}">{{$setting->class_name}}</option>
                @foreach($class as $class)
                    <option value="{{$class->class_id}}">{{$class->class_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-2"><label for="">Bill Year</label></div>
        <div class="col-md-3">
            <select name="year_name" id="" class="form-control">
                <option value="{{$setting->year_name}}">{{$setting->year_name}}</option>
                @foreach($year as $year)
                    <option value="{{$year->year_name}}">{{$year->year_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"><label for="">Bill Month</label></div>
        <div class="col-md-3">
            <select name="month_id" id="" class="form-control">
                @foreach($month as $month)
                    <option value="{{$month->month_id}}">{{$month->month_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"><label for="">Registration Date</label></div>
        <div class="col-md-3">
            <input type="date" name="due_date" class="form-control">
        </div>
    </div>
    <button id="submit" type="submit" class="btn btn-success">Process</button>
</form>


<script>
/*
    $(document).ready(function(){
        $("#registration").on("submit",function(e){
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: "{{url('/registration/store')}}",
                data: $("#registration").serialize(),
                success: function(response){
                    
                    if(response.error){
                        $("#msg").show();
                        $("#msg").html(response.error);
                        //$("#msg").css("background-color",'red');
                    }
                    if(response.success){
                        $("#msg").show();
                        $("#msg").html(response.success);
                        //$("#msg").css("background-color","green");
                        $("#registration").trigger("reset");
                    }
                    
                },
                error: function(errors){
                    $("#msg").show();
                    $("#msg").html("<h4 style='color:red'>Student ID Invalide. "+$('#student_id').val()+"</h4>");
                    //$("#msg").css("background-color",'red');
                }
            });
            
        });
    });
    */
</script>
@endsection