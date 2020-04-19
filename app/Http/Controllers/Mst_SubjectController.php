<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Mst_subject;
use App\GetData;
class Mst_SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //public static $auth_code = Auth::user()->auth_code;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data = GetData::fetch('mst_subjects','subject_status',1,'class_id','ASC');
        $data = GetData::get_subject();

        return view('mst.subject.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $get                    = new GetData();
        $qry['class']           = $get->get_class();
        $qry['department']      = $get->get_department();
        $qry['setting']         = $get->get_setting();
        $qry['sub_type']        = $get->get_subject_type();
 
        return view('mst.subject.create',$qry);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'subject_name'          => 'required',
            'subject_code'          => 'required|min:2'
        ]);

        Mst_subject::create([
            'user_id'               => Auth::user()->id,
            'auth_code'             => Auth::user()->auth_code,
            'class_id'              => request('class_id'),
            'department_id'         => request('department_id'),
            'subject_name'          => request('subject_name'),
            'subject_code'          => request('subject_code'),
            'incourse'              => request('incourse'),
            'incourse_pass'         => request('incourse_pass'),
            'mcq'                   => request('mcq'),
            'mcq_pass'              => request('mcq_pass'),
            'cq'                    => request('cq'),
            'cq_pass'               => request('cq_pass'),
            'pt'                    => request('pt'),
            'pt_pass'               => request('pt_pass'),
            'total'                 => request('total'),
            'total_pass'            => request('total_pass'),
            'mark_system'           => request('mark_system'),
            'subject_type'          => request('subject_type'),
            'descriptions'           => request('descriptions'),

        ]);

        return redirect('/subject')->with('create','New Subject Created Successfully');
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
 
    public function inactive($subject_id)
    {
        GetData::status('mst_subjects','subject_id',$subject_id,'subject_status',0);
        return redirect(url('subject'))->with('inactive','A Subject Inactive Successfully');
    }
}
