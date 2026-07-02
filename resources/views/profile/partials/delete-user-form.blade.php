<section>

<div class="mb-6">

    <h2 class="text-xl font-bold text-red-600">
        Hapus Akun
    </h2>

    <p class="text-gray-500 mt-1">
        Menghapus akun akan menghilangkan seluruh data secara permanen dan tidak dapat dipulihkan kembali.
    </p>

</div>

<div class="bg-red-50 border border-red-200 rounded-xl p-5">

    <h3 class="font-semibold text-red-700 mb-2">
        Peringatan
    </h3>

    <p class="text-red-600 text-sm mb-4">
        Semua data observasi, evaluasi, laporan, dan informasi akun akan dihapus permanen.
    </p>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-lg transition">

        Hapus Akun

    </button>

</div>

<x-modal
    name="confirm-user-deletion"
    :show="$errors->userDeletion->isNotEmpty()"
    focusable>

    <form method="POST"
          action="{{ route('profile.destroy') }}"
          class="p-6">

        @csrf
        @method('DELETE')

        <h2 class="text-xl font-bold mb-2">
            Konfirmasi Hapus Akun
        </h2>

        <p class="text-gray-600 mb-4">
            Masukkan password Anda untuk mengonfirmasi penghapusan akun.
        </p>

        <input
            type="password"
            name="password"
            placeholder="Masukkan password"
            class="w-full border border-gray-300 rounded-lg p-3">

        @error('password', 'userDeletion')
            <p class="text-red-500 text-sm mt-2">
                {{ $message }}
            </p>
        @enderror

        <div class="flex justify-end gap-3 mt-6">

            <button
                type="button"
                x-on:click="$dispatch('close')"
                class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100">

                Batal

            </button>

            <button
                type="submit"
                class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg">

                Hapus Permanen

            </button>

        </div>

    </form>

</x-modal>

</section>
