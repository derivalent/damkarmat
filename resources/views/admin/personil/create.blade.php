@extends('admin.layout.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah Personil</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ route('DashboardAdmin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('Personil.index') }}">Kelola Personil</a></li>
            <li class="breadcrumb-item active">Tambah Personil</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('Personil.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="personil" class="form-label">Nama Personil</label>
                        <input type="text" class="form-control" id="personil" name="personil" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('Personil.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
