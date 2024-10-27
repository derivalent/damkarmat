@extends('admin.layout.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Dokumentasi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ route('DashboardAdmin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('dokumentasi.index') }}">Kelola Dokumentasi</a></li>
            <li class="breadcrumb-item active">Edit Dokumentasi</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('dokumentasi.update', $dokumentasi->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="kegiatan" class="form-label">Kegiatan</label>
                        <input type="text" class="form-control" id="kegiatan" name="kegiatan" value="{{ $dokumentasi->kegiatan }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">
                        <div class="mt-3">
                            <img src="{{ asset('storage/' . $dokumentasi->gambar) }}" width="100">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('dokumentasi.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
