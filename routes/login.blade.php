<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Rapor.id</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-10 rounded-2xl shadow-xl w-full max-w-sm text-center border border-gray-100">
        <div class="mb-8">
            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                <span class="text-blue-600 text-3xl font-bold italic">R</span>
            </div>
            <h1 class="text-2xl font-bold text-gray-800">Rapor.id</h1>
            <p class="text-gray-400 text-sm mt-1">Sistem Informasi & Layanan Raport Siswa</p>
        </div>
        
        <form action="{{ route('dashboard') }}" method="GET" class="space-y-4">
            <input type="text" placeholder="Username" class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none">
            <input type="password" placeholder="Password" class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none">
            <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-xl font-bold hover:bg-blue-700 transition shadow-md">LOGIN</button>
        </form>
        
        <div class="mt-6 flex flex-col space-y-2">
            <a href="{{ route('register') }}" class="text-sm text-blue-600 font-semibold hover:underline">Belum punya akun? Daftar disini</a>
        </div>
    </div>
</body>
</html>