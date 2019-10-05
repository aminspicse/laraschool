<?php
// this controller is just for test not for finally use
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Upload;
class UploadTest extends Controller
{
    //
    public function index()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        $request->image->store('photos');
    }
}
