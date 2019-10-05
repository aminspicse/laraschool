<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class GetData extends Model
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public static function get_nationality()
    {
        return $nationality = DB::table('mst_nationalitys')
        ->where('status',1)
        ->get();
    }

    public static function get_religion()
    {
        return $religion = DB::table('mst_religions')
        ->where('status',1)
        ->get();
    }
    public static function get_quota()
    {
        return $quota = DB::table('mst_quotas')
        ->where('status',1)
        ->orderBy('quota_id','asc')
        ->get();
    }
    public static function get_country()
    {
        return $country = DB::table('apps_country')
        ->where('country_status',1)
        ->get();
    }
    public static function get_division()
    {
        return DB::table('apps_division')
        ->where('division_status','1')
        ->orderBy('division_name','asc')
        ->get();
    }
    public static function get_district()
    {
        return DB::table('apps_district')
        ->where('district_status','1')
        ->orderBy('district_name','asc')
        ->get();
    }
    public static function get_upazila()
    {
        return DB::table('apps_upazila')
        ->where('upazila_status',1)
        ->orderBy('upazila_name','asc')
        ->get();
    }
    public static function get_union()
    {
        return DB::table('apps_union')
        ->where('union_status','1')
        ->orderBy('union_name','asc')
        ->get();
    }
    public static function get_department()
    {
        return DB::table('mst_departments')
        ->where([['auth_code',Auth::user()->auth_code],['department_status',1]])
        ->orderBy('department_name','asc')
        ->get();
    }
    public static function get_class()
    {
        return $class = DB::table('mst_classnames')
        ->where([['auth_code',Auth::user()->auth_code],['class_status',1]])
        ->get();
    }
    public static function get_semester()
    {
        return $department = DB::table('mst_semesters')
                ->where([['auth_code',Auth::user()->auth_code],['semester_status',1]])
                ->orderBy('semester_name','desc')
                ->get();
    }
    public static function get_year()
    {
        return DB::table('mst_years')
        ->orderBy('year_id','desc')
        ->get();
    }
    public static function get_setting()
    {
        return $setting = DB::table('mst_settings as a')
                ->where([['a.auth_code',Auth::user()->auth_code],['a.user_id',Auth::user()->id]])
                ->leftJoin('mst_classnames as b','a.class_id','=','b.class_id')
                ->leftJoin('mst_semesters as c','a.semester_id','=','c.semester_id')
                ->leftJoin('mst_departments as d','a.department_id','=','d.department_id')
                ->select('a.*','b.*','c.*','d.*')
                ->first();
    }
}
