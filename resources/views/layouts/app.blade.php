<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapor.id</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex min-h-screen text-gray-800">

    <!-- SIDEBAR -->
    <x-sidebar />

    <!-- MAIN CONTENT -->
    <main class="flex-1 flex flex-col bg-gray-50">

        <!-- NAVBAR -->
        <x-navbar />

        <!-- CONTENT -->
        <div class="p-6 md:p-8">
            <div class="max-w-6xl mx-auto space-y-6">

                @yield('content')

            </div>
        </div>

        <!-- FOOTER -->
        <x-footer />

    </main>

</body>
</html>