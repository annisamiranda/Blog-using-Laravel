@extends('layouts.main')
@section('title','Detail User')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header py-3 bg-success">
                    <h3 class="m-0  text-primary mb-2">Detail User</h3>
                </div>
                <div class="card-body">
                    <table id="artikel-table" class="table table-bordered table table-striped">
                        <thead>
                            <th>No</th>
                            <th>User Name</th>
                            <th>User Email</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $user->id}}</td>
                                <td>{{ $user->user_name }}</td>
                                <td>{{ $user->user_email }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
