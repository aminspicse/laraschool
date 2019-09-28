<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Mst_department;
class Mst_DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('mst_departments')
                ->where('auth_code',Auth::user()->auth_code)
                ->get();
        return view('mst.department.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mst.department.create');
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
            'department_name' => 'required'
        ]);

        $data = new Mst_department();
        $data->department_name = $_POST['department_name'];
        $data->description = $_POST['description'];
        $data->user_id = Auth::user()->id;
        $data->auth_code = Auth::user()->auth_code;
        $data->save();
        
        return redirect('/department')->with('create','Department Created Successfully');
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
        $data = DB::table('mst_departments')
                ->where([['department_id',$id],['auth_code',Auth::user()->auth_code]])
                ->first();

        return view('mst.department.edit',compact('data'));
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
        request()->validate([
            'department_name' => 'required'
        ]);

        $data = DB::table('mst_departments')
            ->where([['department_id',$id],['auth_code',Auth::user()->auth_code]])
            ->update(['department_name'=>$_POST['department_name'],'description'=>$_POST['description']]);
        
        //$data->department_name = $_POST['department_name'];
        //$data->description = $_POST['description'];
        //$data->update();

        return redirect('/department')->with('update','Department Updated Successfully');
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
