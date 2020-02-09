<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Mst_classname;
use App\GetData;
class Mst_ClassnameController extends Controller
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
        $get = new GetData();
        $qry['class'] = $get->get_class();
        return view('mst.class.index',$qry);
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mst.class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // backend validation
        /*
        request()->validate([
            'calss_name' => 'required'
        ]);
        */
        Mst_classname::create([
            'user_id' => Auth::user()->id,
            'auth_code' => Auth::user()->auth_code,
            'class_name' => request('class_name'),
            'remarks' => request('remarks')
        ]);
        return redirect(url('class'))->with('create','Class Created Successfully');
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
    public function destroy($class_id)
    {
        GetData::status('mst_classnames','class_id',$class_id,'class_status',0);
        return redirect(url('class'))->with('inactive','A Class Successfully Inactive');
    }
}
