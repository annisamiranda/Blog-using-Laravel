@extends('layouts.main')
@section('title','Edit Tag')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-header bg-primary">
                    Edit Tag
                </div>
                <div class="card-body">
                    <form class="row contact_form" action="/tag/{{ $tag->id }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12 form-group p_star">
                            <label for="">Nama Tag</label><br>
                            <input type="text" class="form-control" id="tag_name" name="tag_name" value="{{ $tag->tag_name }}"/>
                            @error('tag_name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                         <div class="card-footer">
                            <button type="submit" class="btn_3">Edit</button>
                            <a href={{url('tag')}} class="btn btn-dark">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
