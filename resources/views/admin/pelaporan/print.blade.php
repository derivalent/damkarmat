{{-- <!DOCTYPE html>
<html>

<head>
    <title>Print Data Pelaporan</title>
    <style>
        /* Add styles as needed */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 100px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .header p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <div class="header" style="display: flex; align-items: center;">
        <div>
            <div class="col-6">
            <img src="{{ public_path('images/logo_damkar_persegi.png') }}" alt="Logo Dinas Pemadam Kebakaran" style="width: 100px; height: auto; margin-right: 10px;"/>
            </div>
            <div class="col-6">
            <h1>DINAS PEMADAM KEBAKARAN DAN PENYELAMATAN KABUPATEN BANYUWANGI</h1>
            <p>Jl. Tiga Berlian Kel. Kepatihan Kec.Banyuwangi Kab. Banyuwangi</p>
            </div>
        </div>
    </div>


    <hr>
    <h2><b>DATA PENANGANAN PELAPORAN</b></h2>
    <p>Bulan: {{ $month }}, Tahun: {{ $year }}</p>

    <table>
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
                <th>Foto Identitas</th>
                <th>Dokumentasi</th>
                <th>Penyebab</th>
                <th>Kerugian</th>
                <th>Korban</th>
                <th>Kendala</th>
                <th>Mobil Dinas</th>
                <th>Personil</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporans as $index => $laporan)
                <tr>
                    <td>{{ $index + 1 }}</td>
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
                    <td><img src="{{ public_path('storage/' . $laporan->dokumentasi) }}" alt="Dokumentasi"
                            class="img-fluid" style="width: 70px; height: 70px;"></td>
                    <td><img src="{{ public_path('storage/' . $laporan->data_diri) }}" alt="Data Diri" class="img-fluid"
                            style="width: 70px; height: 70px;"></td>

                    <td>{{ $laporan->penyebab }}</td>
                    <td>{{ $laporan->kerugian }}</td>
                    <td>{{ $laporan->korban }}</td>
                    <td>{{ $laporan->kendala }}</td>
                    <td>{{ $laporan->mobil_dinas }}</td>
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
</html>
