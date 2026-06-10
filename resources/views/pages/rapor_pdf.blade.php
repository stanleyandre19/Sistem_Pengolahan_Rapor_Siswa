<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<style>

body{
    font-family: DejaVu Sans, sans-serif;
    font-size:11px;
    color:#1e293b;
    margin:15px;
}

.header{
    background:#2563eb;
    color:white;
    text-align:center;
    padding:12px;
    border-radius:8px;
}

.header h1{
    margin:0;
    font-size:20px;
}

.header p{
    margin:3px 0 0;
    font-size:10px;
}

.card{
    border:1px solid #e5e7eb;
    border-radius:8px;
    padding:10px;
    margin-top:10px;
}

.info-table{
    width:100%;
}

.info-table td{
    padding:3px;
}

.nilai{
    width:100%;
    border-collapse:collapse;
    margin-top:10px;
}

.nilai th{
    background:#2563eb;
    color:white;
    padding:7px;
    font-size:10px;
}

.nilai td{
    border:1px solid #e5e7eb;
    padding:6px;
    font-size:10px;
}

.nilai tr:nth-child(even){
    background:#f8fafc;
}

.badge-lulus{
    color:#16a34a;
    font-weight:bold;
}

.badge-remedial{
    color:#dc2626;
    font-weight:bold;
}

.summary{
    margin-top:12px;
    text-align:center;
}

.box{
    width:31%;
    display:inline-block;
    border:1px solid #e5e7eb;
    border-radius:8px;
    padding:8px;
}

.box small{
    color:#64748b;
}

.box h2{
    margin:3px 0;
    color:#2563eb;
    font-size:16px;
}

.footer{
    margin-top:20px;
}

.ttd{
    width:100%;
}

.ttd td{
    text-align:center;
}

.garis{
    margin-top:30px;
}

.keterangan{
    margin-top:10px;
    background:#eff6ff;
    border-left:4px solid #2563eb;
    padding:8px;
    border-radius:5px;
    font-size:10px;
}

</style>

</head>

<body>

<div class="header">
    <h1> RAPOR SISWA</h1>
    <p>Sistem Pengolahan Rapor Siswa SD</p>
</div>

<div class="card">

<table class="info-table">

<tr>
    <td width="120"><b>Nama Siswa</b></td>
    <td>: {{ $siswa->nama }}</td>
</tr>

<tr>
    <td><b>NIS</b></td>
    <td>: {{ $siswa->nis ?? '-' }}</td>
</tr>

<tr>
    <td><b>Kelas</b></td>
    <td>: {{ $siswa->kelas ?? '-' }}</td>
</tr>

<tr>
    <td><b>Tanggal Cetak</b></td>
    <td>: {{ date('d-m-Y') }}</td>
</tr>

</table>

</div>

<table class="nilai">

<thead>

<tr>
    <th width="40">No</th>
    <th>Mata Pelajaran</th>
    <th width="70">Nilai</th>
    <th width="70">Predikat</th>
    <th width="90">Status</th>
</tr>

</thead>

<tbody>

@php
$total = 0;
@endphp

@foreach($nilai as $n)

@php

$total += $n->nilai_akhir;

if($n->nilai_akhir >= 90){
    $predikat = 'A';
}
elseif($n->nilai_akhir >= 80){
    $predikat = 'B';
}
elseif($n->nilai_akhir >= 70){
    $predikat = 'C';
}
else{
    $predikat = 'D';
}

@endphp

<tr>

<td align="center">
    {{ $loop->iteration }}
</td>

<td>
    {{ $n->mapel }}
</td>

<td align="center">
    {{ $n->nilai_akhir }}
</td>

<td align="center">
    {{ $predikat }}
</td>

<td align="center">

@if($n->nilai_akhir >= 75)

<span class="badge-lulus">
    LULUS
</span>

@else

<span class="badge-remedial">
    REMEDIAL
</span>

@endif

</td>

</tr>

@endforeach

</tbody>

</table>

@php

$rata = count($nilai) > 0
        ? round($total / count($nilai),2)
        : 0;

@endphp

<div class="summary">

<div class="box">
    <small>Rata-rata Nilai</small>
    <h2>{{ $rata }}</h2>
</div>

<div class="box">
    <small>Total Mapel</small>
    <h2>{{ count($nilai) }}</h2>
</div>

<div class="box">
    <small>Status Akhir</small>
    <h2>
        {{ $rata >= 75 ? 'LULUS' : 'REMEDIAL' }}
    </h2>
</div>

</div>

<div class="keterangan">

<b>Keterangan:</b><br>

A = Sangat Baik (90-100)<br>
B = Baik (80-89)<br>
C = Cukup (70-79)<br>
D = Kurang (<70)

</div>

<div class="footer">

<table class="ttd">

<tr>

<td>

Orang Tua / Wali

<div class="garis">
_____________________
</div>

</td>

<td>

Wali Kelas

<div class="garis">
_____________________
</div>

</td>

</tr>

</table>

</div>

</body>
</html>