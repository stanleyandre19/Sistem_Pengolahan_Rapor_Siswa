<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapor.id</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex min-h-screen text-gray-800">

    <!-- SIDEBAR COMPONENT -->
    <x-sidebar />

    <!-- MAIN CONTENT -->
    <main class="flex-1 flex flex-col">

        <!-- NAVBAR COMPONENT -->
        <x-navbar />

        <!-- CONTENT HALAMAN -->
        <div class="p-10">
            @yield('content')
        </div>

    </main>

</body>
</html>