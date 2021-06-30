@extends('layouts.main')
@section('title','Create Tag')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header bg-primary">
                        Create Tag
                    </div>
                    <div class="card-body">
                        <form class="row contact_form" action="/tag" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 form-group p_star">
                                <label for="">Nama Tag</label><br>
                                <input type="text" class="form-control" id="tag_name" name="tag_name" />
                                @error('tag_name')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                             <div class="card-footer">
                                <button type="submit" class="btn_3">Submit</button>
                                <a href={{url('Tag')}} class="btn btn-dark">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
