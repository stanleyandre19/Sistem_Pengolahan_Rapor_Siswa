<!DOCTYPE html>
<html>
<head>
    <title>Rapor Siswa</title>
    <style>
        body { font-family: Arial; }
        h2 { text-align: center; }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>

<h2>RAPOR SISWA</h2>

<p><b>Nama:</b> {{ $data->nama_siswa }}</p>
<p><b>Mapel:</b> {{ $data->mapel }}</p>

<table>
    <tr>
        <th>Tugas</th>
        <th>UTS</th>
        <th>UAS</th>
        <th>Nilai Akhir</th>
    </tr>

    <tr>
        <td>{{ $data->tugas }}</td>
        <td>{{ $data->uts }}</td>
        <td>{{ $data->uas }}</td>
        <td><b>{{ number_format($data->nilai_akhir,2) }}</b></td>
    </tr>
</table>

</body>
</html>