<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mst_setting;
class SettingController extends Controller
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
        $class = DB::table('mst_classnames')
                ->where('auth_code',Auth::user()->auth_code)
                ->get();
        $semester = DB::table('mst_semesters')
                    ->where('auth_code',Auth::user()->auth_code)
                    ->get();
        $year = DB::table('mst_years')->orderBy('year_id','desc')->get();
        $data = DB::table('mst_settings')
                ->where([['user_id',Auth::user()->id],['auth_code',Auth::user()->auth_code]])
                ->get();
        $setting = $data->first();
        if($data->count() == 0)
        {
            return view('mst.setting.create',compact('class','semester','year'));
        }
        else
        {
            return view('mst.setting.edit',compact('class','semester','year','setting'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Mst_setting::create(
            [
                'user_id' => Auth::user()->id,
                'auth_code' => Auth::user()->auth_code,
                'class_id'  => request('class_id'),
                'semester_id'  => request('semester_id'),
                'year_id'       => request('year_id'),
            ]
        );
        return redirect('/setting')->with('create','Default Data Created');
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
    public function update($id)
    {
        DB::table('mst_settings')
            ->where([['setting_id',$id],['user_id',Auth::user()->id],['auth_code',Auth::user()->auth_code]])
            ->update([
                'class_id'=>$_POST['class_id'],
                'semester_id'=>$_POST['semester_id'],
                'year_id'=>$_POST['year_id']
                ]);
        return redirect('/setting')->with('update','Successfully Update Your Default Setting');
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
