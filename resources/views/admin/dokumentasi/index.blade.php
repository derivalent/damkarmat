@extends('admin.layout.main')

@section('content')
    <main>
        @if (Auth::user()->role == 1 || Auth::user()->role == 2)
        <div class="container-fluid px-4">
            <h3 class="mt-4"><b>DATA DOKUMENTASI</b></h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="{{ route('DashboardAdmin') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Kelola Data Dokumentasi</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <b>Data Dokumentasi</b>
                    <a class="btn btn-success btn-sm" href="{{ route('dokumentasi.create') }}">
                        <i class="fa fa-plus"></i> &nbsp;Tambah 
                    </a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kegiatan</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dokumentasi as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->kegiatan }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $data->gambar) }}" width="100" alt="Gambar Kegiatan">
                                    </td>
                                    <td>
                                        <a href="{{ route('dokumentasi.edit', $data->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('dokumentasi.destroy', $data->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus dokumentasi ini?')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
        @if (Auth::user()->role == 3)
        <div class="container-fluid px-4">
            <h3 class="mt-4"><b>DATA DOKUMENTASI</b></h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="{{ route('DashboardAdmin') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Kelola Data Dokumentasi</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <b>Data Dokumentasi</b>
                    {{-- <a class="btn btn-success btn-sm" href="{{ route('dokumentasi.create') }}">
                        <i class="fa fa-plus"></i> &nbsp;Tambah Dokumentasi
                    </a> --}}
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kegiatan</th>
                                <th>Gambar</th>
                                {{-- <th>Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dokumentasi as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->kegiatan }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $data->gambar) }}" width="100" alt="Gambar Kegiatan">
                                    </td>
                                    {{-- <td>
                                        <a href="{{ route('dokumentasi.edit', $data->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('dokumentasi.destroy', $data->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus dokumentasi ini?')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </main>
@endsection
