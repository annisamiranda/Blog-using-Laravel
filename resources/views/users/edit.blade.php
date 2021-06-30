@extends('layouts.main')
@section('title','Edit User')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-header bg-primary">
                    Edit User
                </div>
                <div class="card-body">
                    <form class="row contact_form" action="/users/{{ $user->id }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12 form-group p_star">
                            <label for="">User Name</label>
                            <input type="text" class="form-control" id="user_name" name="user_name" value="{{ $user->user_name }}"/>
                            <@error('udrt_name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label for="">Email</label>
                            <input type="text" class="form-control" id="user_email" name="user_email" value="{{ $user->user_email }}"/>
                            <@error('tag_name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                         <div class="card-footer">
                            <button type="submit" class="btn_3">Edit</button>
                            <a href={{url('kategori')}} class="btn btn-dark">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
