<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Mst_Semester;
use App\GetData;
class Mst_SemesterController extends Controller
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
        $data = GetData::get_semester();
        return view('mst.semester.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mst.semester.create');
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
            'semseter_name' => 'required'
        ]);

        $data = new Mst_Semester();
        $data->semester_name = request('semseter_name');
        $data->auth_code = Auth::user()->auth_code;
        $data->user_id = Auth::user()->id;
        $data->save();
        return redirect('/semester')->with('create','A Semester Created');
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
        $data = DB::table('mst_semesters')
                ->where([['semester_id',$id],['auth_code',Auth::user()->auth_code]])
                ->update(['semester_status'=>'0','updated_by'=>Auth::user()->id]);
               // return $data;
        return redirect('/semester')->with('inactive','A Semester Inactive Successfully');
    }
}
