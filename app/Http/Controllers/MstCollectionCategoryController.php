<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\GetData;
use App\Mst_collection_category;

class MstCollectionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = GetData::fetch('mst_collection_categorys','category_status','1','category_id','asc');
        return view('mst.collection_category.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mst.collection_category.create');
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
            'category_name'          => 'required'
        ]);
        Mst_collection_category::create([
            'user_id'           => Auth::user()->id,
            'auth_code'         => Auth::user()->auth_code,
            'category_name'     => request('category_name'),
            'description'       => request('description')

        ]);

        return redirect('/collectioncategory')->with('create','A Collection Category Created Successfully');
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
        $data = GetData::fetch_edit('mst_collection_categorys','category_id',$id);
        
        return view('mst.collection_category.edit',compact('data'));
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
            'category_name' => 'required'
        ]);

        $data = DB::table('mst_collection_categorys')
            ->where([['category_id',$id],['auth_code',Auth::user()->auth_code]])
            ->update(['category_name'=>$_POST['category_name'],'description'=>$_POST['description']]);
        
        
        return redirect('/collectioncategory')->with('update','Collection Category Updated Successfully');
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

    public function inactive($category_id)
    {
        GetData::status('mst_collection_categorys','category_id',$category_id,'category_status',0);
        return redirect(url('collectioncategory'))->with('inactive','A Collection Category Successfully Inactive');
    }
}
