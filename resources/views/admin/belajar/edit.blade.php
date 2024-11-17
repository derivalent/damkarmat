@extends('admin.layout.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4"><b> EDIT JADWAL EDUKASI</b></h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ route('DashboardAdmin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('belajar.index') }}">Kelola Jadwal</a></li>
            <li class="breadcrumb-item active">Edit Jadwal Edukasi</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('belajar.update', $belajar->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="tamu" class="form-label">Tamu</label>
                        <input type="text" class="form-control" id="tamu" name="tamu" value="{{ $belajar->tamu }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="audience" class="form-label">Audience</label>
                        <input type="number" class="form-control" id="audience" name="audience" value="{{ $belajar->audience }}" required>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="hari" class="form-label">Hari</label>
                        <input type="date" class="form-control" id="hari" name="hari" value="{{ $belajar->hari }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="jam" class="form-label">Jam</label>
                        <input type="time" class="form-control" id="jam" name="jam" value="{{ $belajar->jam }}" required>
                    </div> --}}
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="hari" class="form-label">Hari</label>
                            <input type="date" class="form-control" id="hari" name="hari" value="{{ $belajar->hari }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="jam" class="form-label">Jam</label>
                            <input type="time" class="form-control" id="jam" name="jam" value="{{ $belajar->jam }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="terjadwal" {{ $belajar->status == 'terjadwal' ? 'selected' : '' }}>Terjadwal</option>
                            <option value="selesai" {{ $belajar->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('belajar.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
