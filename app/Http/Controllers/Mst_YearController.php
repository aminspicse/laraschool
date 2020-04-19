<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Mst_year;
use App\GetData;
class Mst_YearController extends Controller
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
        $data = GetData::get_year();
        return view('mst.year.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mst.year.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = DB::table('mst_years')
                ->where([
                    'auth_code'     => Auth::user()->auth_code,
                    'year_name'     => request('year_name'),
                    'year_status'   => 1
                ])
                ->get();
        $year_name = request('year_name');

        if($count = $check->count() == 0)
        {
            Mst_year::create([
                'auth_code' => Auth::user()->auth_code,
                'user_id'   => Auth::user()->id,
                'year_name' => request('year_name'),
                'remarks'   => request('remarks')
            ]);
    
            return redirect(url('year'))->with('create','A Year created Successfully');
        }
        else
        {
            return redirect(url('year'))->with('delete',$year_name.' Already created Don\'t try to create duplicate year');
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
    public function inactive($year_id)
    {
        GetData::status('mst_years','year_id',$year_id,'year_status',0);

        return redirect(url('year'))->with('inactive','A year has been Inactive Successfully');
    }
}
