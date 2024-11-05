@extends('layouts.master')

@section('content')

    <body class="font-poppins text-[#0E0140] bg-gradient-to-br from-blue-50 to-indigo-100">
        <main class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8">
            <div class="max-w-5xl w-full bg-white rounded-xl shadow-2xl overflow-hidden">
                <div class="p-8 sm:p-12">

                    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-8 max-w-3xl mx-auto">
                        <!-- Logo -->
                        <a href="{{ route('front.index') }}" class="block text-center">
                            <img src="{{ asset('assets/logos/intern.png') }}" class="h-20 " alt="Logo InternPortal">
                        </a>

                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Kolom Kiri -->
                            <div class="space-y-6">
                                <!-- Unggah Avatar dengan Pratinjau -->

                                <div class="space-y-4">
                                    {{-- <label class="block text-sm font-medium text-gray-700">Unggah Foto Profil</label> --}}
                                    <div class="flex items-center justify-center">
                                        <div class="relative">
                                            <img id="avatar-preview" src="{{ asset('assets/icons/default-avatar.png') }}"
                                                class="w-32 h-32 rounded-full object-cover border-4 border-indigo-200">
                                            <label for="avatarInput"
                                                class="absolute bottom-0 right-0 bg-indigo-600 rounded-full p-2 cursor-pointer hover:bg-indigo-700 transition duration-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                            </label>
                                            <input type="file" id="avatarInput" name="avatar" accept="image/*"
                                                class="hidden" onchange="previewAvatar(event)">
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-500 text-center">SVG, PNG, JPG.(Maks. 800x400px).
                                    </p>
                                </div>
                                <!-- Nama -->
                                <div>
                                    <label for="Name" class="block text-sm font-medium text-gray-700 mb-1">Nama
                                        Lengkap</label>
                                    <input type="text" name="name" id="Name"
                                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
                                        required>
                                </div>

                                <!-- Email -->
                                <div>
                                    <label for="Email" class="block text-sm font-medium text-gray-700 mb-1">Alamat
                                        Email</label>
                                    <input type="email" name="email" id="Email"
                                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
                                        required>
                                </div>

                                        <!-- Pekerjaan dan Pengalaman -->
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <label for="Occupation"
                                                    class="block text-sm font-medium text-gray-700 mb-1">Level Pendidikan</label>
                                                <input type="text" name="occupation" id="Occupation"
                                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
                                                    required>
                                            </div>
                                            <div>
                                                <label for="Experience"
                                                    class="block text-sm font-medium text-gray-700 mb-1">Pengalaman (tahun)</label>
                                                <input type="number" name="experience" id="Experience"
                                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
                                                    required>
                                            </div>
                                        </div>

                            </div>

                            <!-- Kolom Kanan -->
                            <div class="space-y-6">


                                <!-- Kata Sandi -->
                                <div>
                                    <label for="Password" class="block text-sm font-medium text-gray-700 mb-1">Kata
                                        Sandi</label>
                                    <input type="password" name="password" id="Password"
                                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
                                        required>
                                </div>

                                <!-- Konfirmasi Kata Sandi -->
                                <div>
                                    <label for="Confirm-Password"
                                        class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Kata Sandi</label>
                                    <input type="password" name="password_confirmation" id="Confirm-Password"
                                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
                                        required>
                                </div>

                                <!-- Tipe Akun -->
                                <div>
                                    <p class="block text-sm font-medium text-gray-700 mb-2">Tipe Akun</p>
                                    <div class="grid grid-cols-2 gap-4">
                                        <label
                                            class="flex bg-orange-600 text-white font-medium items-center justify-center p-4 border rounded-lg cursor-pointer hover:bg-orange-900 transition duration-300">
                                            <input type="radio" name="account_type" value="employee"
                                                class="mr-2 text-indigo-600 focus:ring-indigo-500">
                                            <span class="text-sm">Calon Magang</span>
                                        </label>
                                        <label
                                            class="flex bg-indigo-600 text-white font-medium items-center justify-center p-4 border rounded-lg cursor-pointer hover:bg-indigo-900 transition duration-300">
                                            <input type="radio" name="account_type" value="employer"
                                                class="mr-2 text-indigo-600 focus:ring-indigo-500">
                                            <span class="text-sm">Penyedia Magang</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Tombol Kirim -->
                                <button type="submit"
                                    class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition duration-300 font-medium">
                                    Buat Akun
                                </button>
                                <!-- Link Masuk -->
                                <p class="mt-8 text-center">
                                    Sudah punya akun?
                                    <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Masuk</a>
                                </p>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </main>
    </body>

    <script>
        function previewAvatar(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('avatar-preview').src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
