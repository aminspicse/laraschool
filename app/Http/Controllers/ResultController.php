<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Result_subject;
use App\GetData;
class ResultController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set("Asia/Dhaka");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return GetData::get_setting();

        $get                = new GetData();
        $qry['setting']     = $get->get_setting();
        $qry['class']       = $get->get_class();
        $qry['semester']    = $get->get_semester();
        $qry['year']        = $get->get_year();
        $qry['department']  = $get->get_department();
        $qry['subject'] = DB::table('mst_subjects as a')
                    ->leftJoin('lib_subjects as b','a.lib_sub_id','=','b.lib_sub_id')
                    ->where([
                        ['a.auth_code',Auth::user()->auth_code],
                        ['a.class_id',$qry['setting']->class_id],
                        ['a.department_id',$qry['setting']->department_id]])
                    ->get();
                    
        return view('result_subject.create',$qry);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student_id     = $request->input('student_id');
        $class_id       = $request->input('class_id');
        $semester_id    = $request->input('semester_id');
        $department_id  = $request->input('department_id');
        $year_name      = $request->input('year_name');

        // start for checking student registered or not
        $check_reg = DB::table('studentregistrations')
            ->where([
                    ['student_id',$student_id],
                    ['class_id',$class_id],
                    ['semester_id',$semester_id],
                    ['department_id',$department_id],
                    ['year_name',$year_name]])
            ->get();
        
        if($count_reg = $check_reg->count() == 0)
        {
            return redirect('/result/create')->with('delete','ID '.$student_id.' Class '.$class_id.' Semester '.$semester_id.' Dept '.$department_id.' Year '.$year_name.' not Registered');
        }

        // start for checking data already inserted or not 
        $check = DB::table('result_subjects')
                ->where([
                    ['student_id',$student_id],
                    ['class_id',$class_id],
                    ['semester_id',$semester_id],
                    ['year_name',$year_name]])
                ->get();
        $count = $check->count();
        // end data insert checking

        $rows = $request->input('row');
        if($count == 0)
        { 
            foreach($rows as $in)
            {
                $test[] = [
                    'student_id' => $request->input('student_id'),
                    'class_id' => $request->input('class_id'),
                    'semester_id' => $request->input('semester_id'),
                    'department_id' => $request->input('department_id'),
                    'auth_code' => Auth::user()->auth_code,
                    'year_name'   => $request->input('year_name'),
                    'subject_id' => $in['subject_id'],
                    'user_id' => Auth::user()->id,
                    'incourse' => $in['incourse'],
                    'mcq' => $in['mcq'],
                    'cq' => $in['cq'],
                    'total' => $in['total'],
                    'gpa'   => $in['gpa'],
                    'grade' => $in['grade']
                ];
            }
            Result_subject::insert($test);

            return redirect('/result/create')->with('create','Submited');
        }
        else
        {
            //return redirect('/create')->with('delete','Already Entired Mark this Student');
            $rows = $request->input('row');
           
            foreach($rows as $in){
                $where =[
                    ['student_id',$request->input('student_id')],
                    ['class_id',$request->input('class_id')],
                    ['semester_id',$request->input('semester_id')],
                    //['department_id',$request->input('department_id')],
                    ['subject_id',$in['subject_id']],
                    ['year_name',$request->input('year_name')]];

                $test = [
                //'student_id' => $request->input('student_id'),
                //'class_id' => $request->input('class_id'),
                //'semester_id' => $request->input('semester_id'),
                //'auth_code' => Auth::user()->auth_code,
                ////'year_name'   => $request->input('year_name'),
                //'subject_id' => $in['subject_id'],
                'updated_by' => Auth::user()->id,
                'department_id' => $request->input('department_id'),
                'incourse' => $in['incourse'],
                'mcq' => $in['mcq'],
                'cq' => $in['cq'],
                'total' => $in['total'],
                'gpa'   => $in['gpa'],
                'grade' => $in['grade'],
                'updated_at' => Date('Y-m-d h:i:s A')
                ];

                DB::table('result_subjects')->where($where)->update($test);
            }
            //DB::table('tests')->where($where)->update($test);
            return redirect('/result/create')->with('update','Mark Updated Successfull');
        }
    }

    public function total($mcq,$cq)
    {
        return $total = $mcq+$cq;
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
