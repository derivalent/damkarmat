@extends('admin.layout.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah Dokumentasi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ route('DashboardAdmin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('dokumentasi.index') }}">Kelola Dokumentasi</a></li>
            <li class="breadcrumb-item active">Tambah Dokumentasi</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('dokumentasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="kegiatan" class="form-label">Kegiatan</label>
                        <input type="text" class="form-control" id="kegiatan" name="kegiatan" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" required onchange="previewImage()">
                        <div class="mt-3">
                            <img id="preview" src="#" alt="Pratinjau Gambar" style="max-width: 200px; display: none;" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('dokumentasi.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
    function previewImage() {
        const file = document.getElementById('gambar').files[0];
        const preview = document.getElementById('preview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
