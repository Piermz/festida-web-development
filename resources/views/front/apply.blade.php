@extends('layouts.master')
@section('content')
<body class="font-poppins text-gray-800 pb-[100px] overflow-x-hidden ">
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none">
        <div class="absolute top-0 left-0 w-96 h-96 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute top-1/4 right-0 w-96 h-96 bg-yellow-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 left-1/4 w-96 h-96 bg-pink-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 -translate-y-1/2"></div>
    </div>
    <x-nav/>
    <div class="max-w-4xl mx-auto mt-24 bg-white shadow-xl rounded-2xl overflow-hidden">
        <div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-12 px-10 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
            <div class="absolute -bottom-8 -left-8 w-64 h-64 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
            <div class="relative z-10">
                <h1 class="text-4xl font-bold leading-tight mb-2">{{$companyJob->name}}</h1>
                <p class="text-blue-100 text-lg flex items-center">
                    <span class="mr-2">{{$companyJob->category->name}}</span>
                    <span class="w-1.5 h-1.5 bg-blue-100 rounded-full mx-2"></span>
                    <span>Diposting pada {{$companyJob->company->created_at->format('d M Y')}}</span>
                    <img src="{{Storage::url($companyJob->company->logo)}}" class="object-contain w-12 h-12 ml-auto" alt="logo">
                </p>
            </div>
        </div>

        <form method="POST" enctype="multipart/form-data" action="{{route('front.apply.store', $companyJob->slug)}}" class="p-10">
            @csrf
            <div class="grid grid-cols-2 gap-6 mb-8">
                <div class="flex items-center gap-3 bg-blue-50 p-4 rounded-lg">
                    <div class="bg-blue-100 p-2 rounded-full">
                        <img src="{{asset('assets/icons/note-favorite-orange.svg')}}" alt="icon" class="w-6 h-6">
                    </div>
                    <div>
                        <p class="text-sm text-blue-600 font-medium">Tipe Pekerjaan</p>
                        <p class="font-semibold">{{$companyJob->type}}</p>
                    </div>
                </div>
                <div class="flex items-center gap-3 bg-blue-50 p-4 rounded-lg">
                    <div class="bg-blue-100 p-2 rounded-full">
                        <img src="{{asset('assets/icons/personalcard-yellow.svg')}}" alt="icon" class="w-6 h-6">
                    </div>
                    <div>
                        <p class="text-sm text-blue-600 font-medium">Tingkat Keahlian</p>
                        <p class="font-semibold">{{$companyJob->skill_level}}</p>
                    </div>
                </div>
                <div class="flex items-center gap-3 bg-blue-50 p-4 rounded-lg">
                    <div class="bg-blue-100 p-2 rounded-full">
                        <img src="{{asset('assets/icons/moneys-cyan.svg')}}" alt="icon" class="w-6 h-6">
                    </div>
                    <div>
                        <p class="text-sm text-blue-600 font-medium">Gaji</p>
                        <p class="font-semibold">Rp {{ number_format($companyJob->salary, 0, ',', '.') }}/bulan</p>
                    </div>
                </div>
                <div class="flex items-center gap-3 bg-blue-50 p-4 rounded-lg">
                    <div class="bg-blue-100 p-2 rounded-full">
                        <img src="{{asset('assets/icons/location-purple.svg')}}" alt="icon" class="w-6 h-6">
                    </div>
                    <div>
                        <p class="text-sm text-blue-600 font-medium">Lokasi</p>
                        <p class="font-semibold">{{$companyJob->location}}</p>
                    </div>
                </div>
            </div>

            @if($errors->any())
                <div class="bg-red-100 text-red-600 p-4 rounded-lg mb-6">
                    @foreach ($errors->all() as $error)
                        <p class="mb-1">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <div class="mb-6">
                <label for="coverLetter" class="block text-sm font-medium text-gray-700 mb-2">Surat Lamaran</label>
                <textarea name="massage" id="coverLetter" rows="6" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out" placeholder="Ceritakan keterampilan dan pengalaman hebat Anda" required></textarea>
            </div>

            <div class="mb-6">
                <label for="fileInput" class="block text-sm font-medium text-gray-700 mb-2">Unggah CV</label>
                <div class="relative">
                    <input type="file" name="resume" id="fileInput" class="hidden" accept=".pdf" required>
                    <label for="fileInput" class="cursor-pointer flex items-center justify-center w-full p-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition duration-150 ease-in-out">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        <span id="fileLabel">Pilih file PDF</span>
                    </label>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center text-sm text-gray-500">
                    <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    Data Anda aman dan tidak akan dibagikan ke pihak ketiga.
                </div>
                <button type="submit" class="bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                    Kirim Lamaran
                </button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('fileInput').addEventListener('change', function(e) {
            var fileName = e.target.files[0].name;
            document.getElementById('fileLabel').textContent = fileName;
        });
    </script>
</body>
@endsection
