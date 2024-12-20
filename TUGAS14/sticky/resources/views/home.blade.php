<x-app-layout>
    @slot('title', 'Home')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <x-container>
        <!-- Bagian Gambar dan Selamat Datang -->
        <div class="bg-stone-100 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-center">
                <!-- Menampilkan Gambar dari Web -->
                <img src="https://th.bing.com/th/id/OIP.PgyzA2cWnW5Td6is2XcriwAAAA?w=323&h=187&c=7&r=0&o=5&pid=1.7" alt="Selamat Datang" class="mx-auto rounded-lg mb-4">

                <!-- Menampilkan Teks Selamat Datang -->
                <h3 class="text-2xl font-semibold text-gray-800">
                    Selamat Datang di Situs Kami!
                </h3>
                <p class="mt-4 text-lg text-gray-600">
                    Kami senang Anda bergabung. Semoga pengalaman Anda menyenangkan!
                </p>
            </div>
        </div>
    </x-container>
</x-app-layout>
