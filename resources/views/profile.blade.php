<x-layout>
    <section class="bg-gray-50 dark:bg-gray-900 min-h-screen flex items-center justify-center py-8 px-4">
        <div class="w-full max-w-4xl bg-white rounded-xl shadow-lg dark:bg-gray-800 p-8">
            <!-- Title -->
            <h1 class="text-3xl font-semibold mb-6 text-gray-900 dark:text-white text-center">Profil Saya</h1>

            <!-- Tombol Kembali -->
            <a href="{{ url("/dashboard") }}" class="inline-flex items-center mb-6 px-4 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-5 h-5 mr-2" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 19l-7-7 7-7"></path>
                </svg>
                Kembali
            </a>

            <!-- Informasi Profil -->
            <div class="mb-8 space-y-6">
                <h2 class="text-xl font-semibold text-gray-700 dark:text-gray-300 mb-4">Informasi Akun</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Kolom Kiri -->
                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                        <p class="text-sm font-medium text-gray-900 dark:text-white"><strong>NIM/NIP:</strong> {{ auth()->user()->nim_nip }}</p>
                        <p class="text-sm font-medium text-gray-900 dark:text-white"><strong>Nama:</strong> {{ auth()->user()->nama }}</p>
                        <p class="text-sm font-medium text-gray-900 dark:text-white"><strong>Nomor Telepon:</strong> {{ auth()->user()->no_hp ?? '-' }}</p>
                    </div>
                    <!-- Kolom Kanan -->
                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                        <p class="text-sm font-medium text-gray-900 dark:text-white"><strong>Angkatan:</strong> {{ auth()->user()->angkatan_asisten }}</p>
                        <p class="text-sm font-medium text-gray-900 dark:text-white"><strong>Jabatan:</strong> {{ ucwords(str_replace('_', ' ', auth()->user()->jabatan_lab)) }}</p>
                    </div>
                </div>
            </div>

            <!-- Form Update Profil -->
            <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                    <input id="nama" name="nama" type="text" value="{{ old('nama', auth()->user()->nama) }}"
                        class="bg-gray-50 border border-gray-300 rounded-lg p-3 w-full focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                    @error('nama')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Baru</label>
                    <input id="password" name="password" type="password" placeholder="Kosongkan jika tidak ganti"
                        class="bg-gray-50 border border-gray-300 rounded-lg p-3 w-full focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    @error('password')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Password Baru</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Konfirmasi password baru"
                        class="bg-gray-50 border border-gray-300 rounded-lg p-3 w-full focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>

                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg text-sm px-6 py-3 text-center focus:ring-4 focus:outline-none focus:ring-indigo-300 dark:focus:ring-indigo-800 transition duration-200">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </section>
</x-layout>
