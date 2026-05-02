<!DOCTYPE html>
<html>
<head>
    <title>Tentang - Rapor.id</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;

            /* Background sama seperti home */
            background: linear-gradient(rgba(255,255,255,0.7), rgba(255,255,255,0.7)),
                        url('{{ asset('img/polibatam.jpg') }}');
            background-size: cover;
            background-position: center;
        

        /* NAVBAR */
        .navbar {
            background: white;
            padding: 15px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
        }

        .navbar .menu a {
            margin-left: 25px;
            text-decoration: none;
            color: #333;
            font-size: 14px;
        }

        /* CARD */
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

        /* BOX FITUR */
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

        .box img {
            width: 50px;
            margin-bottom: 10px;
        }

        .box p {
            font-size: 13px;
            margin: 0;
        }

    </style>
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <div><b>Rapor.id</b></div>

    <div class="menu">
        <a href="/home">Beranda</a>
        <a href="/about">Tentang</a>
    </div>
</div>

<!-- CONTENT -->
<div class="card">

    <div class="title">TENTANG SISTEM</div>

    <div class="desc">
        Rapor.id merupakan sistem informasi berbasis web yang digunakan 
        untuk membantu pengelolaan nilai siswa secara digital. 
        Sistem ini dirancang untuk mempermudah guru dalam melakukan 
        input nilai serta menghasilkan laporan rapor dengan lebih cepat 
        dan efisien.
    </div>

    <div class="desc">
        Dengan adanya sistem ini, proses pengolahan data menjadi lebih 
        terstruktur, aman, dan mudah diakses oleh pihak yang berwenang 
        seperti Admin TU, Guru, dan Wali Kelas.
    </div>

    <div class="desc">
        Aplikasi ini dikembangkan sebagai bagian dari Project Based Learning (PBL) 
        menggunakan framework Laravel.
    </div>

    <!-- FITUR -->
    <div class="fitur">

        <div class="box">
            <img src="https://cdn-icons-png.flaticon.com/512/2921/2921222.png">
            <p>Kelola Data</p>
        </div>

        <div class="box">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png">
            <p>Input Nilai</p>
        </div>

        <div class="box">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828919.png">
            <p>Laporan Rapor</p>
        </div>

    </div>

</div>

</body>
</html>