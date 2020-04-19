<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Admission;
use App\GetData;
use PDF; // for dom pdf 
//use Fpdf;
use Codedge\Fpdf\Facades\Fpdf;
use App\StudentRegistration;
use Illuminate\Support\Facades\Storage; // extra
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
        ///header("Content-type: application/pdf");
        Fpdf::AddPage();
        Fpdf::SetFont('Arial', 'B', 18);
        Fpdf::Cell(50, 25, 'Hello World!');
         Fpdf::Output();
        /*
        $student = GetData::get_allstudent();
        return view('admission.index',compact('student'));
        */
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
        $data['semester']       = $get->get_semester();
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
            'student_name'  => 'required',
            'father_name'   => 'required',
            'dateofbirth'   => 'required',
            'image'         => 'required'
        ]);
        $filename = $request->image->store('photos');
        /*
            image upload reference 
            https://quickadminpanel.com/blog/file-upload-in-laravel-the-ultimate-guide/
        */
        Admission::create([
            'serial_no'         =>$serial,
            'auth_code'         => Auth::user()->auth_code,
            'student_id'        => Auth::user()->auth_code.$serial,
            'user_id'           => Auth::user()->id,
            'student_name'      => request('student_name'),
            'father_name'       => request('father_name'),
            'mother_name'       => request('mother_name'),
            'mobile_number'     => request('mobile_number'),
            'nationality'       => request('nationality'),
            'nid'               => request('nid'),
            'dateofbirth'       => request('dateofbirth'),
            'religion'          => request('religion_id'),
            'quota'             => request('quota_id'),
            'admission_date'    => request('admissiondate'),
            'country'           => request('country_id'),
            'division'          => request('division_id'),
            'district'          => request('district_id'),
            'upazila'           => request('upazila_id'),
            'union_id'          => request('union_id'),
            'post_office'       => request('post_office'),
            'permanent_address' => request('permanent_address'),
            'previous_education'=> request('previous_education_info'),
            'admission_class'   => request('class_id'),
            'department'        => request('department_id'),
            'admission_semester'=> request('admission_semester'),
            'admission_year'    => request('admission_year'),
            'student_photo'     => $filename,
        ]);
/*
        StudentRegistration::create([
            'auth_code'         => Auth::user()->auth_code,
            'user_id'           => Auth::user()->id,
            'student_id'        => Auth::user()->auth_code.$serial,
            'class_id'          => request('class_id'),
            'department_id'     => request('department_id'),
            'year_id'           => request('admission_year'),
            'semester_id'       => request('admission_semester'),
        ]);
        */
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
        $data['qry']            = $get->get_student($id);
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
        $update = DB::table('admissions')
                  ->where([['student_id',$id],['auth_code',Auth::user()->auth_code]])
                  ->update([
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
                        //'country' => request('country_id'),
                        //'division' => request('division_id'),
                        //'district' => request('district_id'),
                        //'upazila' => request('upazila_id'),
                        //'union_name' => request('union_id'),
                        //'post_office' => request('post_office'),
                        //'permanent_address' => request('permanent_address'),
                        'previous_education' => request('previous_education_info'),
                        'admission_class' => request('class_id'),
                        'department' => request('department_id'),
                        'admission_year' => request('admission_year'),
                        'updated_at' => date('d-m-y h:i:s A')
                    ]);

        return redirect('admission');
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
    public function downloadallstudent()
    {
        $student = GetData::get_allstudent();
        $output = '';
        $output .='
        <html>
        <head>
        <style>
        @page { margin: 1cm 1cm; }
        @page { size: A4 landscape; }
        .head { position: fixed; top: 0px; left: 0px; right: 0px; background-color: ; height:60px }
        footer { position: fixed; bottom: 0cm; left: 0px; right: 0px; background-color: lightblue; }
        span { page-break-after: always; }
        
        footer .pagenum:before {
            content: counter(page);
        }
        
      </style>
        </head>
        <body>
        <header>
           <table width="100%">
            <tr>
                <th width="10%">
                    <img src="'.url('public/storage/'.Auth::user()->inst_logu).'" width="70px">
                </th>
                <th width="90%">
                <h1 style="text-align:center">'.Auth::user()->inst_name.'</h1>
                <h3 style="text-align:center;margin-top:-10px"><u>Student List</u></h3>
                </th>
            </tr>
           </table>
        </header>
        <main>
        
        <table width="100%" style="border-collapse:collapse;border:0px;">
        <tr class="head">
        <th style="border:1px solid; text-align:center; width:6%">ID</th>
        <th style="border:1px solid; text-align:center; width:6%">Serial</th>
        <th style="border:1px solid; text-align:center; width:15%">Name</th>
        <th style="border:1px solid; text-align:center; width:15%">Father Name</th>
        <th style="border:1px solid; text-align:center; width:10%">Mobile</th>
        <th style="border:1px solid; text-align:center; width:10%">Date of Birth</th>
        <th style="border:1px solid; text-align:center; width:10%">Admission Date</th>
        <th style="border:1px solid; text-align:center; width:6%">Class</th>
        <th style="border:1px solid; text-align:center; width:6%">Year</th>
        <th style="border:1px solid; text-align:center; width:5%">Photo</th>
        <th style="border:1px solid; text-align:center; width:5%">Remarks</th>
        </tr>
        ';
        foreach ($student as $student) {
            $output .='
            <tr>
            <td style="border:1px solid; text-align:center; width:6%">'.$student->student_id.'</td>
            <td style="border:1px solid; text-align:center; width:6%">'.$student->serial_no.'</td>
            <td style="border:1px solid; width:15%">'.$student->student_name.'</td>
            <td style="border:1px solid; width:15%">'.$student->father_name.'</td>
            <td style="border:1px solid; width:10%">'.$student->mobile_number.'</td>
            <td style="border:1px solid; width:10%">'.$student->dateofbirth.'</td>
            <td style="border:1px solid; width:10%">'.$student->admission_date.'</td>
            <td style="border:1px solid; width:6%">'.$student->class_name.'</td>
            <td style="border:1px solid; width:6%">'.$student->admission_year.'</td>
            <td style="border:1px solid; width:5%">
                <img src="'.url('public/storage/'.$student->student_photo).'" width="50px" height="50px" alt="">
            </td>
            <td style="border:1px solid; text-align:center; width:5%"></td>
        </tr>
            ';
        }
        $output .='
            </table>
            </main>
            <footer>
            <div class="pagenum-container">'.date('d-m-y h:i:s A').' Page <span class="pagenum"></span></div></footer>
            </body>
        </html>
        ';
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($output);
        return $pdf->download("student list of ".Auth::user()->inst_name.'.pdf');
    }
   
    public function downloadstudent($id)
    {
        $auth = Auth::user();
        $std = GetData::get_student($id);
        $output = ''; 
        $output .= '<html>
            <head>
                <style>
                    @page { margin: 1cm 1cm; }
                    @page { size: A4 portrait; }
                    
                </style>
            </head>
            <body>
            <header>
                <table width="100%">
                    <tr>
                        <th width="5%">
                            <img src="'.url('public/storage/'.$auth->inst_logu).'" width="80px">
                        </th>
                        <th width="95%">
                        <h2 style="text-align:center; margin:0px"><b>'.$auth->inst_name.'</b></h2>
                        <h3 style="text-align:center;margin:0px">
                            '.$auth->inst_address.'
                        </h3>
                        <h3 style="text-align:center;margin:0px">
                            <u>Institute EIN: '.$auth->inst_ein.' Institute Code: '.$auth->inst_code.'</u>
                        </h3>
                        </th>
                    </tr>
                </table>
            </header>
            <main>
                <table width="100%" style="border-collapse:collapse;border:1px;">
                    <tr style="border:1px solid black">
                        <td style="width:15%; border:1px solid black">Student Name</td>
                        <td colspan="2" style="width:40%; border:1px solid black">'.$std->student_name.'</td>
                        <td rowspan="5" style="width:40%;border:1px solid black"><img align="right" src="'.url('public/storage/'.$std->student_photo).'" width="80px"></td>
                    </tr>
                    <hr>
                    <tr style="border:1px solid black">
                        <td style="width:15%;border:1px solid black">Fathers Name</td>
                        <td colspan="2" style="width:40%;border:1px solid black">'.$std->father_name.'</td>
                    </tr>
                    <tr>
                        <td style="width:15%;border:1px solid black">Mothers Name</td>
                        <td colspan="2" style="width:40%;border:1px solid black">'.$std->mother_name.'</td>
                        
                    </tr>
                    <tr>
                        <td style="width:10%;border:1px solid black">NID/Birth Card</td>
                        <td colspan="2" style="width:40%;border:1px solid black">'.$std->nid.'</td>
                    </tr>
                    <tr>
                        <td style="width:10%;border:1px solid black">Mobile</td>
                        <td colspan="2" style="width:40%;border:1px solid black">'.$std->mobile_number.'</td>
                    </tr>
                    <tr>
                        <td style="width:15%;border:1px solid black">Nationality</td>
                        <td style="width:40%;border:1px solid black">'.$std->nationality_name.'</td>
                        <td style="width:10%;border:1px solid black">Admission Class</td>
                        <td style="width:40%;border:1px solid black">'.$std->class_name.'</td>

                    </tr>
                    <tr>
                        <td style="width:15%;border:1px solid black">Date of Birth</td>
                        <td style="width:40%;border:1px solid black">'.$std->dateofbirth.'</td>
                        <td style="width:10%;border:1px solid black">Religion</td>
                        <td style="width:40%;border:1px solid black">'.$std->religion_name.'</td>
                    </tr>
                    <tr>
                        <td style="width:15%;border:1px solid black">Quota</td>
                        <td style="width:40%;border:1px solid black">'.$std->quota_name.'</td>
                        <td style="width:10%;border:1px solid black">Admission Date</td>
                        <td style="width:40%;border:1px solid black">'.$std->admission_date.'</td>
                    </tr>
                    <tr>
                        <td style="width:15%;border:1px solid black">Previous Education</td>
                        <td colspan="3" style="width:35%;border:1px solid black">'.$std->previous_education.'</td>
                    </tr>
                    <tr>
                        <td style="width:10%;border:1px solid black">Present Address</td>
                        <td colspan="3" style="width:40%;border:1px solid black">'.$std->country_name.', '.$std->division_name.', '.$std->district_name.', '.$std->upazila_name.', '.$std->post_office.'</td>
                       
                    </tr>
                    <tr>
                        <td style="width:10%;border:1px solid black">Permanent Address</td>
                        <td colspan="3" style="width:40%;border:1px solid black">'.$std->permanent_address.'</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="width:40%;border:1px solid black;height:150px"></td>
                    </tr>
                    <tr>
                        <td style="width:40%;text-align:center;height:40px">.......................</td>
                        <td style="width:40%;text-align:center;height:40px">.......................</td>
                        <td style="width:40%;text-align:center;height:40px">.......................</td>
                        <td style="width:40%;text-align:center;height:40px">.......................</td>
                    </tr>
                </table>
            </main>
            
            </body>
            </html>
        ';
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($output);
        return $pdf->download($std->student_name.'.pdf');
    }
}
