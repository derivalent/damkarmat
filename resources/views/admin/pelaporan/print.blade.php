<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pelaporan</title>
    <style>
        /* Tambahkan style sesuai kebutuhan */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
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
    <h1>Laporan Pelaporan</h1>
    <p>Bulan: {{ $month }}, Tahun: {{ $year }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Laporan Masuk</th>
                <th>Berangkat</th>
                <th>Tiba</th>
                <th>Selesai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporans as $index => $laporan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $laporan->laporan_masuk }}</td>
                    <td>{{ $laporan->berangkat }}</td>
                    <td>{{ $laporan->tiba }}</td>
                    <td>{{ $laporan->selesai }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
