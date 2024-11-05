@extends('layouts.master')
@section('content')
<body class="font-poppins text-blue-900 bg-gray-100">
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none">
        <div class="absolute top-0 left-0 w-96 h-96 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute top-1/4 right-0 w-96 h-96 bg-yellow-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 left-1/4 w-96 h-96 bg-pink-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 -translate-y-1/2"></div>
    </div>
    <x-nav/>

    <header class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24">
        <div class="text-center">
            <h1 class="text-4xl tracking-tight font-extrabold text-blue-900 sm:text-5xl md:text-6xl">
                Hasil Pencarian untuk: <span class="text-blue-600">{{ucfirst($keyword)}}</span>
            </h1>
            <div class="mt-8 sm:mt-12">
                <form method="GET" action="{{route('front.search')}}" class="sm:max-w-xl sm:mx-auto">
                    @csrf
                    <div class="sm:flex">
                        <div class="min-w-0 flex-1">
                            <label for="keyword" class="sr-only">Cari pekerjaan</label>
                            <input id="keyword" name="keyword" type="text" value="{{ $keyword }}" placeholder="Cari cepat pekerjaan impian Anda..." class="block w-full px-4 py-3 rounded-md border border-gray-300 text-base leading-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div class="mt-3 sm:mt-0 sm:ml-3">
                            <button type="submit" class="block w-full py-3 px-4 rounded-md shadow bg-blue-600 text-white font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 focus:ring-offset-gray-100">
                                Jelajahi Sekarang
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </header>

    <section id="Result" class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-16">
        <h2 class="text-3xl font-extrabold text-blue-900 mb-8">Ditemukan {{$jobs->count()}} Pekerjaan</h2>
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($jobs as $job)
            <div class="flex flex-col rounded-3xl shadow-lg overflow-hidden bg-white hover:shadow-2xl transition-all duration-300">
                <div class="flex-shrink-0 p-6">
                    <img class="h-12 w-12 object-contain" src="{{Storage::url($job->company->logo)}}" alt="{{$job->company->name}}">
                </div>
                <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-blue-600">
                            {{$job->company->name}}
                        </p>
                        <a href="{{route('front.details', $job->slug)}}" class="block mt-2">
                            <p class="text-xl font-semibold text-blue-900">{{$job->name}}</p>
                            <p class="mt-3 text-base text-gray-500">{{Str::limit($job->description, 100)}}</p>
                        </a>
                    </div>
                    <div class="job-info flex flex-col gap-[14px]">
                        <div class="flex items-center gap-[6px]">
                            <div class="flex shrink-0 w-6 h-6">
                                <img src="{{asset('assets/icons/note-favorite-orange.svg')}}" alt="ikon">
                            </div>
                            <p class="font-medium">{{$job->type}}</p>
                        </div>
                        <div class="flex items-center gap-[6px]">
                            <div class="flex shrink-0 w-6 h-6">
                                <img src="{{asset('assets/icons/moneys-cyan.svg')}}" alt="ikon">
                            </div>
                            <p class="font-medium">Terjamin</p>
                        </div>
                        <div class="flex items-center gap-[6px]">
                            <div class="flex shrink-0 w-6 h-6">
                                <img src="{{asset('assets/icons/location-purple.svg')}}" alt="ikon">
                            </div>
                            <p class="font-medium">{{$job->location}}</p>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center">
                        <div class="flex-shrink-0">
                            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium {{ $job->type == 'Full-Time' ? 'bg-blue-100 text-blue-800' : ($job->type == 'Part-Time' ? 'bg-green-100 text-green-800' : 'bg-orange-100 text-orange-800') }}">
                                {{$job->type}}
                            </span>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">
                                Rp {{ number_format($job->salary, 0, ',', '.') }}/bulan
                            </p>
                            <p class="text-sm text-gray-500">
                                {{$job->location}}
                            </p>
                        </div>
                    </div>
                    <div class="mt-6">
                        <a href="{{route('front.details', $job->slug)}}" class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-blue-900 text-lg col-span-3 text-center">Tidak ada pekerjaan ditemukan</p>
            @endforelse
        </div>

        <div id="Pagination" class="mt-12">
            {{ $jobs->links() }}
        </div>
    </section>
</body>
@endsection
