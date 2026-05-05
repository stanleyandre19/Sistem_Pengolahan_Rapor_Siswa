<!DOCTYPE html>
<html>
<head>
    <title>Rapor Siswa</title>
    <style>
        body { font-family: Arial; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
    </style>
</head>
<body>

<h2>RAPOR SISWA</h2>

<p>Nama: {{ $siswa->nama }}</p>
<p>Kelas: {{ $siswa->kelas }}</p>

<table>
    <tr>
        <th>Mapel</th>
        <th>Nilai Akhir</th>
    </tr>

    @foreach($nilai as $n)
    <tr>
        <td>{{ $n->mapel }}</td>
        <td>{{ $n->nilai_akhir }}</td>
    </tr>
    @endforeach

</table>

</body>
</html>