<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mst_setting;
use App\GetData;
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
        $get        = new GetData();
        $qry['class']      = $get->get_class();
        $qry['semester']   = $get->get_semester();
        $qry['year']       = $get->get_year();
        $qry['department'] = $get->get_department();
        $qry['setting']    = $get->get_setting();
        $data       = DB::table('mst_settings')
                    ->where([['user_id',Auth::user()->id],['auth_code',Auth::user()->auth_code]])
                    ->get();
        
        if($data->count() == 0)
        {
            return view('mst.setting.create',$qry);
        }
        else
        {
            return view('mst.setting.edit',$qry);
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
                'department_id'  => request('department_id'),
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
                'department_id'=>$_POST['department_id'],
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
