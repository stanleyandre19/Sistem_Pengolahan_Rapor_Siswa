<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Baru - Rapor.id</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-xl shadow-sm w-full max-w-md border border-gray-200">

        <div class="text-center mb-6">
            <h1 class="text-xl font-bold text-blue-600 italic mb-2 text-left">Rapor.id</h1>
            <h2 class="text-2xl font-bold text-gray-800">Daftar Akun Baru</h2>
        </div>
        
        <form action="{{ route('login') }}" method="GET" class="space-y-4">

            <div>
                <label class="block text-sm font-semibold text-gray-700">Nama Lengkap</label>
                <input type="text" class="w-full mt-1 p-2 border border-gray-300 rounded-lg outline-none">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700">NIP</label>
                <input type="text" class="w-full mt-1 p-2 border border-gray-300 rounded-lg outline-none">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700">Email</label>
                <input type="email" class="w-full mt-1 p-2 border border-gray-300 rounded-lg outline-none">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700">Nomor Telepon</label>
                <input type="text" class="w-full mt-1 p-2 border border-gray-300 rounded-lg outline-none" placeholder="+62">
            </div>

            <div>
                <select class="w-full mt-1 p-2 border border-gray-300 rounded-lg bg-white outline-none">
                    <option>Pilih User</option>
                    <option>Guru</option>
                    <option>Walikelas</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700">Password</label>
                <input type="password" placeholder="Minimal 6 karakter"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg outline-none">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700">Konfirmasi Pasword</label>
                <input type="password" placeholder="Ulangi password"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg outline-none">
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition shadow-lg">
                Daftar sekarang
            </button>

        </form>
        
        <p class="mt-4 text-center text-sm text-gray-600">
            <a href="{{ route('login') }}" class="font-bold text-gray-800 hover:underline">
               Masuk di sini
            </a>
        </p>

    </div>

</body>
</html>