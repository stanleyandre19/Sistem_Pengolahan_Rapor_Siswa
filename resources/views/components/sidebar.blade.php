<aside class="w-72 bg-white border-r border-gray-200 flex flex-col shadow-xl h-screen sticky top-0">

    {{-- LOGO --}}
    <div class="p-8 border-b">

        <h1 class="text-4xl font-extrabold text-blue-600 italic">
            Rapor.id
        </h1>

        <p class="text-sm text-gray-400 mt-1">
            Sistem Rapor SD
        </p>

    </div>

    {{-- MENU --}}
    <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">

        {{-- ADMIN --}}
        @if(Auth::user()->role === 'admin')

            <a href="/dashboard"
               class="block px-4 py-3 rounded-2xl hover:bg-blue-50 hover:text-blue-600 transition">
                📊 Dashboard
            </a>

            <a href="/guru"
               class="block px-4 py-3 rounded-2xl hover:bg-blue-50 hover:text-blue-600 transition">
                👩‍🏫 Data Guru
            </a>

            <a href="/siswa"
               class="block px-4 py-3 rounded-2xl hover:bg-blue-50 hover:text-blue-600 transition">
                👨‍🎓 Data Siswa
            </a>

            <a href="/mapel"
               class="block px-4 py-3 rounded-2xl hover:bg-blue-50 hover:text-blue-600 transition">
                📚 Mata Pelajaran
            </a>

            <a href="/walikelas"
               class="block px-4 py-3 rounded-2xl bg-gradient-to-r from-indigo-500 to-blue-600 text-white font-semibold shadow-lg">
                👔 Data Wali Kelas
            </a>

        @endif

        {{-- GURU --}}
        @if(Auth::user()->role === 'guru')

            <a href="/guru/dashboard"
               class="block px-4 py-3 rounded-2xl hover:bg-blue-50">
                📊 Dashboard
            </a>

            <a href="/guru"
               class="block px-4 py-3 rounded-2xl hover:bg-blue-50">
                👩‍🏫 Data Guru
            </a>

            <a href="/siswa"
               class="block px-4 py-3 rounded-2xl hover:bg-blue-50">
                👨‍🎓 Data Siswa
            </a>

            <a href="/mapel"
               class="block px-4 py-3 rounded-2xl hover:bg-blue-50">
                📚 Mata Pelajaran
            </a>

            <a href="/nilai"
               class="block px-4 py-3 rounded-2xl bg-gradient-to-r from-green-500 to-emerald-600 text-white font-bold shadow-lg">
                ✏️ Input Nilai
            </a>

        @endif

        {{-- WALI KELAS --}}
        @if(Auth::user()->role === 'walikelas')

            <a href="/walikelas/dashboard"
               class="block px-4 py-3 rounded-2xl hover:bg-blue-50">
                📊 Dashboard
            </a>

            <a href="/siswa"
               class="block px-4 py-3 rounded-2xl hover:bg-blue-50">
                👨‍🎓 Data Siswa
            </a>

            <a href="/rapor"
               class="block px-4 py-3 rounded-2xl bg-gradient-to-r from-purple-500 to-indigo-600 text-white font-semibold shadow-lg">
                🖨️ Lihat Rapor
            </a>

        @endif

    </nav>

    {{-- FOOTER SIDEBAR --}}
    <div class="p-4 border-t text-center text-xs text-gray-400">
        Rapor.id v1.0
    </div>

</aside>