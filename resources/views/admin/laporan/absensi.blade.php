<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Absensi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        h2 {
            margin-top: 0;
            color: #333;
        }

        .details {
            margin-bottom: 20px;
        }

        .details th {
            text-align: left;
            padding-right: 15px;
        }

        .details td {
            padding: 5px 0;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table, .table th, .table td {
            border: 1px solid #ddd;
        }

        .table th, .table td {
            padding: 10px;
            text-align: center;
        }

        .table th {
            background-color: #f8f8f8;
        }
    </style>
</head>
<body>

    <h1>Laporan Absensi Karyawan</h1>

    @foreach ($data as $absensi)
    <div class="container">
        <h2>{{ $absensi->user->name }}</h2>

        <table class="details">
            <tr>
                <th>Nama:</th>
                <td>{{ $absensi->user->name }}</td>
            </tr>
            <tr>
                <th>Tanggal:</th>
                <td>{{ $absensi->created_at->format('d-m-Y') }}</td>
            </tr>
        </table>

        <table class="table">
            <thead>
                <tr>
                    <th>Waktu Masuk</th>
                    <th>Waktu Keluar</th>
                    <th>Denda</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $absensi->in->format('H:i') }}</td>
                    <td>{{ $absensi->out->format('H:i') }}</td>
                    <td>Rp {{ number_format($absensi->denda, 0, ',', '.') }}</td>
                    <td>{{ $absensi->keterangan }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    @endforeach

</body>
</html>
