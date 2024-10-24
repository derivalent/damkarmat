@extends('admin.layout.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><b>DAFTAR PELAPORAN</b></h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Daftar Pelaporan</li>
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
                                <th>Berangkat</th>
                                <th>Tiba</th>
                                <th>Selesai</th>
                                <th>Lokasi</th>
                                <th>Pelapor</th>
                                <th>Pemilik</th>
                                <th>Penyebab</th>
                                <th>Kerugian</th>
                                <th>Korban</th>
                                <th>Kendala</th>
                                <th>Mobil Dinas</th>
                                <th>Personil</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporans as $laporan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $laporan->kejadian }}</td>
                                    <td>{{ $laporan->jenis_kejadian }}</td>
                                    <td>{{ $laporan->hari_kejadian }}</td>
                                    <td>{{ $laporan->laporan_masuk }}</td>
                                    <td>{{ $laporan->berangkat }}</td>
                                    <td>{{ $laporan->tiba }}</td>
                                    <td>{{ $laporan->selesai }}</td>
                                    <td>{{ $laporan->lokasi }}</td>
                                    <td>{{ $laporan->pelapor }}</td>
                                    <td>{{ $laporan->pemilik }}</td>
                                    <td>{{ $laporan->penyebab }}</td>
                                    <td>{{ $laporan->kerugian }}</td>
                                    <td>{{ $laporan->korban }}</td>
                                    <td>{{ $laporan->kendala }}</td>
                                    <td>{{ $laporan->mobil_dinas }}</td>
                                    {{-- <td>
                                        @if (is_array($laporan->personil))
                                            {{ implode(', ', $laporan->personil) }}
                                        @else
                                            {{ $laporan->personil }}
                                        @endif
                                    </td> --}}
                                    <td>
                                        @php
                                            $personilDecoded = json_decode($laporan->personil);
                                        @endphp
                                        @if (is_array($personilDecoded))
                                            {{ implode(', ', $personilDecoded) }}
                                        @else
                                            {{ $laporan->personil }}
                                        @endif
                                    </td>


                                    <td style="white-space: nowrap;">
                                        <div
                                            style="display: flex; justify-content: space-around; align-items: center; gap: 4px;">
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
                                <div class="modal fade" id="laporanDetailModal-{{ $laporan->id }}" tabindex="-1"
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
                                                <!-- Add more detail items as needed -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
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
