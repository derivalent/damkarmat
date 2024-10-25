{{-- @extends('admin.layout.main')

@section('content')
<div class="container">
    <h2>Filter untuk Print Laporan</h2>

    <form method="GET" action="{{ route('Pelaporan.print') }}">
        <!-- Dropdown Pilih Bulan -->
        <div class="mb-3">
            <label for="select-month" class="form-label">Pilih Bulan</label>
            <select name="month" id="select-month" class="form-select">
                <option value="">-Pilih Bulan-</option>
                @foreach (range(1, 12) as $m)
                    <option value="{{ $m }}">{{ date('F', mktime(0, 0, 0, $m, 10)) }}</option>
                @endforeach
            </select>
        </div>

        <!-- Dropdown Pilih Tahun -->
        <div class="mb-3">
            <label for="select-year" class="form-label">Pilih Tahun</label>
            <select name="year" id="select-year" class="form-select">
                <option value="">-Pilih Tahun-</option>
                @foreach ($tahun as $thn)
                    <option value="{{ $thn->data_tahun }}">{{ $thn->data_tahun }}</option>
                @endforeach
            </select>
        </div>

        <!-- Dropdown Pilih Jenis Kejadian -->
        <div class="mb-3">
            <label for="jenis-kejadian" class="form-label">Pilih Jenis Kejadian</label>
            <select name="jenis_keadaan" id="jenis-kejadian" class="form-select">
                <option value="">-Pilih Jenis Kejadian-</option>
                <option value="kebakaran">Kebakaran</option>
                <option value="penyelamatan">Penyelamatan</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Print</button>
    </form>
</div>
@endsection --}}

@extends('admin.layout.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h2 class="mt-4"><b>Filter untuk Print Laporan</b></h2>

        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" action="{{ route('Pelaporan.print') }}">
                    <div class="row mb-3">
                        <!-- Dropdown Pilih Bulan -->
                        <div class="col-md-6">
                            <label for="select-month" class="form-label">Pilih Bulan</label>
                            <select name="month" id="select-month" class="form-select">
                                <option value="">-Pilih Bulan-</option>
                                @foreach (range(1, 12) as $m)
                                    <option value="{{ $m }}">{{ date('F', mktime(0, 0, 0, $m, 10)) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Dropdown Pilih Tahun -->
                        <div class="col-md-6">
                            <label for="select-year" class="form-label">Pilih Tahun</label>
                            <select name="year" id="select-year" class="form-select">
                                <option value="">-Pilih Tahun-</option>
                                @foreach ($tahun as $thn)
                                    <option value="{{ $thn->data_tahun }}">{{ $thn->data_tahun }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Dropdown Pilih Jenis Kejadian -->
                    <div class="mb-3">
                        <label for="jenis-kejadian" class="form-label">Pilih Jenis Kejadian</label>
                        <select name="jenis_keadaan" id="jenis-kejadian" class="form-select">
                            <option value="">-Pilih Jenis Kejadian-</option>
                            <option value="kebakaran">Kebakaran</option>
                            <option value="penyelamatan">Penyelamatan</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Print</button>
                    <a href="{{ route('Pelaporan.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
