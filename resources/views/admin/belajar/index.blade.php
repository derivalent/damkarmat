@extends('admin.layout.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><b>KELOLA DATA BELAJAR</b></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="{{ route('DashboardAdmin') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Kelola Data Belajar</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <b>Data Belajar</b>
                    <a class="btn btn-success btn-sm" href="{{ route('belajar.create') }}">
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
                                <th>Audience</th>
                                <th>Hari</th>
                                <th>Jam</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($belajars as $belajar)
                                <tr>
                                    <td>{{ $belajar->id }}</td>
                                    <td>{{ $belajar->audience }}</td>
                                    <td>{{ $belajar->hari }}</td>
                                    <td>{{ $belajar->jam }}</td>
                                    <td>{{ $belajar->status }}</td>
                                    <td>
                                        <a href="{{ route('belajar.edit', $belajar->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('belajar.destroy', $belajar->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
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
    </main>
@endsection
