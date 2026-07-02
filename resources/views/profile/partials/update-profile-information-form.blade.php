<section>

<div class="mb-6">

    <h2 class="text-xl font-bold">
        Informasi Profil
    </h2>

    <p class="text-gray-500 mt-1">
        Perbarui nama dan email akun Anda.
    </p>

</div>

<form id="send-verification" method="POST" action="{{ route('verification.send') }}">
    @csrf
</form>

<form method="POST" action="{{ route('profile.update') }}" class="space-y-5">

    @csrf
    @method('PATCH')

    <div>

        <label class="block text-sm font-medium mb-2">
            Nama Lengkap
        </label>

        <input
            type="text"
            name="name"
            value="{{ old('name', $user->name) }}"
            class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
            required>

        @error('name')
            <p class="text-red-500 text-sm mt-2">
                {{ $message }}
            </p>
        @enderror

    </div>

    <div>

        <label class="block text-sm font-medium mb-2">
            Email
        </label>

        <input
            type="email"
            name="email"
            value="{{ old('email', $user->email) }}"
            class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
            required>

        @error('email')
            <p class="text-red-500 text-sm mt-2">
                {{ $message }}
            </p>
        @enderror

    </div>

    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())

        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">

            <p class="text-sm text-yellow-700">

                Email Anda belum terverifikasi.

                <button
                    form="send-verification"
                    class="font-semibold underline ml-1">

                    Kirim Ulang Verifikasi

                </button>

            </p>

        </div>

    @endif

    <div class="flex items-center gap-4">

        <button
            type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition">

            Simpan Perubahan

        </button>

        @if (session('status') === 'profile-updated')

            <span class="text-green-600 font-medium">
                Berhasil disimpan
            </span>

        @endif

    </div>

</form>

</section>
