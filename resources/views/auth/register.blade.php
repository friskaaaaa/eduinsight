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

            Bergabung dan mulai mengelola observasi
            serta evaluasi pembelajaran secara digital.

        </div>

    </div>

    {{-- KANAN --}}
    <div class="p-10 flex flex-col justify-center">

        <div class="text-center mb-8">

            <div class="text-5xl mb-3">
                📝
            </div>

            <h2 class="text-3xl font-bold text-gray-800">
                Register
            </h2>

            <p class="text-gray-500 mt-2">
                Buat akun EduInsight
            </p>

        </div>

        <form method="POST" action="{{ route('register') }}">

            @csrf

            <div class="mb-4">

                <label class="block mb-2 font-medium text-gray-700">
                    Nama Lengkap
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500">

            </div>

            <div class="mb-4">

                <label class="block mb-2 font-medium text-gray-700">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500">

            </div>

            <div class="mb-4">

                <label class="block mb-2 font-medium text-gray-700">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    required
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500">

            </div>

            <div class="mb-6">

                <label class="block mb-2 font-medium text-gray-700">
                    Konfirmasi Password
                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    required
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500">

            </div>

            <div class="flex items-center justify-between mb-6">

                <a href="{{ route('login') }}"
                   class="text-indigo-600 hover:text-indigo-800">

                    Sudah punya akun?

                </a>

            </div>

            <button
                type="submit"
                class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 rounded-xl font-semibold hover:opacity-90 transition">

                Register

            </button>

        </form>

    </div>

</div>

</div>

</x-guest-layout>
