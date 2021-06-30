@extends('layouts.main')
@section('title','Detail Author')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header py-3 bg-success">
                    <h3 class="m-0  text-primary mb-2">Detail Author</h3>
                </div>
                <div class="card-body">
                    <table id="artikel-table" class="table table-bordered table table-striped">
                        <thead>
                            <th>No</th>
                            <th>Author Name</th>
                            <th>Author Email</th>
                            <th>Author Password</th>
                            <th>Author Bio</th>
                            <th>Author Ava</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $author->id}}</td>
                                <td>{{ $author->author_name }}</td>
                                <td>{{ $author->author_email }}</td>
                                <td>{{ $author->author_password }}</td>
                                <td>{{ $author->bio }}</td>
                                <td>
                                    <div class="media epost_item">
                                    <img src="{{asset('images/post/'.$author->author_ava)}}" alt="post">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
