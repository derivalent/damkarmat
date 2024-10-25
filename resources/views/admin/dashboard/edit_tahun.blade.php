@extends('admin.layout.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><b>EDIT DATA TAHUN</b></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('DashboardAdmin') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('Tahun.index') }}">Data Tahun</a></li>
            <li class="breadcrumb-item active">Edit Data Tahun</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <b>Form Edit Tahun</b>
            </div>
            <div class="card-body">
                <form action="{{ route('Tahun.update', $tahun->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="data_tahun" class="form-label">Tahun</label>
                        <input type="number" name="data_tahun" id="data_tahun" class="form-control"
                               value="{{ old('data_tahun', $tahun->data_tahun) }}" required>
                        @error('data_tahun')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('Tahun.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
