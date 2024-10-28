@extends('admin.layout.main')
@section('content')

        <main>
            @if (Auth::user()->role == 1 || Auth::user()->role == 2)
            <div class="container-fluid px-4">
                <h1 class="mt-4"><b>Dashboard</b></h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><b>Dashboard Admin</b></li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body"><b> TAMBAH TAHUN</b></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{ route('Tahun.index') }}">Lihat</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body"><b> ARSIP DOKUMEN</b></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{ route('DashboardAdmin') }}">Lihat</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body"><b> PERSONIL</b></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{ route('Personil.index') }}">Lihat</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body"><b> DATA PELAPORAN</b></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{ route('Pelaporan.index') }}">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
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
                            {{-- <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Bar Chart Example
                    </div>
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div> --}}
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                Yearly Bar Chart Example
                            </div>
                            <div class="card-body">
                                <canvas id="myYearlyBarChart" width="100%" height="40"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            {{-- <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Data Kebakaran dan non-kebakaran 2023
                    </div>
                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div> --}}
                            <form method="POST" action="{{ route('admin.selectYear') }}" class="mb-3">
                                @csrf
                                <div class="form-group">
                                    <label for="yearSelect">Pilih Tahun:</label>
                                    <select name="year" id="yearSelect" class="form-control"
                                        onchange="this.form.submit()">
                                        @foreach ($years as $yearOption)
                                            <option value="{{ $yearOption }}"
                                                {{ $yearOption == $year ? 'selected' : '' }}>
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
                {{-- <div class="card mb-4">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-12 d-flex align-items-center justify-content-between" style="padding-bottom: 20px;">
                            <div class="d-flex align-items-center">
                                <i class="fa-regular fa-newspaper" style="color: #000000;"></i>
                                <b class="ms-2">BERITA</b>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="me-3 ">
                                    <select id="select-month" class="form-select form-select-sm" style="width: 150px;">
                                        <option value="">-Pilih Bulan-</option>
                                        <option value="JA">Januari</option>
                                        <option value="FE">Februari</option>
                                        <option value="MA">Maret</option>
                                        <option value="AP">April</option>
                                        <option value="ME">Mei</option>
                                        <option value="JU">Juni</option>
                                        <option value="JL">Juli</option>
                                        <option value="AG">Agustus</option>
                                        <option value="SE">September</option>
                                        <option value="OK">Oktober</option>
                                        <option value="NO">November</option>
                                        <option value="DE">Desember</option>
                                    </select>
                                </div>
                                <div class="me-3">
                                    <select id="select-year" class="form-select form-select-sm" style="width: 120px;">
                                        <option value="">-Pilih Tahun-</option>
                                        <option value="2023">2023</option>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                    </select>
                                </div>
                                <a class="btn btn-success btn-sm" href="#">
                                    <i class="fa fa-plus"></i> &nbsp;Tambah
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> --}}
                <div class="card mb-4">
                    {{-- <div class="card-header d-flex justify-content-between">
                    <b>Data Belajar</b>
                    <a class="btn btn-success btn-sm" href="{{ route('belajar.create') }}">
                        <i class="fa fa-plus"></i> &nbsp;Tambah
                    </a>
                </div> --}}
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <b>DATA JADWAL EDUKASI</b>
                        <a class="btn btn-success btn-sm" href="{{ route('belajar.create') }}">
                            <i class="fa fa-plus"></i> &nbsp;Tambah
                        </a>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table class="table table-striped table-bordered" id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Audience</th>
                                    <th>Hari</th>
                                    <th>Jam</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($belajars as $belajar)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $belajar->audience }}</td>
                                        <td>{{ $belajar->hari }}</td>
                                        <td>{{ $belajar->jam }}</td>
                                        <td>{{ $belajar->status }}</td>
                                        <td>
                                            <a href="{{ route('belajar.edit', $belajar->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('belajar.destroy', $belajar->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    @endif

    @if (Auth::user()->role == 3)
        <div class="container-fluid px-4">
            <h1 class="mt-4"><b>Dashboard</b></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><b>Dashboard Admin</b></li>
            </ol>
            <div class="row">
                {{-- <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body"><b> TAMBAH TAHUN</b></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('Tahun.index') }}">Lihat</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body"><b> ARSIP DOKUMEN</b></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('DashboardAdmin') }}">Lihat</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body"><b> PERSONIL</b></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('Personil.index') }}">Lihat</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body"><b> DATA PELAPORAN</b></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('Pelaporan.index') }}">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
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
                            Yearly Bar Chart Example
                        </div>
                        <div class="card-body">
                            <canvas id="myYearlyBarChart" width="100%" height="40"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <form method="POST" action="{{ route('admin.selectYear') }}" class="mb-3">
                            @csrf
                            <div class="form-group">
                                <label for="yearSelect">Pilih Tahun:</label>
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
                </div>
            </div>

            <div class="card mb-4">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <b>DATA JADWAL EDUKASI</b>
                    {{-- <a class="btn btn-success btn-sm" href="{{ route('belajar.create') }}">
                        <i class="fa fa-plus"></i> &nbsp;Tambah
                    </a> --}}
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Audience</th>
                                <th>Hari</th>
                                <th>Jam</th>
                                <th>Status</th>
                                {{-- <th>Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($belajars as $belajar)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $belajar->audience }}</td>
                                    <td>{{ $belajar->hari }}</td>
                                    <td>{{ $belajar->jam }}</td>
                                    <td>{{ $belajar->status }}</td>
                                    {{-- <td>
                                        <a href="{{ route('belajar.edit', $belajar->id) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('belajar.destroy', $belajar->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus?')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

    </main>

    <!-- JavaScript for Chart.js -->
    <script>
        const labels = @json($labels);
        const kebakaranData = @json($kebakaranData).map(Math.round); // Ubah ke integer
        const penyelamatanData = @json($penyelamatanData).map(Math.round); // Ubah ke integer
        const yearlyLabels = @json($yearlyLabels);
        const yearlyKebakaranData = @json($yearlyKebakaranData).map(Math.round); // Ubah ke integer
        const yearlyPenyelamatanData = @json($yearlyPenyelamatanData).map(Math.round); // Ubah ke integer

        document.addEventListener("DOMContentLoaded", function() {
            // Monthly Area Chart
            const ctxArea = document.getElementById('myAreaChart').getContext('2d');
            const myAreaChart = new Chart(ctxArea, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                            label: 'Kejadian Kebakaran',
                            data: kebakaranData,
                            borderColor: 'rgba(255, 0, 0, 1)',
                            backgroundColor: 'rgba(255, 0, 0, 0.2)',
                            fill: true
                        },
                        {
                            label: 'Kejadian Penyelamatan',
                            data: penyelamatanData,
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
        });
    </script>

@endsection
