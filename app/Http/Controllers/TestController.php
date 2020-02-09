<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Test;
use App\GetData;
class TestController extends Controller
{
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
        $get                = new GetData();
        $qry['setting']     = $get->get_setting();
        $qry['class']       = $get->get_class();
        $qry['semester']    = $get->get_semester();
        $qry['year']        = $get->get_year();
        $qry['department']  = $get->get_department();
        $qry['subject'] = DB::table('mst_subjects')
                    ->where([
                        ['auth_code',Auth::user()->auth_code],
                        ['class_id',$qry['setting']->class_id],
                        ['department_id',$qry['setting']->department_id]])
                    ->get();
                    
        return view('test.create',$qry);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = DB::table('tests')
                ->where([
                    ['student_id',$request->input('student_id')],
                    ['class_id',$request->input('class_id')],
                    ['semester_id',$request->input('semester_id')],
                    ['year_id',$request->input('year_id')]])
                ->get();
        $count = $check->count();
        $rows = $request->input('row');
        if($count == 0)
        { 
            foreach($rows as $in)
            {
                $test[] = [
                    'student_id' => $request->input('student_id'),
                    'class_id' => $request->input('class_id'),
                    'semester_id' => $request->input('semester_id'),
                    'auth_code' => Auth::user()->auth_code,
                    'year_id'   => $request->input('year_id'),
                    'subject_id' => $in['subject_id'],
                    'user_id' => Auth::user()->id,
                    'mcq' => $in['mcq'],
                    'cq' => $in['cq'],
                    'total' => $in['total'],
                    'gpa'   => $in['gpa'],
                    'grade' => $in['grade']
                ];
            }
            Test::insert($test);

            return redirect('/create')->with('create','Submited');
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
                    ['subject_id',$in['subject_id']],
                    ['year_id',$request->input('year_id')]];

                $test = [
                //'student_id' => $request->input('student_id'),
                //'class_id' => $request->input('class_id'),
                //'semester_id' => $request->input('semester_id'),
                //'auth_code' => Auth::user()->auth_code,
                ////'year_id'   => $request->input('year_id'),
                //'subject_id' => $in['subject_id'],
                'user_id' => Auth::user()->id,
                'mcq' => $in['mcq'],
                'cq' => $in['cq'],
                'total' => $in['total'],
                'gpa'   => $in['gpa'],
                'grade' => $in['grade']
                ];

                DB::table('tests')->where($where)->update($test);
            }
            //DB::table('tests')->where($where)->update($test);
            return redirect('/create')->with('update','Mark Updated Successfull');
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
