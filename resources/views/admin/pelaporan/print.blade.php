{{-- <!DOCTYPE html>
<html>
<head>
    <title>Print Data Pelaporan</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .header { text-align: center; margin-bottom: 20px; }
        .header img { max-width: 100px; }
        .header h1 { font-size: 24px; margin: 0; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        img { width: 70px; height: auto; } /* Image size in PDF */
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('images/logo_damkar_persegi.png') }}" alt="Logo Dinas Pemadam Kebakaran">
        <h1>DINAS PEMADAM KEBAKARAN DAN PENYELAMATAN KABUPATEN BANYUWANGI</h1>
        <p>Jl. Tiga Berlian Kel. Kepatihan Kec.Banyuwangi Kab. Banyuwangi</p>
    </div>
    <hr>
    <h2><b>DATA PENANGANAN PELAPORAN</b></h2>
    <p>Bulan: {{ $month }}, Tahun: {{ $year }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th><th>Kejadian</th><th>Jenis Kejadian</th><th>Hari Kejadian</th><th>Laporan Masuk</th>
                <th>Berangkat</th><th>Tiba</th><th>Selesai</th><th>Lokasi</th><th>Pelapor</th><th>Pemilik</th>
                <th>Foto Identitas</th><th>Dokumentasi</th><th>Penyebab</th><th>Kerugian</th>
                <th>Korban</th><th>Kendala</th><th>Mobil Dinas</th><th>Personil</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporans as $index => $laporan)
                <tr>
                    <td>{{ $index + 1 }}</td><td>{{ $laporan->kejadian }}</td><td>{{ $laporan->jenis_kejadian }}</td>
                    <td>{{ $laporan->hari_kejadian }}</td><td>{{ $laporan->laporan_masuk }}</td>
                    <td>{{ $laporan->berangkat }}</td><td>{{ $laporan->tiba }}</td><td>{{ $laporan->selesai }}</td>
                    <td>{{ $laporan->lokasi }}</td><td>{{ $laporan->pelapor }}</td><td>{{ $laporan->pemilik }}</td>

                    <!-- Image Fields -->
                    <td>
                        @if($laporan->data_diri)
                            <img src="{{ storage_path('app/public/' . $laporan->data_diri) }}" alt="Data Diri">
                        @else
                            Tidak ada data diri
                        @endif
                    </td>
                    <td>
                        @if($laporan->dokumentasi)
                            <img src="{{ storage_path('app/public/' . $laporan->dokumentasi) }}" alt="Dokumentasi">
                        @else
                            Tidak ada dokumentasi
                        @endif
                    </td>

                    <td>{{ $laporan->penyebab }}</td><td>{{ $laporan->kerugian }}</td><td>{{ $laporan->korban }}</td>
                    <td>{{ $laporan->kendala }}</td><td>{{ $laporan->mobil_dinas }}</td>
                    <td>{{ implode(', ', json_decode($laporan->personil, true)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> --}}

<!DOCTYPE html>
<html>
<head>
    <title>Print Data Pelaporan</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .header { text-align: center; margin-bottom: 20px; }
        .header img { max-width: 100px; }
        .header h1 { font-size: 24px; margin: 0; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; text-align: center; }
        img { width: 70px; height: auto; }
        .vertical-text-container {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 150px;
        }
        .vertical-text {
            writing-mode: vertical-rl;
            text-orientation: mixed;
            transform: rotate(180deg);
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('images/logo_damkar_persegi.png') }}" alt="Logo Dinas Pemadam Kebakaran">
        <h1>DINAS PEMADAM KEBAKARAN DAN PENYELAMATAN KABUPATEN BANYUWANGI</h1>
        <p>Jl. Tiga Berlian Kel. Kepatihan Kec.Banyuwangi Kab. Banyuwangi</p>
    </div>
    <hr>
    <h2><b>DATA PENANGANAN PELAPORAN</b></h2>
    <p>Bulan: {{ $month }}, Tahun: {{ $year }}</p>

    <table>
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Hari, Tanggal<br>dan Tahun Kejadian</th>
                <th rowspan="2">Objek<br>Pelaporan</th>
                <th rowspan="2">Pelapor</th>
                <th rowspan="2">NIK KTP</th>
                <th rowspan="2">Jenis<br>Kelamin</th>
                <th rowspan="2">Lokasi Kejadian</th>
                <th colspan="5">Waktu Tanggap</th>
                <th rowspan="2">Penyebab<br>Kebakaran</th>
                <th rowspan="2">Taksiran<br>Kerugian<br>Materi</th>
                <th colspan="3">Korban Jiwa</th>
                <th rowspan="2">Dokumentasi</th>
                <th rowspan="2">Kendala</th>
                <th rowspan="2">Mobil Dinas</th>
                <th rowspan="2">Personil</th>
            </tr>
            <tr>
                <th class="vertical-text-container"><div class="vertical-text">Menerima<br>Laporan</div></th>
                <th class="vertical-text-container"><div class="vertical-text">Berangkat<br>ke Lokasi</div></th>
                <th class="vertical-text-container"><div class="vertical-text">Tiba di<br>Lokasi</div></th>
                <th class="vertical-text-container"><div class="vertical-text">Penanganan</div></th>
                <th class="vertical-text-container"><div class="vertical-text">Response<br>Time</div></th>
                <th class="vertical-text-container"><div class="vertical-text">Meninggal</div></th>
                <th class="vertical-text-container"><div class="vertical-text">Luka Berat</div></th>
                <th class="vertical-text-container"><div class="vertical-text">Luka Ringan</div></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporans as $index => $laporan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $laporan->hari_kejadian }}</td>
                    <td>{{ $laporan->kejadian }}</td>
                    <td>{{ $laporan->pelapor }}</td>
                    <td>{{ $laporan->nik_ktp ?? 'Tidak ada data' }}</td>
                    <td>{{ $laporan->jenis_kelamin ?? 'Tidak ada data' }}</td>
                    <td>{{ $laporan->lokasi }}</td>

                    <!-- Waktu Tanggap Columns -->
                    <td>{{ $laporan->laporan_masuk }}</td>
                    <td>{{ $laporan->berangkat }}</td>
                    <td>{{ $laporan->tiba }}</td>
                    <td>{{ $laporan->selesai }}</td>
                    <td>{{ $laporan->response_time ?? 'Tidak ada data' }}</td>

                    <td>{{ $laporan->penyebab }}</td>
                    <td>{{ $laporan->kerugian }}</td>

                    <!-- Korban Jiwa Columns -->
                    <td>{{ $laporan->meninggal ?? 0 }}</td>
                    <td>{{ $laporan->luka_berat ?? 0 }}</td>
                    <td>{{ $laporan->luka_ringan ?? 0 }}</td>

                    <!-- Dokumentasi -->
                    <td>
                        @if($laporan->dokumentasi)
                            <img src="{{ storage_path('app/public/' . $laporan->dokumentasi) }}" alt="Dokumentasi">
                        @else
                            Tidak ada dokumentasi
                        @endif
                    </td>

                    <td>{{ $laporan->kendala }}</td>
                    <td>{{ $laporan->mobil_dinas }}</td>
                    <td>{{ implode(', ', json_decode($laporan->personil, true)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
