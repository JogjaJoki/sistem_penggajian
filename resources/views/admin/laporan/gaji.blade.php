<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Gaji</title>
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

        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h1>Laporan Gaji Bulanan</h1>

    @foreach ($data as $gaji)
    <div class="container">
        <h2>{{ $gaji->user->name }}</h2>

        <table class="details">
            <tr>
                <th>Nama:</th>
                <td>{{ $gaji->user->name }}</td>
            </tr>
            <tr>
                <th>Periode:</th>
                <td>{{ date('F Y') }}</td>
            </tr>
        </table>

        <table class="table">
            <thead>
                <tr>
                    <th>Komponen</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Uang Lembur</td>
                    <td>Rp {{ number_format($gaji->uang_lembur, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Tunjangan</td>
                    <td>Rp {{ number_format($gaji->tunjangan, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Potongan Absensi</td>
                    <td>- Rp {{ number_format($gaji->potongan_absensi, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Gaji Kotor</td>
                    <td>Rp {{ number_format($gaji->gaji_kotor, 0, ',', '.') }}</td>
                </tr>
                <tr class="total">
                    <td>Gaji Bersih</td>
                    <td>Rp {{ number_format($gaji->gaji_bersih, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    @endforeach

</body>
</html>
