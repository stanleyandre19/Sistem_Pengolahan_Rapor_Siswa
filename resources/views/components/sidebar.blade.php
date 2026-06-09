<aside class="w-72 bg-white border-r border-gray-200 flex flex-col shadow-sm h-screen sticky top-0">

    <!-- LOGO -->
    <div class="p-8">
        <h1 class="text-3xl font-bold text-blue-600 italic">Rapor.id</h1>
        <p class="text-sm text-gray-400 mt-1">Sistem Rapor SD</p>
    </div>

    <nav class="flex-1 px-4 space-y-2 overflow-y-auto">

        @if(Auth::user()->role === 'admin')
            <a href="/dashboard" class="block px-4 py-3 rounded-xl hover:bg-gray-100">
                📊 Dashboard
            </a>
            <a href="/guru" class="block px-4 py-3 rounded-xl hover:bg-gray-100">
                👩‍🏫 Data Guru
            </a>
            <a href="/siswa" class="block px-4 py-3 rounded-xl hover:bg-gray-100">
                👨‍🎓 Data Siswa
            </a>
            <a href="/mapel" class="block px-4 py-3 rounded-xl hover:bg-gray-100">
                📚 Mata Pelajaran
            </a>
        @endif


        @if(Auth::user()->role === 'guru')
        <a href="/guru/dashboard" class="block px-4 py-3 rounded-xl hover:bg-gray-100">
                📊 Dashboard
            </a>
            <a href="/guru" class="block px-4 py-3 rounded-xl hover:bg-gray-100">
                👩‍🏫 Data Guru
            </a>
            <a href="/siswa" class="block px-4 py-3 rounded-xl hover:bg-gray-100">
                👨‍🎓 Data Siswa
            </a>
            <a href="/mapel" class="block px-4 py-3 rounded-xl hover:bg-gray-100">
                📚 Mata Pelajaran
            </a>
            <a href="/nilai" class="block px-4 py-3 rounded-xl hover:bg-gray-100">
                ✏️ Input Nilai
            </a>
        @endif


        @if(Auth::user()->role === 'walikelas')
            <a href="/walikelas/dashboard" class="block px-4 py-3 rounded-xl hover:bg-gray-100">
                📊 Dashboard
            </a>
            <a href="/siswa" class="block px-4 py-3 rounded-xl hover:bg-gray-100">
                👨‍🎓 Data Siswa
            </a>
            <a href="/rapor_pdf" class="block px-4 py-3 rounded-xl hover:bg-gray-100">
                🖨️ Lihat Raport
            </a>
        @endif

    </nav>

</aside>