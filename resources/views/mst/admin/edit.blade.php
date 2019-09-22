@extends('layouts.master')


@section('title')
    Create New Admin
@endsection

@section('content')

    <div class="card container">
        <div class="card-header">
            <h1>Edit User Data</h1>
        </div>
        <div class="card-body">

            <form action="/admin/update" method="post">
                @csrf
                <div class="row form-group">
                    <div class="col-md-1">
                        <label for="">User Name</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="user_name" value="{{$user->user_name}}" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-1">
                        <label for="">Email</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="email" value="{{$user->email}}" class="form-control">
                    </div>
                    
                </div>
                <div class="row form-group">
                    <div class="col-md-1">
                        <label for="">Password</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="password" class="form-control">
                    </div>
                    <div class="col-md-1">
                        <label for="">Address</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="inst_address" value="{{$user->inst_address}}"  class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-1">
                        <label for="">Inst Code</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="inst_code" value="{{$user->inst_code}}"  class="form-control">
                    </div>
                    <div class="col-md-1">
                        <label for="">Inst Name</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="inst_name" value="{{$user->inst_name}}"  class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-1">
                        <label for="">Inst EIN</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="inst_ein" value="{{$user->inst_ein}}"  class="form-control">
                    </div>
                    <div class="col-md-1">
                        <label for="">Inst Logu</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="inst_logu" value="{{$user->inst_logu}}"  class="form-control">
                    </div>
                </div>
                <div class="col-md-2 col-md-offset-3">
                
                    <button class="btn btn-success bnt-block">Update</button>
                </div>
            </form>
        </div>
    </div>

@endsection