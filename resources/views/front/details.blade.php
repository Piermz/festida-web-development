@extends('layouts.master')
@section('content')
<body class="font-poppins text-blue-900 bg-gray-100">
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none">
        <div class="absolute top-0 left-0 w-96 h-96 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute top-1/4 right-0 w-96 h-96 bg-yellow-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 left-1/4 w-96 h-96 bg-pink-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 -translate-y-1/2"></div>
    </div>
    <x-nav/>

    <article class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="bg-white shadow-lg rounded-3xl overflow-hidden">
            <div class="relative">
                <img src="{{Storage::url($companyJob->thumbnail)}}" class="w-full h-80 object-cover" alt="gambar sampul">
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-8">
                    <h1 class="text-4xl font-bold text-white">{{$companyJob->name}}</h1>
                    <p class="text-white mt-3 text-lg">{{$companyJob->category->name}} • Diposting pada {{$companyJob->company->created_at->format('d M Y')}}</p>
                </div>
                <div class="absolute top-8 right-8">
                    @if($companyJob->is_open)
                    <span class="bg-green-500 text-white px-6 py-3 rounded-full font-semibold text-lg">SEDANG MEREKRUT!</span>
                    @else
                    <span class="bg-red-500 text-white px-6 py-3 rounded-full font-semibold text-lg">DITUTUP</span>
                    @endif
                </div>
            </div>

            <div class="p-6 space-y-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div class="flex flex-col items-center p-4 bg-blue-50 rounded-lg">
                        <img src="{{asset('assets/icons/note-favorite-orange.svg')}}" alt="Jenis Pekerjaan" class="w-10 h-10 mb-2">
                        <span class="text-sm font-medium text-gray-600">Jenis Pekerjaan</span>
                        <span class="text-lg font-semibold text-blue-800">{{$companyJob->type}}</span>
                    </div>
                    <div class="flex flex-col items-center p-4 bg-yellow-50 rounded-lg">
                        <img src="{{asset('assets/icons/personalcard-yellow.svg')}}" alt="Pengalaman" class="w-10 h-10 mb-2">
                        <span class="text-sm font-medium text-gray-600">Pengalaman</span>
                        <span class="text-lg font-semibold text-yellow-800">{{$companyJob->skill_level}}</span>
                    </div>
                    <div class="flex flex-col items-center p-4 bg-cyan-50 rounded-lg">
                        <img src="{{asset('assets/icons/moneys-cyan.svg')}}" alt="Gaji" class="w-10 h-10 mb-2">
                        <span class="text-sm font-medium text-gray-600">Gaji</span>
                        <span class="text-lg font-semibold text-cyan-800">Rp {{ number_format($companyJob->salary, 0, ',', '.') }}/bulan</span>
                    </div>
                    <div class="flex flex-col items-center p-4 bg-purple-50 rounded-lg">
                        <img src="{{asset('assets/icons/location-purple.svg')}}" alt="Lokasi" class="w-10 h-10 mb-2">
                        <span class="text-sm font-medium text-gray-600">Lokasi</span>
                        <span class="text-lg font-semibold text-purple-800">{{$companyJob->location}}</span>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-semibold mb-4">Ringkasan</h2>
                    <p class="text-gray-700">{{$companyJob->about}}</p>
                </div>

                <div>
                    <h2 class="text-2xl font-semibold mb-4">Tanggung Jawab</h2>
                    <ul class="list-disc pl-5 space-y-2">
                        @foreach ($companyJob->responsibilities as $responsibility)
                        <li>{{$responsibility->name}}</li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h2 class="text-2xl font-semibold mb-4">Kualifikasi</h2>
                    <ul class="list-disc pl-5 space-y-2">
                        @foreach ($companyJob->Qualifications as $Qualification)
                        <li>{{$Qualification->name}}</li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h2 class="text-2xl font-semibold mb-4">Perusahaan</h2>
                    <div class="flex items-center gap-4 mb-4">
                        <img src="{{Storage::url($companyJob->company->logo)}}" class="w-16 h-16 object-contain" alt="logo perusahaan">
                        <div>
                            <h3 class="text-xl font-semibold">{{$companyJob->company->name}}</h3>
                            <p class="text-gray-600">{{$companyJob->company->jobs->count()}} Pekerjaan</p>
                        </div>
                    </div>
                    <p class="text-gray-700">{{$companyJob->company->about}}</p>
                </div>

                <div class="flex items-center justify-between border-t pt-6">
                    <div class="flex items-center gap-2">
                        <img src="{{asset('assets/icons/security-user.svg')}}" alt="ikon" class="w-6 h-6">
                        <span class="text-sm text-gray-600">Kami menggunakan InternID untuk mengamankan data Anda 100%</span>
                    </div>
                    <div class="space-x-4">
                        <a href="#" class="px-6 py-2 border border-blue-600 text-blue-600 rounded-full hover:bg-blue-50 transition-colors">Simpan</a>
                        <a href="{{route('front.apply', $companyJob->slug)}}" class="px-6 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-colors">Lamar Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </article>

    <section class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-16">
        <h2 class="text-3xl font-bold mb-8">Pekerjaan Lain yang Mungkin Anda Minati</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($jobs as $job)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <img src="{{Storage::url($job->company->logo)}}" class="w-12 h-12 object-contain mr-4" alt="logo perusahaan">
                        <div>
                            <h3 class="font-semibold text-lg">{{$job->company->name}}</h3>
                            <p class="text-gray-600 text-sm">{{$job->location}}</p>
                        </div>
                    </div>
                    <h4 class="text-xl font-bold mb-2">{{$job->name}}</h4>
                    <p class="text-gray-600 mb-4">{{Str::limit($job->description, 100)}}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-blue-600 font-semibold">Rp {{ number_format($job->salary, 0, ',', '.') }}/bulan</span>
                        <a href="{{route('front.details', $job->slug)}}" class="px-4 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-colors">Lihat Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</body>
@endsection
