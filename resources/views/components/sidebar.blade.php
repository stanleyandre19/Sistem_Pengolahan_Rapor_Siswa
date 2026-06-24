<aside class="w-72 bg-white border-r border-gray-200 flex flex-col shadow-xl h-screen sticky top-0">

    {{-- LOGO --}}
    <div class="p-8 border-b bg-gradient-to-r from-blue-50 via-white to-indigo-50">

        <h1 class="text-4xl font-extrabold text-blue-600 italic">
            Rapor.id
        </h1>

        <p class="text-sm text-gray-500 mt-2">
            Sistem Pengolahan Rapor Siswa SD
        </p>

        <div class="mt-4 flex gap-2 flex-wrap">

        </div>

    </div>

    {{-- USER INFO --}}
    <div class="p-5">

        <div class="bg-blue-50 rounded-3xl p-4 border border-blue-100">

            <p class="text-xs text-gray-500">
                Login Sebagai
            </p>

            <h3 class="font-bold text-gray-800 mt-1">
                {{ Auth::user()->name }}
            </h3>

            <span class="inline-block mt-2 px-3 py-1 rounded-full bg-blue-600 text-white text-xs">
                {{ strtoupper(Auth::user()->role) }}
            </span>

        </div>

    </div>

    {{-- MENU --}}
    <nav class="flex-1 px-4 pb-6 space-y-2 overflow-y-auto">

        {{-- ADMIN --}}
        @if(Auth::user()->role === 'admin')

            <p class="px-4 text-xs uppercase tracking-widest text-gray-400 font-bold">
                Main Menu
            </p>

            <a href="/dashboard"
               class="block px-4 py-3 rounded-2xl hover:bg-blue-50 hover:text-blue-600 hover:translate-x-1 transition-all duration-300">
                📊 Dashboard
            </a>

            <a href="/guru"
               class="block px-4 py-3 rounded-2xl hover:bg-blue-50 hover:text-blue-600 hover:translate-x-1 transition-all duration-300">
                👩‍🏫 Data Guru
            </a>

            <a href="/siswa"
               class="block px-4 py-3 rounded-2xl hover:bg-blue-50 hover:text-blue-600 hover:translate-x-1 transition-all duration-300">
                👨‍🎓 Data Siswa
            </a>

            <a href="/mapel"
               class="block px-4 py-3 rounded-2xl hover:bg-blue-50 hover:text-blue-600 hover:translate-x-1 transition-all duration-300">
                📚 Mata Pelajaran
            </a>

            <a href="/walikelas"
               class="block px-4 py-3 rounded-2xl hover:bg-blue-50 hover:text-blue-600 hover:translate-x-1 transition-all duration-300">
                👔 Data Wali Kelas
            </a>

            <a href="/mengajar"
               class="block px-4 py-3 rounded-2xl hover:bg-blue-50 hover:text-blue-600 hover:translate-x-1 transition-all duration-300">
                📖 Data Mengajar
            </a>

        @endif

        {{-- GURU --}}
        @if(Auth::user()->role === 'guru')

            <p class="px-4 text-xs uppercase tracking-widest text-gray-400 font-bold">
                Guru Menu
            </p>

            <a href="/guru/dashboard"
               class="block px-4 py-3 rounded-2xl hover:bg-blue-50 hover:text-blue-600 hover:translate-x-1 transition-all duration-300">
                📊 Dashboard
            </a>

            <a href="/guru"
               class="block px-4 py-3 rounded-2xl hover:bg-blue-50 hover:text-blue-600 hover:translate-x-1 transition-all duration-300">
                👩‍🏫 Data Guru
            </a>

            <a href="/siswa"
               class="block px-4 py-3 rounded-2xl hover:bg-blue-50 hover:text-blue-600 hover:translate-x-1 transition-all duration-300">
                👨‍🎓 Data Siswa
            </a>

            <a href="/mapel"
               class="block px-4 py-3 rounded-2xl hover:bg-blue-50 hover:text-blue-600 hover:translate-x-1 transition-all duration-300">
                📚 Mata Pelajaran
            </a>

            <a href="/nilai"
               class="block px-4 py-3 rounded-2xl hover:bg-blue-50 hover:text-blue-600 hover:translate-x-1 transition-all duration-300">
                ✏️ Input Nilai
            </a>

        @endif

        {{-- WALI KELAS --}}
        @if(Auth::user()->role === 'walikelas')

            <p class="px-4 text-xs uppercase tracking-widest text-gray-400 font-bold">
                Wali Kelas
            </p>

            <a href="/walikelas/dashboard"
               class="block px-4 py-3 rounded-2xl hover:bg-blue-50 hover:text-blue-600 hover:translate-x-1 transition-all duration-300">
                📊 Dashboard
            </a>

            <a href="/siswa"
               class="block px-4 py-3 rounded-2xl hover:bg-blue-50 hover:text-blue-600 hover:translate-x-1 transition-all duration-300">
                👨‍🎓 Data Siswa
            </a>

            <a href="/rapor"
               class="block px-4 py-3 rounded-2xl hover:bg-blue-50 hover:text-blue-600 hover:translate-x-1 transition-all duration-300">
                🖨️ Cetak Rapor
            </a>

        @endif

    </nav>

    {{-- FOOTER --}}
    <div class="p-5 border-t bg-gray-50">

        <div class="text-center">

            <p class="font-bold text-blue-600 text-lg">
                Rapor.id
            </p>

            <p class="text-xs text-gray-500">
                Sistem Pengolahan Rapor Siswa SD
            </p>

            <p class="text-xs text-blue-600 mt-2 font-semibold">
                Version 2.0
            </p>

        </div>

    </div>

</aside>