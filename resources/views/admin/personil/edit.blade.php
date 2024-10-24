@extends('admin.layout.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><b>Edit Personil</b></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('DashboardAdmin') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('Personil.index') }}">Kelola Personil</a></li>
            <li class="breadcrumb-item active">Edit Personil</li>
        </ol>

        {{-- Form untuk mengedit personil --}}
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                Edit Data Personil
            </div>
            <div class="card-body">
                {{-- Pastikan method form adalah POST, dan action diarahkan ke route update --}}
                <form action="{{ route('Personil.update', $personil->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') {{-- Laravel Blade directive untuk method PUT --}}

                    <div class="form-group mb-3">
                        <label for="nama">Nama Personil</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $personil->nama) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ old('jabatan', $personil->jabatan) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $personil->email) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="telepon">Nomor Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon" value="{{ old('telepon', $personil->telepon) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ old('alamat', $personil->alamat) }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="file">Upload Foto (Opsional)</label>
                        <input type="file" class="form-control" id="file" name="file">
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> &nbsp;Simpan Perubahan
                    </button>
                    <a href="{{ route('Personil.index') }}" class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i> &nbsp;Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
