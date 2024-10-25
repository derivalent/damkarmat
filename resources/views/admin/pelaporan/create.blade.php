@extends('admin.layout.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4"><b>TAMBAH LAPORAN</b></h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ route('DashboardAdmin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('Pelaporan.button_perkejadian') }}">Penanganan Pelaporan</a></li>
            <li class="breadcrumb-item active">Tambah Laporan</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <b>FORM LAPORAN</b>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('Pelaporan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mb-3">
                        <label for="kejadian" class="col-sm-2 col-form-label">Kejadian</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kejadian" name="kejadian" value="{{ old('kejadian') }}" required>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="jenis_kejadian" class="col-sm-2 col-form-label">Jenis Kejadian</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="jenis_kejadian" name="jenis_kejadian" required>
                                <option value="kebakaran" {{ old('jenis_kejadian') == 'kebakaran' ? 'selected' : '' }}>Kebakaran</option>
                                <option value="penyelamatan" {{ old('jenis_kejadian') == 'penyelamatan' ? 'selected' : '' }}>Penyelamatan</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="hari_kejadian" class="col-sm-2 col-form-label">Hari Kejadian</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="hari_kejadian" name="hari_kejadian" value="{{ old('hari_kejadian') }}" required>
                            <small class="form-text text-muted">Format: Tanggal-Bulan-Tahun</small>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Waktu Laporan</label>
                        <div class="col-sm-10 row">
                            <div class="col-md-3">
                                <label for="laporan_masuk" class="form-label">Laporan Masuk</label>
                                <input type="time" class="form-control" id="laporan_masuk" name="laporan_masuk" value="{{ old('laporan_masuk') }}" required>
                                <small class="form-text text-muted">Format: HH:MM AM/PM</small>
                            </div>
                            <div class="col-md-3">
                                <label for="berangkat" class="form-label">Berangkat</label>
                                <input type="time" class="form-control" id="berangkat" name="berangkat" value="{{ old('berangkat') }}" required>
                                <small class="form-text text-muted">Format: HH:MM AM/PM</small>
                            </div>
                            <div class="col-md-3">
                                <label for="tiba" class="form-label">Tiba</label>
                                <input type="time" class="form-control" id="tiba" name="tiba" value="{{ old('tiba') }}" required>
                                <small class="form-text text-muted">Format: HH:MM AM/PM</small>
                            </div>
                            <div class="col-md-3">
                                <label for="selesai" class="form-label">Selesai</label>
                                <input type="time" class="form-control" id="selesai" name="selesai" value="{{ old('selesai') }}" required>
                                <small class="form-text text-muted">Format: HH:MM AM/PM</small>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ old('lokasi') }}">
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="pelapor" class="col-sm-2 col-form-label">Pelapor</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pelapor" name="pelapor" value="{{ old('pelapor') }}">
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="pemilik" class="col-sm-2 col-form-label">Pemilik</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pemilik" name="pemilik" value="{{ old('pemilik') }}">
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="penyebab" class="col-sm-2 col-form-label">Penyebab</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="penyebab" name="penyebab">{{ old('penyebab') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="kerugian" class="col-sm-2 col-form-label">Kerugian</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="kerugian" name="kerugian">{{ old('kerugian') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="korban" class="col-sm-2 col-form-label">Korban</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="korban" name="korban">{{ old('korban') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="kendala" class="col-sm-2 col-form-label">Kendala</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="kendala" name="kendala">{{ old('kendala') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="mobil_dinas" class="col-sm-2 col-form-label">Mobil Dinas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="mobil_dinas" name="mobil_dinas" value="{{ old('mobil_dinas') }}">
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Personil</label>
                        <div class="col-sm-10">
                            @foreach ($personnels as $personnel)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="personil{{ $personnel->id }}" name="personil[]" value="{{ $personnel->personil }}" {{ (is_array(old('personil')) && in_array($personnel->personil, old('personil')) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="personil{{ $personnel->id }}">{{ $personnel->personil }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="dokumentasi" class="col-sm-2 col-form-label">Dokumentasi (Foto)</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="dokumentasi" name="dokumentasi" accept="image/*" onchange="previewImage('dokumentasi', 'previewDokumentasi')">
                            <img id="previewDokumentasi" src="{{ old('previewDokumentasi') }}" alt="Preview Dokumentasi" style="max-height: 150px; margin-top: 10px;">
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="data_diri" class="col-sm-2 col-form-label">Data Diri (Foto)</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="data_diri" name="data_diri" accept="image/*" onchange="previewImage('data_diri', 'previewDataDiri')">
                            <img id="previewDataDiri" src="{{ old('previewDataDiri') }}" alt="Preview Data Diri" style="max-height: 150px; margin-top: 10px;">
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('Pelaporan.button_perkejadian') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
