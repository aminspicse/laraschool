<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Mst_subject;
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
        $data = DB::table('mst_subjects')
                ->where('auth_code',Auth::user()->auth_code)
                ->orderby('subject_id','desc')
                ->get();

        return view('mst.subject.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class = DB::table('mst_classnames')->orderby('class_id','asc')->get();
        return view('mst.subject.create',compact('class'));
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
            'subject_name' => 'required',
            'subject_code' => 'required|min:2'
        ]);

        Mst_subject::create([
            'user_id' => Auth::user()->id,
            'auth_code' => Auth::user()->auth_code,
            'class_id'      => request('class_id'),
            'subject_name' => request('subject_name'),
            'subject_code' => request('subject_code'),
            'incourse' => request('incourse'),
            'incourse_pass' => request('incourse_pass'),
            'mcq' => request('mcq'),
            'mcq_pass' => request('mcq_pass'),
            'cq' => request('cq'),
            'cq_pass' => request('cq_pass'),
            'pt' => request('pt'),
            'pt_pass' => request('pt_pass'),
            'total' => request('total'),
            'total_pass' => request('total_pass'),
            'mark_system' => request('mark_system'),
            'description' => request('description'),

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
}
