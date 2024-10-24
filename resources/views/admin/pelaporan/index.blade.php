@extends('admin.layout.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><b>DATA SELURUH PENANGANAN KEJADIAN</b></h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="{{ route('DashboardAdmin') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('Pelaporan.button_perkejadian') }}">Penanganan
                        Pelaporan</a></li>
                <li class="breadcrumb-item active">Data Seluruh Penanganan Kejadian</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-12 d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <i class="fa-regular fa-file" style="color: #000000;"></i> &nbsp;
                                <b class="ms-2">DAFTAR PELAPORAN</b>
                            </div>
                            <nav class="d-flex align-items-center">
                                <a class="btn btn-success btn-sm mb-2" href="{{ route('Pelaporan.create') }}">
                                    <i class="fa fa-plus"></i> &nbsp;Tambah Laporan
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <table class="table table-striped table-bordered" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kejadian</th>
                                <th>Jenis Kejadian</th>
                                <th>Hari Kejadian</th>
                                <th>Laporan Masuk</th>
                                <th>Detail</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporans as $laporan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $laporan->kejadian }}</td>
                                    <td>{{ $laporan->jenis_kejadian }}</td>
                                    <td>{{ \Carbon\Carbon::parse($laporan->hari_kejadian)->translatedFormat('d F Y') }}</td>
                                    <td>{{ $laporan->laporan_masuk }}</td>
                                    <td>
                                        <button class="btn btn-sm" style="background: none; border: none; color: blue;" data-bs-toggle="modal"
                                            data-bs-target="#laporanDetailModal-{{ $laporan->id }}">
                                            <i class="fas fa-eye" style="font-size: 15px;"></i>
                                        </button>
                                    </td>
                                    <td style="white-space: nowrap;">
                                        <div
                                            style="display: flex; justify-content: space-around; align-items: center; gap: 4px;">
                                            <!-- Eye icon to trigger modal -->
                                            {{-- <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#laporanDetailModal-{{ $laporan->id }}">
                                                <i class="fas fa-eye" style="font-size: 15px;"></i>
                                            </button> --}}
                                            <a class="btn btn-warning btn-sm"
                                                href="{{ route('Pelaporan.edit', $laporan->id) }}">
                                                <i class="fas fa-edit" style="font-size: 15px;"></i>
                                            </a>
                                            <form action="{{ route('Pelaporan.destroy', $laporan->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus laporan ini?')">
                                                    <i class="fas fa-trash-alt" style="font-size: 15px;"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal for laporan details -->
                                {{-- <div class="modal fade" id="laporanDetailModal-{{ $laporan->id }}" tabindex="-1"
                                    aria-labelledby="laporanDetailModalLabel-{{ $laporan->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="laporanDetailModalLabel-{{ $laporan->id }}">
                                                    <b>DETAIL LAPORAN</b>
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="detail-item">
                                                    <span class="detail-label" style="font-weight: bold;">Kejadian</span>
                                                    <span class="detail-value">: &nbsp;{{ $laporan->kejadian }}</span>
                                                </div>
                                                <div class="detail-item">
                                                    <span class="detail-label" style="font-weight: bold;">Jenis
                                                        Kejadian</span>
                                                    <span class="detail-value">:
                                                        &nbsp;{{ $laporan->jenis_kejadian }}</span>
                                                </div>
                                                <div class="detail-item">
                                                    <span class="detail-label" style="font-weight: bold;">Hari
                                                        Kejadian</span>
                                                    <span class="detail-value">: &nbsp;{{ \Carbon\Carbon::parse($laporan->hari_kejadian)->translatedFormat('d F Y') }}</span>
                                                </div>
                                                <div class="detail-item">
                                                    <span class="detail-label" style="font-weight: bold;">Laporan
                                                        Masuk</span>
                                                    <span class="detail-value">: &nbsp;{{ $laporan->laporan_masuk }}</span>
                                                </div>
                                                <div class="detail-item">
                                                    <span class="detail-label" style="font-weight: bold;">Berangkat</span>
                                                    <span class="detail-value">: &nbsp;{{ $laporan->berangkat }}</span>
                                                </div>
                                                <div class="detail-item">
                                                    <span class="detail-label" style="font-weight: bold;">Tiba</span>
                                                    <span class="detail-value">: &nbsp;{{ $laporan->tiba }}</span>
                                                </div>
                                                <!-- Add more detail items as needed -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="modal fade" id="laporanDetailModal-{{ $laporan->id }}" tabindex="-1"
                                    aria-labelledby="laporanDetailModalLabel-{{ $laporan->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="laporanDetailModalLabel-{{ $laporan->id }}">
                                                    <b>DETAIL LAPORAN</b>
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <b>Informasi Laporan</b>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row mb-2">
                                                            <div class="col-4">
                                                                <span class="detail-label" style="font-weight: bold;">Kejadian</span>
                                                            </div>
                                                            <div class="col-8">
                                                                <span class="detail-value">: &nbsp;{{ $laporan->kejadian }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-4">
                                                                <span class="detail-label" style="font-weight: bold;">Jenis Kejadian</span>
                                                            </div>
                                                            <div class="col-8">
                                                                <span class="detail-value">: &nbsp;{{ $laporan->jenis_kejadian }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-4">
                                                                <span class="detail-label" style="font-weight: bold;">Hari Kejadian</span>
                                                            </div>
                                                            <div class="col-8">
                                                                <span class="detail-value">: &nbsp;{{ \Carbon\Carbon::parse($laporan->hari_kejadian)->translatedFormat('d F Y') }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-4">
                                                                <span class="detail-label" style="font-weight: bold;">Laporan Masuk</span>
                                                            </div>
                                                            <div class="col-8">
                                                                <span class="detail-value">: &nbsp;{{ $laporan->laporan_masuk }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-4">
                                                                <span class="detail-label" style="font-weight: bold;">Berangkat</span>
                                                            </div>
                                                            <div class="col-8">
                                                                <span class="detail-value">: &nbsp;{{ $laporan->berangkat }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-4">
                                                                <span class="detail-label" style="font-weight: bold;">Tiba</span>
                                                            </div>
                                                            <div class="col-8">
                                                                <span class="detail-value">: &nbsp;{{ $laporan->tiba }}</span>
                                                            </div>
                                                        </div>
                                                        <!-- Add more detail items as needed -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script>
        setTimeout(function() {
            document.getElementById('success-alert').style.display = 'none';
        }, 2000); // 2000 milliseconds = 2 seconds
    </script>
@endsection
