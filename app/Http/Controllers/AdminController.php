<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Auth_backup;
class AdminController extends Controller
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
        $data = DB::table('users')
                ->where('auth_code',Auth::user()->auth_code)
                ->get();
        //return $data;
        return view('mst.admin.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mst.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'user_name' => $_POST['user_name'],
            'email' => $_POST['email'],
            'password' => Hash::make($_POST['password']),
            'inst_name' => $_POST['inst_name'],
            'inst_code' => $_POST['inst_code'],
            'inst_ein' => $_POST['inst_ein'],
            'auth_code' => $_POST['auth_code'],
        ]);
        return redirect('admin/list')->with('create','A New User Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('users')
                ->where([['id',$id],['auth_code',Auth::user()->auth_code]])
                ->get();
        //return $data;
        //$data = User::find($id);

        return view('mst.admin.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = DB::table('users')
                ->where([['id',Auth::user()->id],['auth_code',Auth::user()->auth_code]])
                ->first();
        //return $user->user_name;
        return view('mst.admin.edit',compact('user'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        /*$data = DB::table('users')
                ->where([['id',Auth::user()->id],['auth_code',Auth::user()->auth_code]])
                ->get();
        */
        $data = User::find(Auth::user()->id);
        $data->user_name = request('user_name');
        $data->email = request('email');
        $data->inst_address = request('inst_address');
        $data->password = Hash::make(request('password'));
        $data->save();

        return redirect('/admin/list')->with('update','Profile Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //for delete user 
        $data = DB::table('users')
                ->where([['id',$id],['auth_code',Auth::user()->auth_code]])
                ->update(['auth_code'=>'null']);

        // for backup auth code
        $bkp = new Auth_backup();
        $bkp->auth_code = Auth::user()->auth_code;
        $bkp->user_id = $id;
        $bkp->deleted_by = Auth::user()->id;
        $bkp->save();

        return redirect('/admin/list')->with('delete','An User Inactive Successfully');
                
    }
}
