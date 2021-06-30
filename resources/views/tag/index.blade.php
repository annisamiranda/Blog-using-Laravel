@extends('layouts.main')
@section('title','List Tag')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header py-3 bg-success">
                        <h3 class="m-0  text-primary mb-2">Daftar Tag</h3>
                        <a href="{{url('tag/create')}}" class="btn_2 btn-sm"><i class="fa fa-plus"></i> Tambah </a>
                    </div>
                    <div class="card-body">
                        <table id="artikel-table" class="table table-bordered table table-striped">
                            <thead>
                                <th>No</th>
                                <th>Tag</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @forelse ($tags as $key=>$value )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->tag_name }}</td>
                                        <td style="display:flex">
                                            <form action="/tag/{{ $value->id }}" method="post">
                                                <a href="/tag/{{ $value->id }}/edit" class="genric-btn warning mr-2"> Edit </a>
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="genric-btn danger " value="Delete"/>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr >
                                        <td colspan="3">No data</td>
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
