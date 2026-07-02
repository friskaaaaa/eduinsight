<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduInsight</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-700">

<div class="min-h-screen flex items-center justify-center px-6">

    <div class="max-w-6xl w-full grid md:grid-cols-2 gap-10 items-center">

        {{-- Kiri --}}
        <div class="text-white">

            <h1 class="text-6xl font-extrabold mb-4">
                🎓 EduInsight
            </h1>

            <p class="text-2xl font-semibold mb-6">
                Sistem Observasi dan Evaluasi Pembelajaran Guru
            </p>

            <p class="text-lg text-blue-100 leading-relaxed">
                Platform digital untuk membantu sekolah dalam
                melakukan observasi kelas, evaluasi pembelajaran,
                pengelolaan laporan, dan monitoring kinerja guru
                secara efektif dan terintegrasi.
            </p>

        </div>

        {{-- Kanan --}}
        <div class="bg-white rounded-3xl shadow-2xl p-10">

            <h2 class="text-3xl font-bold text-center mb-8">
                Selamat Datang
            </h2>

            <div class="space-y-4">

                <a href="{{ route('login') }}"
                   class="block w-full text-center bg-indigo-600 hover:bg-indigo-700 text-white py-4 rounded-xl font-semibold transition">

                    Login

                </a>

                @if (Route::has('register'))

                <a href="{{ route('register') }}"
                   class="block w-full text-center border-2 border-indigo-600 text-indigo-600 hover:bg-indigo-50 py-4 rounded-xl font-semibold transition">

                    Register

                </a>

                @endif

            </div>

            <div class="mt-10 grid grid-cols-3 gap-4 text-center">


            </div>

        </div>

    </div>

</div>

</body>
</html>