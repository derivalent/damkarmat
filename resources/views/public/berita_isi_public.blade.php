@extends('public.layout.main')
@section('content')
{{-- <nav class="navbar navbar-expand-lg navbar-dark bg-medium-blue box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="https://i.postimg.cc/1zzb34Jq/LOGO-DAMKAR.png" alt="logo damkar" width="50px">
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

    <main class="container">
        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <img src="{{ asset('storage/images_berita/' . $berita->gambar) }}" class="card-img-top" alt="{{ $berita->judul }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $berita->judul }}</h5>
                            <p class="card-text"><small class="text-muted">Tanggal Rilis: {{ \Carbon\Carbon::parse($berita->created_at)->format('d F Y') }}</small></p>
                            <p class="card-text">{!! $berita->isi !!}</p> <!-- Ganti dari {{ $berita->isi }} ke {!! $berita->isi !!} -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5>Berita Terkini</h5>
                        </div>
                        <div class="list-group list-group-flush recent-posts-container" id="recent-posts">
                            <!-- Recent posts will be dynamically added here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        const recentPosts = @json($recentPosts);

        const formattedPosts = recentPosts.map(item => ({
            title: item.judul,
            date: new Date(item.created_at).toLocaleDateString(),
            img: `{{ asset('storage/images_berita') }}/${item.gambar}`,
            link: `{{ url('/berita_isi_public') }}/${item.id}`
        }));

        function sortPostsByDate(posts) {
            return posts.sort((a, b) => new Date(b.date) - new Date(a.date));
        }

        function displayRecentPosts(posts) {
            const sortedPosts = sortPostsByDate(posts);
            const recentPostsContainer = document.getElementById('recent-posts');
            recentPostsContainer.innerHTML = '';

            sortedPosts.forEach(post => {
                const postElement = document.createElement('a');
                postElement.href = post.link;
                postElement.className = 'list-group-item list-group-item-action';

                postElement.innerHTML = `
                    <img src="${post.img}" alt="Gambar Berita Kecil" class="recent-post-img">
                    <div>
                        <h6 class="mb-1">${post.title}</h6>
                        <small class="text-muted">${post.date}</small>
                    </div>
                `;

                recentPostsContainer.appendChild(postElement);
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            displayRecentPosts(formattedPosts);
        });
    </script>
@endsection

{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinas Pemadam Kebakaran Banyuwangi</title>
    <link rel="icon" type="x-icon" href="images/icon_logo_damkar.png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style_public.css') }}" />

    <style>
        .navbar-brand .logo-img {
            width: 15vw;
            max-width: 150px;
            height: auto;
            margin-right: 10px;
        }

        @media (max-width: 768px) {
            .navbar-brand .logo-img {
                min-width: 110px;
            }
        }

        .bg-medium-blue {
            background-color: #0000CD;
        }

        .navbar .brand-text {
            color: white;
            margin-top: 5px;
            margin-bottom: 0;
        }

        @media (max-width: 576px) {
            .navbar .brand-text {
                margin-top: 0;
                font-size: 0.8rem;
            }
        }

        .footer {
            background-color: #0000CD;
            color: #fff;
            padding: 20px 0;
        }

        .footer a {
            color: #fff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .footer .contact-info i {
            color: #ffc107;
            font-size: 24px;
            margin-right: 10px;
        }

        .footer .social-icons a {
            color: #fff;
            margin-right: 15px;
            font-size: 24px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-medium-blue box-shadow">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="images/logo_damkar.png" alt="Dinas Pemadam Kebakaran" class="me-2 logo-img">
            </a>
            <div class="brand-text mt-3">
                <h1><b>DAMKARMAT</b></h1>
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
                    <!-- Add more menu items as needed -->
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content Here -->
    <div class="container mt-4">
        <!-- Your page content goes here -->
        <main class="container">
            <div class="container mt-4">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <img src="{{ asset('storage/images_berita/' . $berita->gambar) }}" class="card-img-top" alt="{{ $berita->judul }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $berita->judul }}</h5>
                                <p class="card-text"><small class="text-muted">Tanggal Rilis: {{ \Carbon\Carbon::parse($berita->created_at)->format('d F Y') }}</small></p>
                                <p class="card-text">{!! $berita->isi !!}</p> <!-- Ganti dari {{ $berita->isi }} ke {!! $berita->isi !!} -->
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>Berita Terkini</h5>
                            </div>
                            <div class="list-group list-group-flush recent-posts-container" id="recent-posts">
                                <!-- Recent posts will be dynamically added here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>

    <footer class="footer">
        <div class="container text-center">
            <p class="mb-0">Dinas Pemadam Kebakaran dan Penyelamatan Kabupaten Banyuwangi.</p>
            <p class="mb-0">Nomor Telepon : 088888888888 / 112</p>
            <p class="mb-0">Email : </p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
    </footer>

    <!-- Bootstrap JavaScript (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script_public.js') }}"></script>
</body>

<script>
    const recentPosts = @json($recentPosts);

    const formattedPosts = recentPosts.map(item => ({
        title: item.judul,
        date: new Date(item.created_at).toLocaleDateString(),
        img: `{{ asset('storage/images_berita') }}/${item.gambar}`,
        link: `{{ url('/berita_isi_public') }}/${item.id}`
    }));

    function sortPostsByDate(posts) {
        return posts.sort((a, b) => new Date(b.date) - new Date(a.date));
    }

    function displayRecentPosts(posts) {
        const sortedPosts = sortPostsByDate(posts);
        const recentPostsContainer = document.getElementById('recent-posts');
        recentPostsContainer.innerHTML = '';

        sortedPosts.forEach(post => {
            const postElement = document.createElement('a');
            postElement.href = post.link;
            postElement.className = 'list-group-item list-group-item-action';

            postElement.innerHTML = `
                <img src="${post.img}" alt="Gambar Berita Kecil" class="recent-post-img">
                <div>
                    <h6 class="mb-1">${post.title}</h6>
                    <small class="text-muted">${post.date}</small>
                </div>
            `;

            recentPostsContainer.appendChild(postElement);
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        displayRecentPosts(formattedPosts);
    });
</script>

</html> --}}
