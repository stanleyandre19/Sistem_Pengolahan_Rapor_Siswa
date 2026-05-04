@extends('layouts.guest')

@section('content')

<style>
.hero {
    text-align: center;
    padding: 120px 20px;
    background: linear-gradient(135deg, #4e73df, #224abe);
    color: white;
    border-radius: 0 0 50px 50px;
}

.hero h1 {
    font-size: 40px;
    margin-bottom: 10px;
}

.hero p {
    font-size: 16px;
    opacity: 0.9;
}

.btn-main {
    display: inline-block;
    margin-top: 20px;
    padding: 12px 24px;
    background: white;
    color: #224abe;
    border-radius: 8px;
    font-weight: bold;
    text-decoration: none;
    transition: 0.3s;
}

.btn-main:hover {
    background: #f1f1f1;
}

/* FITUR */
.container {
    width: 85%;
    margin: auto;
    display: flex;
    justify-content: center;
    gap: 25px;
    margin-top: -40px;
    flex-wrap: wrap;
}

.card {
    background: white;
    padding: 25px;
    width: 220px;
    text-align: center;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-8px);
}

.card img {
    width: 55px;
    margin-bottom: 10px;
}
</style>

<!-- HERO -->
<div class="hero">
    <h1>Sistem Pengolahan Rapor Siswa</h1>
    <p>Platform digital untuk mempermudah guru dalam mengelola nilai dan laporan siswa</p>

    <a href="/login" class="btn-main">Mulai Sekarang</a>
</div>

<!-- FITUR -->
<div class="container">

    <div class="card">
        <img src="https://cdn-icons-png.flaticon.com/512/2921/2921222.png">
        <p><b>Data Siswa</b></p>
        <p style="font-size: 13px;">Kelola data siswa secara terstruktur</p>
    </div>

    <div class="card">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png">
        <p><b>Data Guru</b></p>
        <p style="font-size: 13px;">Manajemen data guru lebih mudah</p>
    </div>

    <div class="card">
        <img src="https://cdn-icons-png.flaticon.com/512/1828/1828919.png">
        <p><b>Rapor Digital</b></p>
        <p style="font-size: 13px;">Generate laporan rapor otomatis</p>
    </div>

</div>

@endsection