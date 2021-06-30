@extends('layouts.main')
@section('title','List Author')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header py-3 bg-success">
                        <h3 class="m-0  text-primary mb-2">Daftar Author</h3>
                        <a href="{{url('author/create')}}" class="btn_2 btn-sm"><i class="fa fa-plus"></i> Tambah </a>
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
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                 @forelse ($authors as $key=>$value)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->author_name }}</td>
                                    <td>{{ $value->author_email }}</td>
                                    <td>{{ $value->author_password }}</td>
                                    <td>{{ $value->bio }}</td>
                                    <td>
                                        <div class="media epost_item">
                                        <img src="{{asset('images/post/'.$value->author_ava)}}" alt="post">
                                        </div>
                                    </td>
                                    <td style="display:flex">
                                    <form action="/author/{{ $value->id }}" method="post">
                                        <a href="/author/{{ $value->id }}" class="genric-btn primary mr-2"> Show </a>
                                        <a href="/author/{{ $value->id }}/edit" class="genric-btn warning mr-2"> Edit </a>
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="genric-btn danger " value="Delete"/>
                                    </form>
                                    </td>
                                </tr>
                            @empty
                                <tr >
                                    <td colspan="7">No data</td>
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
