@extends('layouts.guest')

@section('content')

<style>
.card {
    width: 60%;
    margin: 60px auto;
    background: white;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    text-align: center;
}

.title {
    font-size: 28px;
    letter-spacing: 4px;
    font-weight: bold;
    margin-bottom: 20px;
}

.desc {
    font-size: 15px;
    color: #444;
    line-height: 1.8;
    margin-bottom: 20px;
}

.fitur {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 30px;
}

.box {
    width: 150px;
    padding: 15px;
    background: #f5f5f5;
    border-radius: 10px;
}
</style>

<div class="card">

    <div class="title">TENTANG SISTEM</div>

    <div class="desc">
        Rapor.id merupakan sistem informasi berbasis web untuk mengelola nilai siswa secara digital.
    </div>

    <div class="desc">
        Mempermudah guru dalam input nilai dan membuat laporan rapor secara cepat dan efisien.
    </div>

    <div class="desc">
        Dikembangkan sebagai Project Based Learning (PBL) menggunakan Laravel.
    </div>

    <div class="fitur">
        <div class="box">
            <p>Kelola Data</p>
        </div>
        <div class="box">
            <p>Input Nilai</p>
        </div>
        <div class="box">
            <p>Laporan Rapor</p>
        </div>
    </div>

</div>

@endsection