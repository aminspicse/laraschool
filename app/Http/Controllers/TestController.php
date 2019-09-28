<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Test;
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
        $class = DB::table('mst_classnames')
                ->where('auth_code',Auth::user()->auth_code)
                ->get();
        $semester = DB::table('mst_semesters')
                    ->where('auth_code',Auth::user()->auth_code)
                    ->get();
        $subject = DB::table('mst_subjects')->where('auth_code',456)->get();

        return view('test.create',compact('subject','class','semester'));
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
                ->where([['student_id',$request->input('student_id')],['class_id',$request->input('class_id')],['semester_id',$request->input('semester_id')]])->count();
        if($check == 0)
        {
            $rows = $request->input('row');
            foreach($rows as $in)
            {
                $test[] = [
                    'student_id' => $request->input('student_id'),
                    'class_id' => $request->input('class_id'),
                    'semester_id' => $request->input('semester_id'),
                    'auth_code' => Auth::user()->auth_code,
                    'subject_id' => $in['subject_id'],
                    'user_id' => Auth::user()->id,
                    'mcq' => $in['mcq'],
                    'cq' => $in['cq'],
                    'total' => $this->total($in['mcq'],$in['cq']),
                    'gpa'   => $in['gpa'],
                    'grade' => $in['grade']
                ];
            }
            Test::insert($test);

            return redirect('/create')->with('create','Submited');
        }
        else
        {
            return redirect('/create')->with('delete','Already Entired Mark this Student');
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
