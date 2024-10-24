@extends('admin.layout.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><b>KELOLA PERSONIL</b></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="{{ route('DashboardAdmin') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Kelola Personil</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <b>Kelola Personil</b>
                    <a class="btn btn-success btn-sm" href="{{ route('Personil.create') }}">
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
                                <th>Personil</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($personil as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->personil }}</td>
                                    <td>
                                        <a href="{{ route('Personil.edit', $item->id) }}" class="btn btn-primary btn-sm"><i
                                                class="fa fa-edit"></i></a>
                                        <form action="{{ route('Personil.destroy', $item->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus?')"><i
                                                    class="fa fa-trash"></i></button>
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
