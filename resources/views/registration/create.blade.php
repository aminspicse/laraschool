@section('title')
    Student Registration
@endsection

<h2>Student Registration Form</h2>
<div class="alert text-center" id="msg" style="display:none"></div>
<form id="registration">
    @csrf
    <div class="row">
        <div class="col-md-2"><label for="">Student Id</label></div>
        <div class="col-md-3">
            <input type="text" name="student_id" id="student_id" class="form-control" placeholder="Student Id" required>
        </div>
    </div>
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
        <div class="col-md-2"><label for="">Semester</label></div>
        <div class="col-md-3">
            <select name="semester_id" id="" class="form-control">
                <option value="{{$setting->semester_id}}">{{$setting->semester_name}}</option>
                @foreach($semester as $sem)
                    <option value="{{$sem->semester_id}}">{{$sem->semester_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"><label for="">Department</label></div>
        <div class="col-md-3">
            <select name="department_id" id="" class="form-control">
                <option value="{{$setting->department_id}}">{{$setting->department_name}}</option>
                @foreach($department as $dep)
                    <option value="{{$dep->department_id}}">{{$dep->department_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"><label for="">Year</label></div>
        <div class="col-md-3">
            <select name="year_id" id="" class="form-control">
                <option value="{{$setting->year_id}}">{{$setting->year_name}}</option>
                @foreach($year as $year)
                    <option value="{{$year->year_id}}">{{$year->year_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"><label for="">Registration Date</label></div>
        <div class="col-md-3">
            <input type="date" name="registration_date" class="form-control">
        </div>
    </div>
    <button id="submit" type="submit" class="btn btn-success">Save</button>
</form>


<script>
    $(document).ready(function(){
        $("#registration").on("submit",function(e){
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: "{{url('/registration/store')}}",
                data: $("#registration").serialize(),
                success: function(response){
                    $("#msg").show();
                    $("#msg").html(response.success);
                    $("#msg").css("background-color","green");
                },
                error: function(error){
                    $("#msg").show();
                    $("#msg").html("Invalid Student ID "+ $("#student_id").val());
                    $("#msg").css("background-color",'red');
                }
            });
        });
    });
</script>