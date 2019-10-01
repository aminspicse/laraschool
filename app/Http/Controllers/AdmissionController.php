<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nationality = DB::table('mst_nationalitys')
                ->where('status',1)
                ->get();
        $religion = DB::table('mst_religions')
                ->where('status',1)
                ->get();
        $quota = DB::table('mst_quotas')
                ->where('status',1)
                ->orderBy('quota_id','asc')
                ->get();
        $country = DB::table('apps_country')->get();
        $district = DB::table('apps_district')
                ->where('district_status','1')
                ->orderBy('district_name','asc')
                ->get();
        $division = DB::table('apps_division')
                ->where('division_status','1')
                ->orderBy('division_name','asc')
                ->get();
        $upazila = DB::table('apps_upazila')
                ->where('upazila_status',1)
                ->orderBy('upazila_name','asc')
                ->get();
        $union = DB::table('apps_union')
                ->where('union_status','1')
                ->orderBy('union_name','asc')
                ->get();
        return view('admission.create',
            compact('nationality','religion','quota','country','division','district','upazila','union'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function getStates($id) 
    {
        $states = DB::table("apps_division")->where("country_id",$id)->pluck("division_name","division_id");
        return json_encode($states);
    }
}
