@extends('admin.layout.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><b> TAMBAH JADWAL EDUKASI</b></h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="{{ route('DashboardAdmin') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('belajar.index') }}">Kelola Jadwal Edukasi</a></li>
                <li class="breadcrumb-item active">Tambah Jadwal Edukasi</li>
            </ol>

            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('belajar.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="tamu" class="form-label">Tamu</label>
                            <input type="text" class="form-control" id="tamu" name="tamu" required>
                        </div>
                        <div class="mb-3">
                            <label for="audience" class="form-label">Audience</label>
                            <input type="number" class="form-control" id="audience" name="audience" required>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="hari" class="form-label">Hari</label>
                                <input type="date" class="form-control" id="hari" name="hari" required>
                            </div>
                            <div class="col-md-6">
                                <label for="jam" class="form-label">Jam</label>
                                <input type="time" class="form-control" id="jam" name="jam" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="terjadwal">Terjadwal</option>
                                <option value="selesai">Selesai</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('belajar.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
