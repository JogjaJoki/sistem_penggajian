<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Karyawan</title>
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

    <h1>Laporan Data Karyawan</h1>

    @foreach ($data as $karyawan)
    <div class="container">
        <h2>{{ $karyawan->name }}</h2>

        <table class="details">
            <tr>
                <th>Nama:</th>
                <td>{{ $karyawan->name }}</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>{{ $karyawan->email }}</td>
            </tr>
            <tr>
                <th>Bagian:</th>
                <td>{{ $karyawan->bagian->name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Role:</th>
                <td>{{ ucfirst($karyawan->role) }}</td>
            </tr>
        </table>

        @if ($karyawan->detail)
        <table class="details">
            <tr>
                <th>Alamat:</th>
                <td>{{ $karyawan->detail->detail_address }}</td>
            </tr>
            <tr>
                <th>Nomor Telepon:</th>
                <td>{{ $karyawan->detail->phone }}</td>
            </tr>
        </table>
        @endif
    </div>
    @endforeach

</body>
</html>
