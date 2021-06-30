@extends('layouts.main')
@section('title','List User')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header py-3 bg-success">
                        <h3 class="m-0  text-primary mb-2">Daftar User</h3>
                        <a href="{{url('users/create')}}" class="btn_2 btn-sm"><i class="fa fa-plus"></i> Tambah </a>
                    </div>
                    <div class="card-body">
                        <table id="artikel-table" class="table table-bordered table table-striped">
                            <thead>
                                <th>No</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @forelse ($users as $key=>$value )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->user_name }}</td>
                                        <td>{{ $value->user_email }}</td>
                                        <td style="display:flex">
                                            <form action="/users/{{ $value->id }}" method="post">
                                                <a href="/users/{{ $value->id }}" class="genric-btn primary mr-2"> Show </a>
                                                <a href="/users/{{ $value->id }}/edit" class="genric-btn warning mr-2"> Edit </a>
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="genric-btn danger " value="Delete"/>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr >
                                        <td colspan="4">No data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
