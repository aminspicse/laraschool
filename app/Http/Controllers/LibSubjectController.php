<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\LibSubject;
use App\GetData;

class LibSubjectController extends Controller
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
        $qry['data'] = GetData::get_lib_subject();
        return view('lib.subject.index',$qry);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view("lib.subject.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subject    = $_POST['subject_name'];
        $code       = $_POST['subject_code'];

        $qry = DB::table('lib_subjects')
               ->where([['subject_code',$code],['subject_name',$subject]])
               ->get();
        
        if($qry->count() < 1)
        {
            LibSubject::create([
                'subject_code' => $code,
                'subject_name' => $subject,
            ]);
            return redirect('lib/subject')->with('create','A Subject Created Successfully');
        }
        else
        {
            return redirect('lib/subject/create')->with('delete','Already Found This Subject ('.$code.' '.$subject.')');
        }
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
