@extends('layouts.app') 

@section('content')

<div class="p-8">
    
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-800">Manajemen Akun</h2>
        <p class="text-gray-500 mt-1">Halaman khusus Admin untuk mendaftarkan akun Guru dan Wali Kelas.</p>
    </div>

    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 max-w-3xl">
        
        <h3 class="text-xl font-bold text-gray-700 mb-6 border-b pb-3">📝 Form Akun Baru</h3>

        @if (session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 p-4 rounded-lg mb-6 font-semibold">
                ✅ {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-500 p-4 rounded-lg mb-6 text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/register" method="POST" class="space-y-5">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-semibold text-gray-700">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full mt-1 p-2.5 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700">NIP</label>
                    <input type="text" name="nip" value="{{ old('nip') }}"
                        class="w-full mt-1 p-2.5 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700">Email Akses</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full mt-1 p-2.5 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700">Nomor Telepon</label>
                    <input type="text" name="telepon" placeholder="+62" value="{{ old('telepon') }}"
                        class="w-full mt-1 p-2.5 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50">
                </div>
            </div>

            <div class="border-t pt-5 mt-5 space-y-5">
                <div>
                    <label class="block text-sm font-semibold text-gray-700">Pilih Hak Akses (Role)</label>
                    <select name="role" required
                        class="w-full mt-1 p-2.5 border border-gray-300 rounded-lg bg-white outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" disabled selected>-- Pilih Peran --</option>
                        <option value="guru">Guru (Input Nilai)</option>
                        <option value="walikelas">Wali Kelas (Cetak Rapor)</option>
                        <option value="admin">Admin (Akses Penuh)</option>
                    </select>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Password</label>
                        <input type="password" name="password" required placeholder="Minimal 6 karakter"
                            class="w-full mt-1 p-2.5 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" required placeholder="Ulangi password"
                            class="w-full mt-1 p-2.5 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50">
                    </div>
                </div>
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-xl font-bold hover:bg-blue-700 active:scale-[0.99] transition shadow-md">
                    🚀 Daftarkan Akun User
                </button>
            </div>

        </form>
    </div>
</div>

@endsection