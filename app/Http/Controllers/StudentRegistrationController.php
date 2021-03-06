<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Response;
use DB;
use App\GetData;
use App\StudentRegistration;
class StudentRegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $year =GetData::get_setting();
        //$year->year_name;
        $data= DB::table('student_view')
            ->where([['registration_year',$year->year_name],['auth_code',Auth::user()->auth_code]])
            ->get();
        return view('registration.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $get                = new GetData();
        $data['class']      = $get->get_class();
        $data['semester']   = $get->get_semester();
        $data['department'] = $get->get_department();
        $data['year']       = $get->get_year();
        $data['setting']    = $get->get_setting();


        return view('registration.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = DB::table('studentregistrations')
            ->where([['student_id',request("student_id")],['class_id',request("class_id")],['semester_id',request("semester_id")],['year_name',request('year_name')]])
            ->get();
        $count = $check->count();
        if($count == 0)
        {
            
            $data                       = new StudentRegistration();
            $data->student_id           = request("student_id");
            $data->class_id             = request("class_id");
            $data->semester_id          = request("semester_id");
            $data->department_id        = request("department_id");
            $data->year_name            = request("year_name");
            $data->registration_date    = request("registration_date");
            $data->auth_code            = Auth::user()->auth_code;
            $data->user_id              = Auth::user()->id;
            $data->save();
            
            $data['success']            = "<h4 style='color:green; margin:0px'>Successfully Registration Complete.".request("student_id")."</h4>";
        }
        else
        {
            $data['error']             = "<h4 style='color:red'>".request("student_id")." Student already registered. </h4>";
        }
            
        return Response::json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
