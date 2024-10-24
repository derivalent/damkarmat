{{-- @extends('admin.layout.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><b>TAMBAH PELAPORAN</b></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ route('DashboardAdmin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('Pelaporan.index') }}">Daftar Pelaporan</a></li>
            <li class="breadcrumb-item active">Tambah Pelaporan</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <b>Form Tambah Pelaporan</b>
            </div>
            <div class="card-body">
                <form action="{{ route('Pelaporan.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="kejadian" class="form-label">Kejadian</label>
                        <input type="text" name="kejadian" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kejadian" class="form-label">Jenis Kejadian</label>
                        <select name="jenis_kejadian" class="form-select" required>
                            <option value="kebakaran">Kebakaran</option>
                            <option value="penyelamatan">Penyelamatan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="hari_kejadian" class="form-label">Hari Kejadian</label>
                        <input type="date" name="hari_kejadian" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="laporan_masuk" class="form-label">Laporan Masuk</label>
                        <input type="time" name="laporan_masuk" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="berangkat" class="form-label">Berangkat</label>
                        <input type="time" name="berangkat" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="tiba" class="form-label">Tiba</label>
                        <input type="time" name="tiba" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="selesai" class="form-label">Selesai</label>
                        <input type="time" name="selesai" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <input type="text" name="lokasi" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="pelapor" class="form-label">Pelapor</label>
                        <input type="text" name="pelapor" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="pemilik" class="form-label">Pemilik</label>
                        <input type="text" name="pemilik" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="penyebab" class="form-label">Penyebab</label>
                        <input type="text" name="penyebab" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="kerugian" class="form-label">Kerugian</label>
                        <input type="text" name="kerugian" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="korban" class="form-label">Korban</label>
                        <input type="text" name="korban" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="kendala" class="form-label">Kendala</label>
                        <input type="text" name="kendala" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="personil" class="form-label">Personil</label>
                        <select name="personil[]" class="form-select" multiple required>
                            @foreach ($personil as $p)
                                <option value="{{ $p->id }}">{{ $p->personil }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="mobil_dinas" class="form-label">Mobil Dinas</label>
                        <input type="text" name="mobil_dinas" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection --}}

{{-- @extends('layouts.admin.main')

@section('content')
<div class="container">
    <h1>Daftar Pelaporan</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('Pelaporan.create') }}" class="btn btn-primary mb-3">Tambah Laporan</a>
    <table class="table table-bordered">
        <thead>
            <tr>
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
                    <td>
                        @if (is_array($laporan->personil))
                            {{ implode(', ', $laporan->personil) }}
                        @else
                            {{ $laporan->personil }}
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('Pelaporan.edit', $laporan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('Pelaporan.destroy', $laporan->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus laporan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $laporans->links() }}
</div>
@endsection --}}

{{-- @extends('admin.layout.main')

@section('content')
<div class="container">
    <h1>Daftar Pelaporan</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('Pelaporan.create') }}" class="btn btn-primary mb-3">Tambah Laporan</a>

    <table class="table table-striped table-bordered" id="datatablesSimple">
        <thead>
            <tr>
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
                    <td>
                        @if (is_array($laporan->personil))
                            {{ implode(', ', $laporan->personil) }}
                        @else
                            {{ $laporan->personil }}
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('Pelaporan.edit', $laporan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('Pelaporan.destroy', $laporan->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus laporan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


</div>

@endsection --}}

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
