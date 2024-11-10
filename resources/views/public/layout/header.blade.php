{{-- <nav class="navbar navbar-expand-lg navbar-dark bg-medium-blue box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
    <div class="container">
        <a class="navbar-brand" href="{{ route('Dashboard_public') }}">

            <img src="https://i.postimg.cc/1zzb34Jq/LOGO-DAMKAR.png" alt="Dinas Pemadam Kebakaran" class="me-2 logo-img">
        </a>
        <div class="brand-text mt-3">
            <p>
            <H1><b>DAMKARMAT</b></H1>
            </p>
            <p>Dinas Pemadam Kebakaran dan Penyelamatan</p>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('Dashboard_public') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('Information') }}">Informasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('BeritaPublic') }}">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dokumentasi_public') }}">Dokumentasi</a>
                </li>
                <!-- Tambahkan menu sesuai kebutuhan -->
            </ul>
        </div>
    </div>
</nav> --}}

<nav class="navbar navbar-expand-lg navbar-dark bg-medium-blue box-shadow">
    <div class="container d-flex align-items-center justify-content-between">
        <a class="navbar-brand" href="{{ route('Dashboard_public') }}">
            {{-- <img src="https://i.postimg.cc/1zzb34Jq/LOGO-DAMKAR.png" alt="Dinas Pemadam Kebakaran" class="me-2 logo-img"> --}}
            <img src="https://i.postimg.cc/jdLB8q6b/logo-kab-Banyuwangi.png" alt="Dinas Pemadam Kebakaran" class="me-2 logo-img-kab">
            <img src="https://i.postimg.cc/1zzb34Jq/logo_damkar_fix.jpg" alt="Dinas Pemadam Kebakaran" class="me-2 logo-img">
            <img src="https://i.postimg.cc/DzFjK7Gm/redkar.png" alt="Dinas Pemadam Kebakaran" class="me-2 logo-img">
        </a>
        <div class="text-center brand-text mx-auto">
            {{-- <h1 class="mb-2"><b>DAMKARMAT</b></h1> --}}
            <h5 class="mb-2"><b> DINAS PEMADAM KEBAKARAN DAN PENYELAMATAN </b></h5>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('Dashboard_public') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('Information') }}">Informasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('BeritaPublic') }}">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dokumentasi_public') }}">Dokumentasi</a>
                </li>
                <!-- Tambahkan menu sesuai kebutuhan -->
            </ul>
        </div>
    </div>
</nav>
