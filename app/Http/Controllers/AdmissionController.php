<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Admission;
use App\GetData;
class AdmissionController extends Controller
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
        $student = DB::table('admissions as a')
                    ->where('a.auth_code',Auth::user()->auth_code)
                    ->leftJoin('mst_classnames as b','a.admission_class','=','b.class_id')
                    ->select('a.*','b.class_name')
                    ->orderBy('student_id','desc')
                    ->get();
        return view('admission.index',compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $get                    = new GetData();
        $data['nationality']    = $get->get_nationality();
        $data['religion']       = $get->get_religion();
        $data['quota']          = $get->get_quota();
        $data['country']        = $get->get_country();
        $data['district']       = $get->get_district();
        $data['division']       = $get->get_division();
        $data['upazila']        = $get->get_upazila();
        $data['union']          = $get->get_union();
        $data['class']          = $get->get_class();
        $data['department']     = $get->get_department();
        $data['year']           = $get->get_year();

        return view('admission.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $qry = DB::table('admissions')
                ->where('auth_code',Auth::user()->auth_code)
                ->orderBy('serial_no','desc')
                ->take(1)
                ->get();
        //return $qry->count();
        if($qry->count() == 0){
            $serial = '000001';
        }
        else
        {
            foreach ($qry as $qry) {
                $serial = $qry->serial_no;
            }
            ++$serial;
        }
        
        //return $serial;
        //return request('student_name');
        request()->validate([
            'student_name' => 'required',
            'father_name' => 'required',
            'dateofbirth' => 'required'
        ]);
        $filename = $request->image->store('photos');
        /*
            image upload reference 
            https://quickadminpanel.com/blog/file-upload-in-laravel-the-ultimate-guide/
        */
        Admission::create([
            'serial_no' =>$serial,
            'auth_code' => Auth::user()->auth_code,
            'student_id' => Auth::user()->auth_code.$serial,
            'student_name' => request('student_name'),
            'father_name' => request('father_name'),
            'mother_name' => request('mother_name'),
            'mobile_number' => request('mobile_number'),
            'nationality' => request('nationality'),
            'nid' => request('nid'),
            'dateofbirth' => request('dateofbirth'),
            'religion' => request('religion_id'),
            'quota' => request('quota_id'),
            'admission_date' => request('admissiondate'),
            'country' => request('country_id'),
            'division' => request('division_id'),
            'district' => request('district_id'),
            'upazila' => request('upazila_id'),
            'union_name' => request('union_id'),
            'post_office' => request('post_office'),
            'permanent_address' => request('permanent_address'),
            'previous_education' => request('previous_education_info'),
            'admission_class' => request('class_id'),
            'department' => request('department_id'),
            'admission_year' => request('admission_year'),
            'student_photo' => $filename,
        ]);
        return redirect(url('admission/new'))->with('create','Admission Successfull Your Id is = '.Auth::user()->auth_code.$serial);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data'] = DB::table('admissions as a')
                ->leftJoin('mst_nationalitys as b','a.nationality','=','b.nationality_id')
                ->leftJoin('mst_religions as c','a.religion','=','c.religion_id')
                ->leftJoin('mst_quotas as d','a.quota','=','d.quota_id')
                ->leftJoin('apps_country as e','a.country','=','e.country_id')
                ->leftJoin('apps_division as f','a.division','=','f.division_id')
                ->leftJoin('apps_district as g','a.district','=','g.district_id')
                ->leftJoin('apps_upazila as h','a.upazila','=','h.upazila_id')
                ->where([['a.auth_code',Auth::user()->auth_code],['a.student_id',$id]])
                ->select('a.*','b.nationality_name','c.religion_name','d.quota_name','e.country_name','f.division_name','g.district_name','h.upazila_name')
                ->get();
                //return $data->student_id;
        return view('admission.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $get                    = new GetData();
        $data['nationality']    = $get->get_nationality();
        $data['religion']       = $get->get_religion();
        $data['quota']          = $get->get_quota();
        $data['country']        = $get->get_country();
        $data['district']       = $get->get_district();
        $data['division']       = $get->get_division();
        $data['upazila']        = $get->get_upazila();
        $data['union']          = $get->get_union();
        $data['class']          = $get->get_class();
        $data['department']     = $get->get_department();
        $data['year']           = $get->get_year();
        $data['qry'] = DB::table('admissions as a')
        ->leftJoin('mst_nationalitys as b','a.nationality','=','b.nationality_id')
        ->leftJoin('mst_religions as c','a.religion','=','c.religion_id')
        ->leftJoin('mst_quotas as d','a.quota','=','d.quota_id')
        ->leftJoin('apps_country as e','a.country','=','e.country_id')
        ->leftJoin('apps_division as f','a.division','=','f.division_id')
        ->leftJoin('apps_district as g','a.district','=','g.district_id')
        ->leftJoin('apps_upazila as h','a.upazila','=','h.upazila_id')
        ->leftJoin('apps_union as i','a.union_name','=','i.union_id')
        ->leftJoin('mst_classnames as j','a.admission_class','=','j.class_id')
        ->leftJoin('mst_departments as k','a.department','=','k.department_id')
        ->where([['a.auth_code',Auth::user()->auth_code],['a.student_id',$id]])
        ->select('a.*','b.*','c.*','d.*','e.*','f.*','g.*','h.*','i.*','j.*','k.*')
        ->first();
        return view('admission.edit',$data);
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
