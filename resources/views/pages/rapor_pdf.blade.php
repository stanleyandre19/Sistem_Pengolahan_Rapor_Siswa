<!DOCTYPE html>
<html>
<head>
    <title>Rapor Siswa</title>

    <style>
        body { font-family: Arial; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
        h2 { text-align: center; }
    </style>

</head>

<body>

<h2>RAPOR SISWA</h2>

<p><b>Nama:</b> {{ $siswa->nama }}</p>
<p><b>Kelas:</b> {{ $siswa->kelas }}</p>

<table>
    <thead>
        <tr>
            <th>Mata Pelajaran</th>
            <th>Nilai Akhir</th>
        </tr>
    </thead>

    <tbody>

        @foreach($nilai as $n)
        <tr>
            <td>{{ $n->mapel }}</td>
            <td>{{ $n->nilai_akhir }}</td>
        </tr>
        @endforeach

    </tbody>
</table>

</body>
</html>