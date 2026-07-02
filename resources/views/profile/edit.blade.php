@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto space-y-6">

{{-- Header --}}
<div class="bg-white rounded-2xl shadow-lg overflow-hidden">

    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-6">

        <div class="flex items-center gap-4">

            <div class="w-16 h-16 rounded-full bg-white/20 flex items-center justify-center text-3xl">

                👤

            </div>

            <div>

                <h2 class="text-3xl font-bold text-white">
                    Profil Pengguna
                </h2>

                <p class="text-blue-100 mt-1">
                    Kelola informasi akun dan keamanan akun Anda.
                </p>

            </div>

        </div>

    </div>

</div>

{{-- Informasi Profil --}}
<div class="bg-white rounded-2xl shadow-lg overflow-hidden">

    <div class="bg-gradient-to-r from-cyan-500 to-blue-600 p-4">

        <h3 class="text-lg font-bold text-white">
            👨‍💼 Informasi Profil
        </h3>

    </div>

    <div class="p-6">

        @include('profile.partials.update-profile-information-form')

    </div>

</div>

{{-- Password --}}
<div class="bg-white rounded-2xl shadow-lg overflow-hidden">

    <div class="bg-gradient-to-r from-indigo-500 to-purple-600 p-4">

        <h3 class="text-lg font-bold text-white">
            🔒 Keamanan Akun
        </h3>

    </div>

    <div class="p-6">

        @include('profile.partials.update-password-form')

    </div>

</div>

{{-- Hapus Akun --}}
<div class="bg-white rounded-2xl shadow-lg overflow-hidden">

    <div class="bg-gradient-to-r from-red-500 to-pink-600 p-4">

        <h3 class="text-lg font-bold text-white">
            ⚠️ Zona Berbahaya
        </h3>

    </div>

    <div class="p-6">

        @include('profile.partials.delete-user-form')

    </div>

</div>

</div>

@endsection
