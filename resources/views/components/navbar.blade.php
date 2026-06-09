<header class="bg-white border-b border-gray-200 px-10 py-4 flex justify-between items-center shadow-sm">

    <h1 class="text-lg font-bold text-gray-700">
        Sistem Pengolahan Rapor Siswa
    </h1>

    <div class="flex items-center gap-6">

        <a href="/home" class="text-sm hover:text-blue-600 font-medium">Home</a>
        <a href="/about" class="text-sm hover:text-blue-600 font-medium">About</a>
        
        @guest
            <a href="/login"
               class="bg-blue-500 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-600 transition">
                Login
            </a>
        @endguest

        @auth
            <div class="flex items-center gap-4">
                <span class="text-sm font-semibold text-gray-600 border-r-2 border-gray-200 pr-4">
                    Halo, {{ Auth::user()->name }}
                </span>

                <a href="/logout"
                   class="bg-red-500 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-red-600 transition shadow-sm">
                    Logout
                </a>
            </div>
        @endauth

    </div>

</header>