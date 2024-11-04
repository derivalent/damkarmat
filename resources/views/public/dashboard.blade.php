@extends('public/layout/main')
@section('content')
    <main class="container">
        <div class="row gx-4 gx-lg-5 align-items-center my-4">
            <div class="col-lg-5" style="padding-left: 3%; padding-top: 1rem;">
                <div class="red-box">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://i.pinimg.com/originals/2b/de/de/2bdede0647e3cdf75b44ea33723201d9.jpg"
                                    class="d-block w-100" alt="Image 1">
                            </div>
                            <div class="carousel-item">
                                <img src="https://images6.alphacoders.com/462/thumb-1920-462371.jpg" class="d-block w-100"
                                    alt="Image 2">
                            </div>
                            <div class="carousel-item">
                                <img src="https://images5.alphacoders.com/343/thumb-1920-343645.jpg" class="d-block w-100"
                                    alt="Image 3">
                            </div>
                            <div class="carousel-item">
                                <img src="https://cdn.wallpapersafari.com/24/98/dwMtqD.jpg" class="d-block w-100"
                                    alt="Image 4">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <br>
            </div>
            <div class="col-lg-7">
                {{-- <h1 class="font-weight-light"><b>Dinas Pemadam Kebakaran dan Penyelamatan Kab. Banyuwangi</b></h1> --}}
                <h2 class="font-weight-light"><b>DINAS PEMADAM KEBAKARAN DAN PENYELAMATAN KAB. BANYUWANGI</b></h2>
                <p style="text-align: justify;"> Dinas Pemadam Kebakaran dan Penyelamatan Kabupaten Banyuwangi terbentuk
                    secara mandiri pada tanggal 3 Januari 2022,
                    yang mana sebelumnya masih menjadi satu dengan kesatuan Polisi Pamong Praja.
                    Berdasarkan Perda Kabupaten Banyuwangi Tentang Pembentukan dan Susunan Perangkat Daerah serta
                    Peraturan Bupati Banyuwangi dan Tentang Kedudukan, Susunan Organisasi, Tugas, Pokok dan Fungsi Serta
                    Tata Kerja Dinas Pemadam Kebakaran dan Penyelamatan Kabupaten Banyuwangi.</p>
                <a class="btn btn-primary"
                    href="https://spm.banyuwangikab.go.id/skpd/dinas-pemadam-kebakaran-dan-penyelamatan-kabupaten-banyuwangi">Selengkapnya..</a>
            </div>
        </div>

        <!-- Tampilan button lapor wa -->
        <div class="text-center mb-3">
            <p class="m-0"><b>Tekan tombol "LAYANAN PELAPORAN!!!" dibawah ini untuk berkomunikasi dengan pihak Damkar
                    Banyuwangi</b></p>
            <p class="m-0"><b>|| Layanan 24 jam || Gratis tidak dipungut biaya || Pastikan anda memberikan informasi yang
                    valid dan jelas ||</b></p>
        </div>
        <div class="btn btn-danger mt-3"
            style="width: 100%; margin-bottom: 50px; margin-top: -30px; position: relative; box-shadow: 0 9px 9px rgba(0, 0, 0, 0.1);">
            <p class="text-white m-0 my-1 py-1">
            <h2><a class="nav-link" {{-- href="https://wa.me/+6285748449996?text=LAPOR%20KEJADIAN!!!%0ASetelah%0Aberkomunikasi%0Avia%0Atelepon,%0Aharap%0Akirimkan%0Atitik%0Alokasi%0Akejadian."> --}}
                    href="https://wa.me/+6282211312113?text=LAPOR%20KEJADIAN!!!%0ASetelah%0Aberkomunikasi%0Avia%0Atelepon,%0Aharap%0Akirimkan%0Atitik%0Alokasi%0Akejadian.">
                    <b> LAYANAN PELAPORAN!!! </b></a></h2>
            </p>
        </div>


        <!-- Tampilan crad -->

        <div class="row">
            <!-- <div class="col-md-12 py-5 mt-2"  style="background-color: #b1d7ff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);"> -->
            <div class="col-md-12 py-2 mt-2">
                <h2 class="mb-4" style="color:black">
                    <center><b>BERITA TERKINI</b></center>
                </h2>
                <!-- Pagination -->
                <div id="card-container" class="row row-cols-1 row-cols-md-3 g-4">
                    <!-- Isi card di sini -->
                </div>
                <nav id="pagination" aria-label="Page navigation" class="mt-3 mb-3">
                    <ul class="pagination justify-content-center">
                        <!-- Tombol halaman akan ditambahkan di sini secara dinamis -->
                    </ul>
                </nav>

            </div>

        </div>
        <section class="section_public">
            <div class="row">
                <div class="col-md-7 mt-4 mb-4" style="height: 350px;">
                    <div class="card h-100">
                        <div class="card-body">
                            {{-- <iframe src="https://spm.banyuwangikab.go.id/skpd/dinas-pemadam-kebakaran-dan-penyelamatan"
                            style="width: 100%; height: 100%; border: none;"></iframe> --}}
                            <iframe
                                src="https://spm.banyuwangikab.go.id/skpd/dinas-pemadam-kebakaran-dan-penyelamatan-kabupaten-banyuwangi"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>
                    </div>
                </div>
                <!-- Maps -->
                <div class="col-md-5 mt-4 mb-4" style="height: 350px;">
                    <div id="map" style="width: 100%; height: 100%; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);"></div>
                    <script>
                        //Tampilan Maps
                        const map = L.map('map').setView([-8.234256388870639, 114.29139328370496], 9);
                        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                        }).addTo(map);

                        //Marker
                        //Lokasi 1
                        var lokasi1 = L.icon({
                            iconUrl: 'images/logo_damkar.png',
                            iconSize: [65, 40], // size of the icon
                        });

                        L.marker([-8.21124339808114, 114.37976274943635], {
                            icon: lokasi1
                        }).addTo(map).bindPopup("<b>MAKO DAMKAR BANYUWANGI</b><br>Telp: (0333) 422113").openPopup();

                        //Lokasi 2
                        var lokasi2 = L.icon({
                            iconUrl: 'images/logo_damkar.png',
                            iconSize: [65, 40], // size of the icon
                        });

                        L.marker([-8.397562413652105, 114.26973405885026], {
                            icon: lokasi2
                        }).addTo(map).bindPopup("<b>SEKTOR SRONO</b><br>Srono")

                        //Lokasi 3
                        var lokasi3 = L.icon({
                            iconUrl: 'images/logo_damkar.png',
                            iconSize: [65, 40], // size of the icon
                        });

                        L.marker([-8.361345425593777, 114.15939366898164], {
                            icon: lokasi3
                        }).addTo(map).bindPopup("<b>SEKTOR GENTENG</b><br>Genteng")

                        //Lokasi 4
                        var lokasi4 = L.icon({
                            iconUrl: 'images/logo_damkar.png',
                            iconSize: [65, 40], // size of the icon
                        });

                        L.marker([-8.48352765424662, 114.13341408000693], {
                            icon: lokasi4
                        }).addTo(map).bindPopup("<b>SEKTOR BANGOREJO</b><br>Bangorejo")

                        //Tampilan Maps Shareloc
                        const maps = L.map('map2').setView([-8.234256388870639, 114.29139328370496], 9);
                        const tile = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                        }).addTo(map);

                        //Lokasi 3
                        var sharel = L.icon({
                            iconUrl: './assets/image/logo_damkar.png',
                            iconSize: [65, 40], // size of the icon
                        });

                        L.marker([-8.361345425593777, 114.15939366898164], {
                            icon: lokasi3
                        }).addTo(map).bindPopup("<b>SEKTOR GENTENG</b><br>Genteng")
                    </script>
                </div>
            </div>
        </section>
        <div class="container-fluid px-4">
            <center>
                <h3 class="mt-4 mb-4"><b>GRAFIK KEJADIAN</b></h3>
            </center>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            <b> Penanganan Kebakaran dan Penyelamatan Perbulan </b>
                        </div>
                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Bar Chart Example
                        </div>
                        <div class="card-body"><canvas id="myYearlyBarChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">

                        {{-- <form action="{{ route('public.selectYear') }}" method="POST">
                            @csrf
                            <select name="year">
                                @foreach ($years as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                            <button type="submit">Select Year</button>
                        </form> --}}


                        {{-- grafik --}}
                        <form method="POST" action="{{ route('public.selectYear') }}" class="mb-3">
                            @csrf
                            <div class="form-group">
                                <label for="yearSelect">Pilih Data Penanganan Perbulan:</label>
                                <select name="year" id="yearSelect" class="form-control"
                                    onchange="this.form.submit()">
                                    @foreach ($years as $yearOption)
                                        <option value="{{ $yearOption }}" {{ $yearOption == $year ? 'selected' : '' }}>
                                            {{ $yearOption }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </form>

                    </div>

                </div>
                <div class="col-xl-6">
                    {{-- <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Bar Chart Example
                        </div>
                        <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                    </div> --}}
                </div>
            </div>
        </div>
    </main>



    {{-- //padahal tadi siang bisa --}}
    {{-- <script>
        // Data berita dari database
        var berita = @json($berita);

        // Mengubah data berita menjadi format yang sesuai
        var cards = berita.map(item => ({
            imageUrl: `{{ asset('storage/images_berita') }}/${item.gambar}`,
            title: item.judul,
            description: item.isi, // Use the appropriate field for description
            link: `{{ url('/berita_isi_public') }}/${item.id}`,
        }));

        // Fungsi untuk menampilkan card pada halaman tertentu
        function displayCards(page) {
            var startIndex = (page - 1) * 3;
            var endIndex = Math.min(startIndex + 3, cards.length);

            var cardContainer = document.getElementById('card-container');
            cardContainer.innerHTML = '';

            for (var i = startIndex; i < endIndex; i++) {
                var cardData = cards[i];
                var cardHtml = `
                    <div class="col mb-2">
                        <div class="card h-100 text-center">
                            <div class="card-header bg-danger"></div>
                            <a href="${cardData.link}"><img src="${cardData.imageUrl}" class="card-img-top" alt="${cardData.title}" /></a>
                            <div class="card-body">
                                <a href="${cardData.link}"><h5 class="card-title">${cardData.title}</h5></a>
                                <p class="card-text">${cardData.description}</p>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary" onclick="window.location.href = '${cardData.link}';">Detail</button>
                            </div>
                        </div>
                    </div>
                `;
                cardContainer.innerHTML += cardHtml;
            }
        }

        // Fungsi untuk menampilkan pagination
        function displayPagination() {
            var pagination = document.getElementById('pagination').querySelector('ul');
            pagination.innerHTML = '';

            var numPages = Math.ceil(cards.length / 3);
            for (var i = 1; i <= numPages; i++) {
                var listItem = document.createElement('li');
                listItem.classList.add('page-item');

                var link = document.createElement('a');
                link.classList.add('page-link');
                link.href = '#';
                link.textContent = i;
                link.onclick = function() {
                    displayCards(parseInt(this.textContent));
                    return false; // Prevent default behavior
                };

                listItem.appendChild(link);
                pagination.appendChild(listItem);
            }
        }

        // Display data when the page loads
        document.addEventListener('DOMContentLoaded', function() {
            displayCards(1); // Show the first page
            displayPagination(); // Show pagination
        });
    </script> --}}

    <script>
        // Data berita dari database

        var berita = @json($berita ?? []);


        // Mengubah data berita menjadi format yang sesuai
        var cards = berita.map(item => ({
            imageUrl: `{{ asset('storage/images_berita') }}/${item.gambar}`,
            title: item.judul,
            description: item.isi,
            link: `{{ url('/berita_isi_public') }}/${item.id}`,
        }));

        // Fungsi untuk menampilkan card pada halaman tertentu
        function displayCards(page) {
            var startIndex = (page - 1) * 3;
            var endIndex = Math.min(startIndex + 3, cards.length);

            var cardContainer = document.getElementById('card-container');
            cardContainer.innerHTML = '';

            for (var i = startIndex; i < endIndex; i++) {
                var cardData = cards[i];
                var cardHtml = `
                    <div class="col mb-2">
                        <div class="card h-100 text-center">
                            <div class="card-header bg-danger"></div>
                            <a href="${cardData.link}"><img src="${cardData.imageUrl}" class="card-img-top" alt="${cardData.title}" /></a>
                            <div class="card-body">
                                <a href="${cardData.link}"><h5 class="card-title">${cardData.title}</h5></a>
                                <p class="card-text">${cardData.description}</p>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary" onclick="window.location.href = '${cardData.link}';">Detail</button>
                            </div>
                        </div>
                    </div>
                `;
                cardContainer.innerHTML += cardHtml;
            }
        }

        // Fungsi untuk menampilkan pagination
        function displayPagination() {
            var pagination = document.getElementById('pagination').querySelector('ul');
            pagination.innerHTML = '';

            var numPages = Math.ceil(cards.length / 3);
            for (var i = 1; i <= numPages; i++) {
                var listItem = document.createElement('li');
                listItem.classList.add('page-item');

                var link = document.createElement('a');
                link.classList.add('page-link');
                link.href = '#';
                link.textContent = i;
                link.onclick = function() {
                    displayCards(parseInt(this.textContent));
                    return false; // Mencegah perilaku default
                };

                listItem.appendChild(link);
                pagination.appendChild(listItem);
            }
        }

        // Display data ketika halaman pertama kali dimuat
        document.addEventListener('DOMContentLoaded', function() {
            displayCards(1); // Tampilkan halaman pertama
            displayPagination(); // Tampilkan pagination
        });
    </script>


    {{-- //ini tampilan grafik kejadian bulanan --}}
    <script>
        const labels = @json($labels);
        const kebakaranData = @json($kebakaranData);
        const penyelamatanData = @json($penyelamatanData);
        const yearlyLabels = @json($yearlyLabels);
        const yearlyKebakaranData = @json($yearlyKebakaranData).map(Math.round); // Ubah ke integer
        const yearlyPenyelamatanData = @json($yearlyPenyelamatanData).map(Math.round); // Ubah ke integer


        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById('myAreaChart').getContext('2d');
            const myAreaChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels, // Use the labels from the PHP variable
                    datasets: [{
                            label: 'Kejadian Kebakaran',
                            data: kebakaranData, // Use the kebakaran data from the PHP variable
                            borderColor: 'rgba(255, 0, 0, 1)',
                            backgroundColor: 'rgba(255, 0, 0, 0.2)',
                            fill: true
                        },
                        {
                            label: 'Kejadian Penyelamatan',
                            data: penyelamatanData, // Use the penyelamatan data from the PHP variable
                            borderColor: 'rgba(0, 0, 255, 1)',
                            backgroundColor: 'rgba(0, 0, 255, 0.2)',
                            fill: true
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Grafik Kejadian Kebakaran dan Penyelamatan Tahun ini'
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });

        // Yearly Bar Chart
        const ctxBar = document.getElementById('myYearlyBarChart').getContext('2d');
        const myYearlyBarChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: yearlyLabels,
                datasets: [{
                        label: 'Kejadian Kebakaran',
                        data: yearlyKebakaranData,
                        backgroundColor: 'rgba(255, 0, 0, 0.6)',
                    },
                    {
                        label: 'Kejadian Penyelamatan',
                        data: yearlyPenyelamatanData,
                        backgroundColor: 'rgba(0, 0, 255, 0.6)',
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Grafik Kejadian Kebakaran dan Penyelamatan Per Tahun'
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1, // Set step size to 1 for whole numbers
                            callback: function(value) {
                                return Math.round(value); // Round the values to nearest integer
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection
