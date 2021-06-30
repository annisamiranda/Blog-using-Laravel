@extends('layouts.main')
@section('title','Create User')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header bg-primary">
                        Create User
                    </div>
                    <div class="card-body">
                        <form class="row contact_form" action="/users" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 form-group p_star">
                                <label for="">User Name</label>
                                <input type="text" class="form-control" id="user_name" name="user_name" />
                                @error('user_name')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label for="">Email</label>
                                <input type="text" class="form-control" id="user_email" name="user_email" />
                                @error('user_email')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                             <div class="card-footer">
                                <button type="submit" class="btn_3">Submit</button>
                                <a href={{url('users')}} class="btn btn-dark">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
