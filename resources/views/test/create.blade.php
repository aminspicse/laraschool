@extends('layouts.master')

@section('content')

<form action="/store" method="post" class="container">
    @csrf
    <div class="row">
        <h2 class="text-center">Number Entry</h2>
    </div>
    <div class="row">
        <div class="col-md-2">
            <label for="">Student ID:</label>
        </div>
        <div class="col-md-2">
            <input type="text" name="student_id" class="form-control">
        </div>

        <div class="col-md-2">
            <select name="class_id" id="" class="form-control">
                @foreach($class as $class)
                    <option value="{{$class->class_id}}">{{$class->class_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <select name="semester_id" id="" class="form-control">
                @foreach($semester as $sem)
                    <option value="{{$sem->semester_id}}">{{$sem->semester_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <?php $i=0 ?>
    @foreach($subject as $sub)
        <div class="row">
            <div class="col-md-2" >
                <select name="row[{{$i}}][subject_id]" id="subject[{{$i}}]" class="form-control">
                    <option value="{{$sub->subject_id}}">{{$sub->subject_name}}</option>
                </select>
            </div>
            <div class="col-md-1">
                @if($sub->incourse == 0)
                    <input type="text" name="row[{{$i}}][incourse]" id="incourse[{{$i}}]" 
                    onchange="document.getElementById('total[{{$i}}]').value=
                    total(Number(document.getElementById('incourse[{{$i}}]').value),
                    Number(document.getElementById('mcq[{{$i}}]').value),
                    Number(document.getElementById('cq[{{$i}}]').value),
                    Number(document.getElementById('pt[{{$i}}]').value),
                    {{$sub->incourse}},
                    {{$sub->incourse_pass}},
                    {{$sub->mcq}},
                    {{$sub->mcq_pass}},
                    {{$sub->cq}},
                    {{$sub->cq_pass}},
                    {{$sub->pt}},
                    {{$sub->pt_pass}},
                    {{$sub->total}},
                    {{$sub->total_pass}},
                    '{{$sub->subject_name}}'
                    )"  
                    class="form-control display" placeholder="Incourse">
                @else
                    <input type="text" name="row[{{$i}}][incourse]" id="incourse[{{$i}}]" 
                    onchange="document.getElementById('total[{{$i}}]').value=
                    total(Number(document.getElementById('incourse[{{$i}}]').value),
                    Number(document.getElementById('mcq[{{$i}}]').value),
                    Number(document.getElementById('cq[{{$i}}]').value),
                    Number(document.getElementById('pt[{{$i}}]').value),
                    {{$sub->incourse}},
                    {{$sub->incourse_pass}},
                    {{$sub->mcq}},
                    {{$sub->mcq_pass}},
                    {{$sub->cq}},
                    {{$sub->cq_pass}},
                    {{$sub->pt}},
                    {{$sub->pt_pass}},
                    {{$sub->total}},
                    {{$sub->total_pass}},
                    '{{$sub->subject_name}}'
                    )"  
                    class="form-control" placeholder="Incourse">    
                @endif 
            </div>
            <div class="col-md-1">
                @if($sub->mcq == 0)
                    <input type="text" name="row[{{$i}}][mcq]" id="mcq[{{$i}}]" 
                    onchange="document.getElementById('total[{{$i}}]').value=
                    total(Number(document.getElementById('incourse[{{$i}}]').value),
                    Number(document.getElementById('mcq[{{$i}}]').value),
                    Number(document.getElementById('cq[{{$i}}]').value),
                    Number(document.getElementById('pt[{{$i}}]').value),
                    {{$sub->incourse}},
                    {{$sub->incourse_pass}},
                    {{$sub->mcq}},
                    {{$sub->mcq_pass}},
                    {{$sub->cq}},
                    {{$sub->cq_pass}},
                    {{$sub->pt}},
                    {{$sub->pt_pass}},
                    {{$sub->total}},
                    {{$sub->total_pass}},
                    '{{$sub->subject_name}}'
                    )"  
                    class="form-control display" placeholder="Mcq">
                @else
                    <input type="text" name="row[{{$i}}][mcq]" id="mcq[{{$i}}]" 
                    onchange="document.getElementById('total[{{$i}}]').value=
                    total(Number(document.getElementById('incourse[{{$i}}]').value),
                    Number(document.getElementById('mcq[{{$i}}]').value),
                    Number(document.getElementById('cq[{{$i}}]').value),
                    Number(document.getElementById('pt[{{$i}}]').value),
                    {{$sub->incourse}},
                    {{$sub->incourse_pass}},
                    {{$sub->mcq}},
                    {{$sub->mcq_pass}},
                    {{$sub->cq}},
                    {{$sub->cq_pass}},
                    {{$sub->pt}},
                    {{$sub->pt_pass}},
                    {{$sub->total}},
                    {{$sub->total_pass}},
                    '{{$sub->subject_name}}'
                    )"  
                    class="form-control" placeholder="Mcq">
            
                @endif
            </div>
            <div class="col-md-1">
                @if($sub->cq == 0)
                    <input type="text" name="row[{{$i}}][cq]" id="cq[{{$i}}]" 
                    onchange="document.getElementById('total[{{$i}}]').value=
                    total(Number(document.getElementById('incourse[{{$i}}]').value),
                    Number(document.getElementById('mcq[{{$i}}]').value),
                    Number(document.getElementById('cq[{{$i}}]').value),
                    Number(document.getElementById('pt[{{$i}}]').value),
                    {{$sub->incourse}},
                    {{$sub->incourse_pass}},
                    {{$sub->mcq}},
                    {{$sub->mcq_pass}},
                    {{$sub->cq}},
                    {{$sub->cq_pass}},
                    {{$sub->pt}},
                    {{$sub->pt_pass}},
                    {{$sub->total}},
                    {{$sub->total_pass}},
                    '{{$sub->subject_name}}'
                    )" 
                    class="display" placeholder="cq">
                @else
                    <input type="text" name="row[{{$i}}][cq]" id="cq[{{$i}}]" 
                    onchange="document.getElementById('total[{{$i}}]').value=
                    total(Number(document.getElementById('incourse[{{$i}}]').value),
                    Number(document.getElementById('mcq[{{$i}}]').value),
                    Number(document.getElementById('cq[{{$i}}]').value),
                    Number(document.getElementById('pt[{{$i}}]').value),
                    {{$sub->incourse}},
                    {{$sub->incourse_pass}},
                    {{$sub->mcq}},
                    {{$sub->mcq_pass}},
                    {{$sub->cq}},
                    {{$sub->cq_pass}},
                    {{$sub->pt}},
                    {{$sub->pt_pass}},
                    {{$sub->total}},
                    {{$sub->total_pass}},
                    '{{$sub->subject_name}}'
                    )" 
                    class="form-control" placeholder="cq">
                @endif
            </div>
            <div class="col-md-1">
                @if($sub->pt == 0)
                    <input type="text" name="row[{{$i}}][pt]" id="pt[{{$i}}]" 
                    onchange="document.getElementById('total[{{$i}}]').value=
                    total(Number(document.getElementById('incourse[{{$i}}]').value),
                    Number(document.getElementById('mcq[{{$i}}]').value),
                    Number(document.getElementById('cq[{{$i}}]').value),
                    Number(document.getElementById('pt[{{$i}}]').value),
                    {{$sub->incourse}},
                    {{$sub->incourse_pass}},
                    {{$sub->mcq}},
                    {{$sub->mcq_pass}},
                    {{$sub->cq}},
                    {{$sub->cq_pass}},
                    {{$sub->pt}},
                    {{$sub->pt_pass}},
                    {{$sub->total}},
                    {{$sub->total_pass}},
                    '{{$sub->subject_name}}'
                    )" 
                    class="display" placeholder="PT">
                @else
                    <input type="text" name="[{{$i}}][pt]" id="pt[{{$i}}]" 
                    onchange="document.getElementById('total[{{$i}}]').value=
                    total(Number(document.getElementById('incourse[{{$i}}]').value),
                    Number(document.getElementById('mcq[{{$i}}]').value),
                    Number(document.getElementById('cq[{{$i}}]').value),
                    Number(document.getElementById('pt[{{$i}}]').value),
                    {{$sub->incourse}},
                    {{$sub->incourse_pass}},
                    {{$sub->mcq}},
                    {{$sub->mcq_pass}},
                    {{$sub->cq}},
                    {{$sub->cq_pass}},
                    {{$sub->pt}},
                    {{$sub->pt_pass}},
                    {{$sub->total}},
                    {{$sub->total_pass}},
                    '{{$sub->subject_name}}'
                    )
                    " 
                    class="form-control" placeholder="PT">
                @endif
            </div>
            <div class="col-md-1">
                <input type="text" name="row[{{$i}}][total]" id="total[{{$i}}]" 
                onchange="document.getElementById('gpa[{{$i}}]').value=
                Gpa(Number(document.getElementById('total[{{$i}}]').value),
                {{$sub->total}},
                {{$sub->total_pass}},
                {{$sub->mark_system}},
                '{{$sub->subject_name}}'
                ),document.getElementById('grade[{{$i}}]').value=
                Grade(Number(document.getElementById('total[{{$i}}]').value),
                {{$sub->total}},
                {{$sub->total_pass}},
                {{$sub->mark_system}},
                '{{$sub->subject_name}}'
                )"
                onmouseover="document.getElementById('gpa[{{$i}}]').value=
                Gpa(Number(document.getElementById('total[{{$i}}]').value),
                {{$sub->total}},
                {{$sub->total_pass}},
                {{$sub->mark_system}},
                '{{$sub->subject_name}}'
                ),
                document.getElementById('grade[{{$i}}]').value=
                Grade(Number(document.getElementById('total[{{$i}}]').value),
                {{$sub->total}},
                {{$sub->total_pass}},
                {{$sub->mark_system}},
                '{{$sub->subject_name}}'
                )"
                class="form-control" placeholder="Total">
            </div>
            <div class="col-md-1">
                <input type="text" name="row[{{$i}}][gpa]" id="gpa[{{$i}}]"
                class="form-control" readonly placeholder="GPA" >
            </div>
            <div class="col-md-1">
                <input type="text" name="row[{{$i}}][grade]" id="grade[{{$i}}]" readonly class="form-control" placeholder="Grade">
            </div>
        </div>
        <?php $i++?>
    @endforeach

    <div class="row"><button class="btn btn-success">Save</button></div>
</form>

<style>
    .display{
        display:none;
    }

</style>
<script src="{{asset('markentry/sweetalert.min.js')}}"></script>
<script>
/*
    incourse == form incourse mark
    mcq == form mcq mark
    cq = from cq mark
    pt == form pt mark 
    inc_mark == incourse Maximum mark for form validation 
*/
    function total(incourse,mcq,cq,pt,inc_mark,inc_pass,mcq_mark,mcq_pass,cq_mark,cq_pass,pt_mark,pt_pass,total_mark,total_pass,subject_name){
        
        if(incourse <= inc_mark){
            if(mcq <= mcq_mark){
                if(cq <= cq_mark){
                    if(pt <= pt_mark){
                        return incourse+mcq+cq+pt;
                    }else{
                        swal("YOU EXIT MAXIMUM NUMBER","You Must Input "+subject_name+" PT <= "+pt_mark,"error");
                    }
                }else{
                    swal("YOU EXIT MAXIMUM NUMBER","You Must Input "+subject_name+" CQ <= "+cq_mark,"error");
                }
            }else{
                swal("YOU EXIT MAXIMUM NUMBER","You Must Input "+subject_name+" MCQ <= "+mcq_mark,"error");
            }
        }else{
            swal("YOU EXIT MAXIMUM NUMBER","You Must Input "+subject_name+" Incourse <= "+inc_mark,"error");
        }
    }

    function Gpa(total,total_mark,total_pass,mark_system,subject_name){
        //alert(mark_system);
        if(total <= total_mark){
            //alert(mark_system);
            if(mark_system == 5){
                if(total >= 79.50 && total <= 100){
                    gpa = '5.00';
                }else if(total >= 69.50 && total < 79.50){
                    gpa = '4.00';
                }else if(total >= 59.50 && total <69.50){
                    gpa = '3.50';
                }else if(total >= 49.50 && total < 59.50){
                    gpa = '3.00';
                }else if(total >= 39.50 && total < 49.50){
                    gpa = '2.00';
                }else if(total >= 32.50 && total < 39.50){
                    gpa = '1.00';
                }else{
                    gpa = '0.00';
                }
                return gpa;
            }
        }else{
            swal("YOU EXIT MAXIMUM NUMBER","You Must Input "+subject_name+" Total <= "+total_mark,"error");
        }
    }

    function Grade(total,total_mark,total_pass,mark_system,subject_name){
        //alert(mark_system);
        if(total <= total_mark){
            //alert(mark_system);
            if(mark_system == 5){
                if(total >= 79.50 && total <= 100){
                    gpa = 'A+';
                }else if(total >= 69.50 && total < 79.50){
                    gpa = 'A';
                }else if(total >= 59.50 && total <69.50){
                    gpa = 'A-';
                }else if(total >= 49.50 && total < 59.50){
                    gpa = 'B';
                }else if(total >= 39.50 && total < 49.50){
                    gpa = 'C';
                }else if(total >= 32.50 && total < 39.50){
                    gpa = 'D';
                }else{
                    gpa = '0.00';
                }
                return gpa;
            }
        }else{
            swal("YOU EXIT MAXIMUM NUMBER","You Must Input "+subject_name+" Total <= "+total_mark,"error");
        }
    }
</script>
@endsection