@extends('public/layout/main')
@section('content')
<main class="container">
    <div class="row gx-4 gx-lg-5 align-items-center my-4">
        <div class="col-lg-5" style="padding-left: 3%; padding-top: 1rem;">
            <div class="red-box">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://i.pinimg.com/originals/2b/de/de/2bdede0647e3cdf75b44ea33723201d9.jpg" class="d-block w-100" alt="Image 1">
                        </div>
                        <div class="carousel-item">
                            <img src="https://images6.alphacoders.com/462/thumb-1920-462371.jpg" class="d-block w-100" alt="Image 2">
                        </div>
                        <div class="carousel-item">
                            <img src="https://images5.alphacoders.com/343/thumb-1920-343645.jpg" class="d-block w-100" alt="Image 3">
                        </div>
                        <div class="carousel-item">
                            <img src="https://cdn.wallpapersafari.com/24/98/dwMtqD.jpg" class="d-block w-100" alt="Image 4">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <br>
        </div>
        <div class="col-lg-7">
            <h1 class="font-weight-light"><b>Dinas Pemadam Kebakaran dan Penyelamatan Kab. Banyuwangi</b></h1>
            <p style="text-align: justify;">  Dinas Pemadam Kebakaran dan Penyelamatan Kabupaten Banyuwangi terbentuk secara mandiri pada tanggal 3 Januari 2022,
                yang mana sebelumnya masih menjadi satu dengan kesatuan Polisi Pamong Praja.
                Berdasarkan Perda Kabupaten Banyuwangi Tentang Pembentukan dan Susunan Perangkat Daerah serta
                Peraturan Bupati Banyuwangi dan Tentang Kedudukan, Susunan Organisasi, Tugas, Pokok dan Fungsi Serta
                Tata Kerja Dinas Pemadam Kebakaran dan Penyelamatan Kabupaten Banyuwangi.</p>
            <a class="btn btn-primary" href="https://spm.banyuwangikab.go.id/skpd/dinas-pemadam-kebakaran-dan-penyelamatan">Selengkapnya..</a>
        </div>
    </div>

    <!-- Tampilan button lapor wa -->
    <div class="text-center mb-3">
        <p class="m-0"><b>Tekan tombol "LAYANAN PELAPORAN!!!" dibawah ini untuk berkomunikasi dengan pihak Damkar Banyuwangi</b></p>
        <p class="m-0"><b>|| Layanan 24 jam || Gratis tidak dipungut biaya || Pastikan anda memberikan informasi yang valid dan jelas ||</b></p>
    </div>
    <div class="btn btn-danger mt-3" style="width: 100%; margin-bottom: 50px; margin-top: -30px; position: relative; box-shadow: 0 9px 9px rgba(0, 0, 0, 0.1);">
        <p class="text-white m-0 my-1 py-1">
            <h2><a class="nav-link" href="https://wa.me/+6285748449996?text=LAPOR%20KEJADIAN!!!%0ASetelah%0Aberkomunikasi%0Avia%0Atelepon,%0Aharap%0Akirimkan%0Atitik%0Alokasi%0Akejadian."> <b> LAYANAN PELAPORAN!!! </b></a></h2>
        </p>
    </div>


    <!-- Tampilan crad -->
    <div class="row">
        <!-- <div class="col-md-12 py-5 mt-2"  style="background-color: #b1d7ff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);"> -->
        <div class="col-md-12 py-2 mt-2">
            <!--card-->
            <!-- <section id="card">
                <div class="container">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col mb-2">
                            <div class="card h-100 text-center">
                                <img src="images/logo_damkar_resize.png" class="card-img-top" alt="..." />
                                <div class="card-body">
                                    <h5 class="card-title">Penginapan</h5>
                                    <p class="card-text">
                                        Penginapan yang disediakan pada hotel aston terbagi sesuai tipe kamar dan terdapat tipe tempat tidur yang bisa dipilih oleh pemesan.
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary" onclick="window.location.href = 'penginapan.php';">Detail</button>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-2">
                            <div class="card h-100 text-center">
                                <img src="images/logo_kab_banyuwangi.png" class="card-img-top" alt="..." />
                                <div class="card-body">
                                    <h5 class="card-title">Sewa Ruangan</h5>
                                    <p class="card-text">
                                        Ruangan dapat disewa pada hotel aston seperti Balriim untuk kegiatan, terdadpat area kolah ataupun beberapa tempat lainnya yang ocok digunakan untuk kegiatan acara.
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary" onclick="window.location.href = 'sewaruangan.php';">Detail</button>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-2">
                            <div class="card h-100 text-center">
                                <img src="images/logo_damkar.png" class="card-img-top" alt="..." />
                                <div class="card-body">
                                    <h5 class="card-title">Restoran</h5>
                                    <p class="card-text">
                                        This is a wider card with supporting text below as a
                                        natural lead-in to additional content. This card has
                                        even longer content than the first to show that equal
                                        height action.
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary" onclick="window.location.href = 'restoran.php';">Detail</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
            <h2 class="mb-4" style="color:black"><center><b>BERITA TERKINI</b></center></h2>
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
    <div class="row">
    <div class="col-md-7 mt-4 mb-4" style="height: 350px;">
        <div class="card h-100">
            <div class="card-body">
                <iframe src="https://spm.banyuwangikab.go.id/skpd/dinas-pemadam-kebakaran-dan-penyelamatan" style="width: 100%; height: 100%; border: none;"></iframe>
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

            L.marker([-8.21124339808114, 114.37976274943635], { icon: lokasi1 }).addTo(map).bindPopup("<b>MAKO DAMKAR BANYUWANGI</b><br>Telp: (0333) 422113").openPopup();

            //Lokasi 2
            var lokasi2 = L.icon({
               iconUrl: 'images/logo_damkar.png',
               iconSize: [65, 40], // size of the icon
            });

            L.marker([-8.397562413652105, 114.26973405885026], { icon: lokasi2 }).addTo(map).bindPopup("<b>SEKTOR SRONO</b><br>Srono")

            //Lokasi 3
            var lokasi3 = L.icon({
               iconUrl: 'images/logo_damkar.png',
               iconSize: [65, 40], // size of the icon
            });

            L.marker([-8.361345425593777, 114.15939366898164], { icon: lokasi3 }).addTo(map).bindPopup("<b>SEKTOR GENTENG</b><br>Genteng")

            //Lokasi 4
            var lokasi4 = L.icon({
               iconUrl: 'images/logo_damkar.png',
               iconSize: [65, 40], // size of the icon
            });

            L.marker([-8.48352765424662, 114.13341408000693], { icon: lokasi4 }).addTo(map).bindPopup("<b>SEKTOR BANGOREJO</b><br>Bangorejo")

            //Tampilan Maps Shareloc
            const maps = L.map('map2').setView([-8.234256388870639, 114.29139328370496], 9);
            const tile = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
               attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            //Lokasi 3
            var sharel = L.icon({
                iconUrl: './assets/image/logo_damkar.png',
                iconSize:     [65, 40], // size of the icon
                });

             L.marker([-8.361345425593777, 114.15939366898164],{icon:lokasi3}).addTo(map).bindPopup("<b>SEKTOR GENTENG</b><br>Genteng")

         </script>
         </div>
    </div>
    <div class="container-fluid px-4">
        <center><h3 class="mt-4 mb-4"><b>GRAFIK KEJADIAN</b></h3></center>
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Data Kebakaran dan non-kebakaran 2023
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
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="row">
        <div class="col-6 mb-2 mt-3">
            <div class="chart-title mb-2">GRAFIK KEJADIAN PER BULAN 2024</div>
            <div id="grafik-container ">
                <canvas id="grafik"></canvas>
            </div>
        </div>
        <div class="col-6 mb-2 mt-3">
            <div class="chart-title mb-2">GRAFIK KEJADIAN TAHUNAN</div>
            <div id="grafik-container ">
                <canvas id="tahun-chart" width="400" height="200"></canvas>
            </div>
        </div>
     </div> -->
</main>
@endsection
