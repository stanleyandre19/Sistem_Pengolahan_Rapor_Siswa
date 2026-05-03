<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Home - Rapor.id</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;

            /* BACKGROUND + OVERLAY */
            background: linear-gradient(rgba(255,255,255,0.7), rgba(255,255,255,0.7)),
                        url('{{ asset("polibatam.jpg") }}');
            background-size: cover;
            background-position: center;
        }

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
            margin-left: 20px;
            text-decoration: none;
            color: #333;
            font-size: 14px;
        }

        /* BUTTON LOGIN REGISTER */
        .btn-login {
            padding: 8px 14px;
            border: 1px solid #224abe;
            color: #224abe;
            border-radius: 6px;
        }

        .btn-register {
            padding: 8px 14px;
            background: #224abe;
            color: white;
            border-radius: 6px;
        }

        /* HERO DENGAN GRADASI BIRU */
        .hero {
            text-align: center;
            padding: 100px 20px;
            background: linear-gradient(135deg, #4e73df, #224abe);
            color: white;
            border-radius: 0 0 40px 40px;
        }

        .hero h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .hero p {
            font-size: 16px;
            opacity: 0.9;
        }

        .btn-about {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: white;
            color: #224abe;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
        }

        /* CARD FITUR */
        .container {
            width: 80%;
            margin: auto;
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
        }

        .card {
            background: white;
            padding: 25px;
            width: 200px;
            text-align: center;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            width: 50px;
            margin-bottom: 10px;
        }

        /* FOOTER */
        .footer {
            text-align: center;
            margin-top: 60px;
            padding: 20px;
            color: #555;
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

        <!-- LOGIN & REGISTER -->
        <a href="/login" class="btn-login">Login</a>
        <a href="/register" class="btn-register">Register</a>
    </div>
</div>

<!-- HERO -->
<div class="hero">
    <h1>Sistem Pengelolaan Rapor Siswa</h1>
    <p>Kelola nilai siswa dengan cepat, mudah, dan digital</p>

    <!-- LINK KE ABOUT -->
    <a href="/about" class="btn-about">Pelajari Tentang Sistem</a>
</div>

<!-- FITUR -->
<div class="container">

    <div class="card">
        <img src="https://cdn-icons-png.flaticon.com/512/2921/2921222.png">
        <p><b>Data Siswa</b></p>
        <p style="font-size: 13px;">Kelola data siswa</p>
    </div>

    <div class="card">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png">
        <p><b>Data Guru</b></p>
        <p style="font-size: 13px;">Kelola data guru</p>
    </div>

    <div class="card">
        <img src="https://cdn-icons-png.flaticon.com/512/1828/1828919.png">
        <p><b>Raport Digital</b></p>
        <p style="font-size: 13px;">Laporan otomatis</p>
    </div>

</div>

<!-- FOOTER -->
<div class="footer">
    © 2026 Rapor.id | Project PBL Laravel
</div>

</body>
</html>