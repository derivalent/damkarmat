{{-- @extends('admin.layout.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><b>TAMBAH BERITA ADMIN</b></h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="{{ route('KategoriKegiatan.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('Berita.index') }}">Berita Admin</a></li>
                <li class="breadcrumb-item active">Tambah Berita Admin</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    Tambah Berita Admin
                </div>
                <div class="card-body">
                    <form id="beritaForm" action="{{ route('Berita.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="gambar">Gambar:</label>
                            <input type="file" name="gambar" id="gambar" class="form-control-file" required
                                onchange="previewImage(event)">
                        </div>
                        <div class="form-group mb-3">
                            <!-- Element untuk menampilkan preview gambar -->
                            <img id="imagePreview" style="max-width: 300px; max-height: 300px; display: none;">
                        </div>
                        <div class="form-group mb-3">
                            <label for="isi" class="form-label">Isi</label>
                            <!-- CKEditor will replace this textarea -->
                            <textarea class="form-control" id="isi" name="isi" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('Berita.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- CKEditor versi 4.25.0-lts_standard -->
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>

    <script>
        // Fungsi untuk menampilkan preview gambar
        function previewImage(event) {
            var imagePreview = document.getElementById('imagePreview');
            var file = event.target.files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                }

                reader.readAsDataURL(file);
            }
        }

        // Inisialisasi CKEditor untuk textarea dengan id 'isi'
        document.addEventListener("DOMContentLoaded", function() {
            CKEDITOR.replace('isi', {
                removePlugins: 'notification' // Nonaktifkan pemberitahuan pembaruan
            });
        });
    </script>
@endsection --}}


@extends('admin.layout.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4"><b>TAMBAH BERITA ADMIN</b></h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('Berita.index') }}">Berita Admin</a></li>
            <li class="breadcrumb-item active">Tambah Berita Admin</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                Tambah Berita Admin
            </div>
            <div class="card-body">
                <form id="beritaForm" action="{{ route('Berita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="gambar">Gambar:</label>
                        <input type="file" name="gambar" id="gambar" class="form-control-file" required onchange="previewImage(event)">
                    </div>
                    <div class="form-group mb-3">
                        <img id="imagePreview" style="max-width: 300px; max-height: 300px; display: none;">
                    </div>
                    <div class="form-group mb-3">
                        <label for="isi" class="form-label">Isi</label>
                        <textarea class="form-control" id="isi" name="isi" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('Berita.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</main>

<!-- CKEditor versi 4.22.1 -->
<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>

<script>
    function previewImage(event) {
        var imagePreview = document.getElementById('imagePreview');
        var file = event.target.files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            }

            reader.readAsDataURL(file);
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        CKEDITOR.replace('isi'); // Inisialisasi CKEditor
    });
</script>
@endsection
