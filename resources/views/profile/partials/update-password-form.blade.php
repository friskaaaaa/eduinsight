<section>

<div class="mb-6">

    <h2 class="text-xl font-bold">
        Ubah Password
    </h2>

    <p class="text-gray-500 mt-1">
        Gunakan password yang kuat untuk menjaga keamanan akun.
    </p>

</div>

<form method="POST" action="{{ route('password.update') }}" class="space-y-5">

    @csrf
    @method('PUT')

    <div>

        <label class="block text-sm font-medium mb-2">
            Password Saat Ini
        </label>

        <input
            type="password"
            name="current_password"
            class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">

        @error('current_password', 'updatePassword')
            <p class="text-red-500 text-sm mt-2">
                {{ $message }}
            </p>
        @enderror

    </div>

    <div>

        <label class="block text-sm font-medium mb-2">
            Password Baru
        </label>

        <input
            type="password"
            name="password"
            class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">

        @error('password', 'updatePassword')
            <p class="text-red-500 text-sm mt-2">
                {{ $message }}
            </p>
        @enderror

    </div>

    <div>

        <label class="block text-sm font-medium mb-2">
            Konfirmasi Password Baru
        </label>

        <input
            type="password"
            name="password_confirmation"
            class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">

    </div>

    <div class="flex items-center gap-4">

        <button
            type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition">

            Simpan Password

        </button>

        @if (session('status') === 'password-updated')

            <span class="text-green-600 font-medium">
                Password berhasil diperbarui
            </span>

        @endif

    </div>

</form>

</section>
