<x-guest-layout>

<div class="min-h-screen flex items-center justify-center px-6 py-10">

<div class="w-full max-w-5xl grid md:grid-cols-2 bg-white rounded-3xl overflow-hidden shadow-2xl border border-gray-200">

    {{-- KIRI --}}
    <div class="hidden md:flex flex-col justify-center p-12 bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-700 text-white">

        <h1 class="text-5xl font-extrabold mb-4">
            🎓 EduInsight
        </h1>

        <p class="text-2xl font-semibold mb-8">
            Sistem Observasi dan Evaluasi Pembelajaran Guru
        </p>

        <div class="mt-5 text-indigo-100">

            Membantu sekolah melakukan observasi,
            evaluasi pembelajaran, dan pengelolaan
            laporan secara digital.

        </div>

    </div>

    {{-- KANAN --}}
    <div class="p-10 flex flex-col justify-center">

        <div class="text-center mb-8">

            <div class="text-5xl mb-3">
                🎓
            </div>

            <h2 class="text-3xl font-bold text-gray-800">
                Login
            </h2>

            <p class="text-gray-500 mt-2">
                Masuk ke akun EduInsight
            </p>

        </div>

        <form method="POST" action="{{ route('login') }}">

            @csrf

            <div class="mb-5">

                <label class="block mb-2 font-medium text-gray-700">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">

            </div>

            <div class="mb-5">

                <label class="block mb-2 font-medium text-gray-700">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    required
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">

            </div>

            <div class="flex items-center justify-between mb-6">

                <label class="flex items-center gap-2 text-sm text-gray-600">

                    <input type="checkbox" name="remember">

                    Remember me

                </label>

                @if (Route::has('password.request'))

                    <a href="{{ route('password.request') }}"
                       class="text-indigo-600 text-sm hover:text-indigo-800">

                        Lupa Password?

                    </a>

                @endif

            </div>

            <button
                type="submit"
                class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 rounded-xl font-semibold hover:opacity-90 transition">

                Login

            </button>

        </form>

    </div>

</div>

</div>

</x-guest-layout>
