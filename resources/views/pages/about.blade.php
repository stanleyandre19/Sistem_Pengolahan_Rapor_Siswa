@extends('layouts.guest')

@section('content')

<style>
.hero {
    text-align: center;
    padding: 80px 20px;
    background: linear-gradient(135deg, #4e73df, #224abe);
    color: white;
    border-radius: 0 0 40px 40px;
}

.hero h1 {
    font-size: 30px;
    margin-bottom: 5px;
}

.hero p {
    font-size: 14px;
    opacity: 0.9;
}

/* CARD */
.card {
    width: 75%;
    margin: -40px auto 40px;
    background: white;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    text-align: center;
}

/* TEXT */
.desc {
    font-size: 15px;
    color: #444;
    line-height: 1.8;
    margin-bottom: 20px;
}

/* FITUR */
.fitur {
    display: flex;
    justify-content: center;
    gap: 25px;
    margin-top: 30px;
    flex-wrap: wrap;
}

.box {
    width: 180px;
    padding: 20px;
    background: white;
    border-radius: 15px;
    text-align: center;
    box-shadow: 0 8px 20px rgba(0,0,0,0.06);
    transition: 0.3s;
}

.box:hover {
    transform: translateY(-8px);
}

/* ICON */
.icon {
    width: 55px;
    height: 55px;
    margin: auto;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    margin-bottom: 10px;
}

/* TEXT DALAM BOX */
.title {
    font-weight: bold;
    margin-bottom: 5px;
}

.text {
    font-size: 12px;
    color: #666;
}
</style>

<!-- HERO -->
<div class="hero">
    <h1>Tentang Sistem Rapor</h1>
    <p>Sistem Pengolahan Rapor Siswa Berbasis Web</p>
</div>

<!-- CONTENT -->
<div class="card">

    <div class="desc">
        Rapor.id merupakan sistem informasi berbasis web yang digunakan 
        untuk membantu pengelolaan nilai siswa secara digital dengan cepat dan efisien.
    </div>

    <div class="desc">
        Sistem ini mempermudah guru dalam melakukan input nilai serta menghasilkan 
        laporan rapor secara otomatis dan terstruktur.
    </div>

    <div class="desc">
        Dikembangkan sebagai bagian dari Project Based Learning (PBL) menggunakan Laravel.
    </div>

    <!-- FITUR -->
    <div class="fitur">

        <div class="box">
            <div class="icon" style="background:#e0e7ff; color:#3730a3;">📂</div>
            <div class="title">Kelola Data</div>
            <div class="text">Data siswa & guru tersusun rapi</div>
        </div>

        <div class="box">
            <div class="icon" style="background:#dcfce7; color:#166534;">✏️</div>
            <div class="title">Input Nilai</div>
            <div class="text">Proses input cepat & mudah</div>
        </div>

        <div class="box">
            <div class="icon" style="background:#fef9c3; color:#854d0e;">📊</div>
            <div class="title">Laporan Rapor</div>
            <div class="text">Generate rapor otomatis</div>
        </div>

    </div>

</div>

@endsection