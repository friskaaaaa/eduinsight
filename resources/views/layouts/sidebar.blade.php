<aside class="w-64 bg-gradient-to-b from-blue-600 via-indigo-600 to-purple-700 text-white min-h-screen fixed left-0 top-0 shadow-xl flex flex-col">

    {{-- Logo --}}
    <div class="p-5">

        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4">

            <h1 class="text-2xl font-bold flex items-center gap-2">
                🎓 EduInsight
            </h1>

            <p class="text-blue-100 text-sm mt-1">
                Observasi & Evaluasi Guru
            </p>

        </div>

    </div>

    {{-- User Info --}}
    <div class="px-5 mb-4">

        <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4">

            <p class="text-xs text-blue-100">
                Login sebagai
            </p>

            <p class="font-semibold text-white">
                {{ Auth::user()->name }}
            </p>

            <p class="text-xs text-blue-200 capitalize">
                {{ Auth::user()->role }}
            </p>

        </div>

    </div>

    {{-- Menu --}}
    <nav class="flex-1 px-3">

        <a href="{{ route('dashboard') }}"
           class="{{ request()->routeIs('dashboard')
           ? 'block px-4 py-3 rounded-xl bg-white/20 shadow mb-1'
           : 'block px-4 py-3 rounded-xl hover:bg-white/10 transition mb-1' }}">

            📊 Dashboard

        </a>

        <a href="{{ route('observasi.index') }}"
           class="{{ request()->routeIs('observasi.*')
           ? 'block px-4 py-3 rounded-xl bg-white/20 shadow mb-1'
           : 'block px-4 py-3 rounded-xl hover:bg-white/10 transition mb-1' }}">

            📝 Observasi Kelas

        </a>

        <a href="{{ route('observasi.riwayat') }}"
           class="{{ request()->routeIs('observasi.riwayat')
           ? 'block px-4 py-3 rounded-xl bg-white/20 shadow mb-1'
           : 'block px-4 py-3 rounded-xl hover:bg-white/10 transition mb-1' }}">

            📚 Riwayat Observasi

        </a>

        <a href="{{ route('evaluasi.index') }}"
           class="{{ request()->routeIs('evaluasi.*')
           ? 'block px-4 py-3 rounded-xl bg-white/20 shadow mb-1'
           : 'block px-4 py-3 rounded-xl hover:bg-white/10 transition mb-1' }}">

            📈 Evaluasi Pembelajaran

        </a>

        <a href="{{ route('laporan.index') }}"
           class="{{ request()->routeIs('laporan.*')
           ? 'block px-4 py-3 rounded-xl bg-white/20 shadow mb-1'
           : 'block px-4 py-3 rounded-xl hover:bg-white/10 transition mb-1' }}">

            📄 Laporan

        </a>

        <a href="{{ route('profile.edit') }}"
           class="{{ request()->routeIs('profile.*')
           ? 'block px-4 py-3 rounded-xl bg-white/20 shadow mb-1'
           : 'block px-4 py-3 rounded-xl hover:bg-white/10 transition mb-1' }}">

            👤 Profil

        </a>

        @if(auth()->user()->role === 'admin')

            <a href="{{ route('pengaturan.index') }}"
               class="{{ request()->routeIs('pengaturan.*')
               ? 'block px-4 py-3 rounded-xl bg-white/20 shadow mb-1'
               : 'block px-4 py-3 rounded-xl hover:bg-white/10 transition mb-1' }}">

                ⚙️ Pengaturan

            </a>

        @endif

    </nav>

    {{-- Footer --}}
    <div class="p-4 space-y-3">

        <form method="POST" action="{{ route('logout') }}">

            @csrf

            <button type="submit"
                    class="w-full bg-red-500 hover:bg-red-600 text-white py-3 rounded-xl transition font-medium">

                ↩ Logout

            </button>

        </form>

        <div class="bg-white/5 rounded-xl py-3 text-center">

            <p class="text-xs text-blue-100">
                EduInsight v1.0
            </p>

        </div>

    </div>

</aside>