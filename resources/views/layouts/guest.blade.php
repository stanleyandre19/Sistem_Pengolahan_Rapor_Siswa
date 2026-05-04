<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Rapor.id</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- NAVBAR -->
    <x-navbar />

    <!-- CONTENT -->
    <div class="p-10">
        @yield('content')
    </div>

    <!-- FOOTER -->
    <x-footer />

</body>
</html>