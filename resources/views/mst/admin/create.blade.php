@extends('layouts.master')


@section('title')
    Create New Admin
@endsection

@section('content')

    <div class="card container">
        <div class="card-header">
            <h1>Create New Admin</h1>
        </div>
        <div class="card-body">

            <form action="/admin/store" method="post">
                @csrf
                <div class="row form-group">
                    <div class="col-md-1">
                        <label for="">User Name</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="user_name" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-1">
                        <label for="">Email</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="col-md-1">
                        <label for="">Auth Code</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="auth_code" value="{{ Auth::user()->auth_code}}"  class="form-control">
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
                        <input type="text" name="inst_address" value="{{Auth::user()->inst_address}}"  class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-1">
                        <label for="">Inst Code</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="inst_code" value="{{Auth::user()->inst_code}}"  class="form-control">
                    </div>
                    <div class="col-md-1">
                        <label for="">Inst Name</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="inst_name" value="{{Auth::user()->inst_name}}"  class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-1">
                        <label for="">Inst EIN</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="inst_ein" value="{{Auth::user()->inst_ein}}"  class="form-control">
                    </div>
                    <div class="col-md-1">
                        <label for="">Inst Logu</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="inst_logu" value="{{Auth::user()->inst_logu}}"  class="form-control">
                    </div>
                </div>
                <div class="col-md-2 col-md-offset-3">
                
                    <button class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>

@endsection