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
    public function auth_code()
    {
        return Auth::user()->auth_code;
    }

    public static function get_month()
    {
        return $nationality = DB::table('mst_month')
        ->get();
    }

    public static function get_nationality()
    {
        return $nationality = DB::table('mst_nationalitys')
        ->where('nationality_status',1)
        ->get();
    }

    public static function get_religion()
    {
        return $religion = DB::table('mst_religions')
        ->where('religion_status',1)
        ->get();
    }
    public static function get_quota()
    {
        return $quota = DB::table('mst_quotas')
        ->where('quota_status',1)
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
    public static function get_lib_subject()
    {
        return DB::table('lib_subjects')
                ->orderBy('subject_name','asc')
                ->orderBy('subject_code','asc')
                    ->get();
    }
    public static function get_lib_class()
    {
        return DB::table('lib_class')
                ->orderBy('lib_cls_id','asc')
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
        return $class = DB::table('mst_classnames as a')
        ->leftJoin('lib_class as b','a.lib_cls_id','=','b.lib_cls_id')
        ->where([['a.auth_code',Auth::user()->auth_code],['a.class_status',1]])
        ->select('a.*','b.class_name')
        ->get();
    }
    public static function get_semester()
    {
        return $department = DB::table('mst_semesters')
                ->where([['auth_code',Auth::user()->auth_code],['semester_status',1]])
                ->orderBy('semester_name','desc')
                ->get();
    }
    public static function get_subject_type()
    {
        return DB::table('mst_subjecttype')
        //->where([['auth_code',Auth::user()->auth_code],['type_status',1]])
        ->get();
    }
    public static function get_year()
    {
        return DB::table('mst_years')
        ->where([['year_status',1]])
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
        ->leftJoin('lib_class as e','b.lib_cls_id','=','e.lib_cls_id')
        //->leftJoin('mst_years as e', 'a.year_id','=','e.year_id')
        ->select('a.*','b.*','c.*','d.*','e.class_name')
        ->first();
    }
    
    public static function get_mark_system()
    {
        return DB::table('mark_systems')
                ->orderBy('mark_system','desc')
                    ->get();
    }
    public static function get_allstudent()
    {
        return DB::table('admissions as a')
                    ->where('a.auth_code',Auth::user()->auth_code)
                    ->leftJoin('mst_classnames as b','a.admission_class','=','b.class_id')
                    ->leftJoin('lib_class as c','b.lib_cls_id','=','c.lib_cls_id')
                    ->select('a.*','c.class_name')
                    ->orderBy('student_id','desc')
                    ->get();
    }
    public static function get_student($student_id)
    {
        return DB::table('admissions as a')
        ->leftJoin('mst_nationalitys as b','a.nationality','=','b.nationality_id')
        ->leftJoin('mst_religions as c','a.religion','=','c.religion_id')
        ->leftJoin('mst_quotas as d','a.quota','=','d.quota_id')
        ->leftJoin('apps_country as e','a.country','=','e.country_id')
        ->leftJoin('apps_division as f','a.division','=','f.division_id')
        ->leftJoin('apps_district as g','a.district','=','g.district_id')
        ->leftJoin('apps_upazila as h','a.upazila','=','h.upazila_id')
        ->leftJoin('apps_union as i','a.union_id','=','i.union_id')
        ->leftJoin('mst_classnames as j','a.admission_class','=','j.class_id')
        ->leftJoin('mst_departments as k','a.department','=','k.department_id')
        ->where([['a.auth_code',Auth::user()->auth_code],['a.student_id',$student_id]])
        ->select('a.*','b.*','c.*','d.*','e.*','f.*','g.*','h.*','i.*','j.*','k.*')
        ->first();
    }

    /*
        get all active stubject 
    */
    public static function get_subject()
    {
        return DB::table('mst_subjects as a')
        ->leftJoin('lib_subjects as b','a.lib_sub_id','=','b.lib_sub_id')
        ->leftJoin('mst_classnames as c','a.class_id','=','c.class_id')
        ->leftJoin('mst_departments as d', 'a.department_id','=','d.department_id')
        ->leftJoin('lib_class as e','c.lib_cls_id','=','e.lib_cls_id')
        ->where([['a.auth_code',Auth::user()->auth_code],['a.subject_status',1]])
        ->select('a.*','b.*','c.*','d.department_name','e.class_name')
        ->get();
    }
    /*
        this function user for status 0 any table 
        $tbl = table name
        $column = primary key or unique key effected column this column use for validation
        $columnvalue = unique/primarykey column's value
        $efcolumn = which column will be update
        $efvalue = updated column value 
    */
    public static function status($tbl,$column,$columnvalue,$efcolumn,$efvalue)
    {
        return DB::table($tbl)
        ->where([['auth_code',Auth::user()->auth_code],[$column,$columnvalue]])
        ->update([$efcolumn=>$efvalue]);
        //->get();
    }

    /*
        THIS function use for fetch all active/inactive data in specific table
        $tbl = table name 
        $statuscolumn = like "subject_status" 
        $statusvalue = like 0 or 1; 0 means inactive and 1 means active
    */
    public static function fetch($tbl,$statuscolumn,$statusvalue,$order_column,$orderby)
    {
        return DB::table($tbl)
        ->where([['auth_code',Auth::user()->auth_code],[$statuscolumn,$statusvalue]])
        ->orderby($order_column,$orderby)
        ->get();
    }

    public static function fetch_edit($tbl,$unique_column_name,$unique_column_value)
    {
        return DB::table($tbl)
        ->where([['auth_code',Auth::user()->auth_code],[$unique_column_name,$unique_column_value]])
        ->first();
    }

    
}
