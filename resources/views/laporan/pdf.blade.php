<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>Laporan Observasi</title>

    <style>

        body{
            font-family: Arial, sans-serif;
        }

        h2{
            text-align:center;
            margin-bottom:20px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table, th, td{
            border:1px solid black;
        }

        th{
            background:#f2f2f2;
        }

        th, td{
            padding:8px;
            text-align:center;
        }

    </style>

</head>

<body>

    <h2>Laporan Observasi Guru</h2>

    <table>

        <thead>
            <tr>
                <th>No</th>
                <th>Guru</th>
                <th>Mapel</th>
                <th>Tanggal</th>
                <th>Nilai</th>
                <th>Kategori</th>
            </tr>
        </thead>

        <tbody>

        @foreach($observasis as $index => $observasi)

            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $observasi->nama_guru }}</td>
                <td>{{ $observasi->mata_pelajaran }}</td>
                <td>{{ $observasi->tanggal_observasi }}</td>
                <td>{{ $observasi->total_nilai }}</td>
                <td>{{ $observasi->kategori }}</td>
            </tr>

        @endforeach

        </tbody>

    </table>

</body>
</html>