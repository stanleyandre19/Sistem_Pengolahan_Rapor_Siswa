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
            <h1 class="text-xl font-bold text-blue-600 italic mb-2">Rapor.id</h1>
            <h2 class="text-2xl font-bold text-gray-800">Daftar Akun Baru</h2>
            <p class="text-gray-500 text-sm">Buat Akun Baru</p>
        </div>
        
        <form action="{{ route('login') }}" method="GET" class="space-y-4">

            <div>
                <label class="block text-sm font-semibold text-gray-700">Nama Lengkap</label>
                <input type="text" class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Nama Lengkap">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700">NISN/NIP</label>
                <input type="text" class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Masukkan NIP">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700">Email</label>
                <input type="email" class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Email">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700">Pilih User</label>
                <select class="w-full mt-1 p-2 border border-gray-300 rounded-lg bg-white outline-none">
                    <option>Siswa</option>
                    <option>Guru</option>
                    <option>Wali Murid</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700">Password</label>
                <input type="password" placeholder="Minimal 8 karakter"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <!-- 🔵 UBAH BUTTON HITAM → BIRU -->
            <button type="submit"
                class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition shadow-lg">
                Daftar sekarang
            </button>

        </form>
        
        <p class="mt-4 text-center text-sm text-gray-600">
            Sudah punya akun?
            <a href="{{ route('login') }}"
               class="font-bold text-blue-600 hover:underline">
               Masuk di sini
            </a>
        </p>

    </div>

</body>
</html>