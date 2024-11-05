@extends('layouts.master')

@section('content')
<body class="font-poppins text-blue-900 bg-gray-100">
    <x-nav/>

    <header class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24">
        <div class="lg:grid lg:grid-cols-12 lg:gap-8">
            <div class="sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left">
                <div class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mb-6">
                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zm7-10a1 1 0 01.707.293l.707.707L15 4.414A2 2 0 0116.414 3L14 .586A2 2 0 0112.586 2l-.707-.707A1 1 0 0113 1z" clip-rule="evenodd" />
                    </svg>
                    Platform Magang Terpercaya
                </div>
                <h1 class="mt-4 text-4xl tracking-tight font-extrabold text-blue-900 sm:mt-5 sm:text-6xl lg:mt-6 xl:text-6xl">
                    <span class="block">Temukan magang</span>
                    <span class="block text-blue-600">Yang membuka peluang</span>
                </h1>
                <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-xl lg:text-lg xl:text-xl">
                    Temukan program magang yang sesuai dengan minat dan jurusan Anda untuk memulai karir profesional
                </p>
                <div class="mt-8 sm:mt-12">
                    <form action="{{ route('front.search') }}" method="GET" class="sm:max-w-xl sm:mx-auto lg:mx-0">
                        @csrf
                        <div class="sm:flex">
                            <div class="min-w-0 flex-1">
                                <label for="keyword" class="sr-only">Cari magang</label>
                                <input id="keyword" name="keyword" type="text" placeholder="Cari program magang sesuai bidangmu..." class="block w-full px-4 py-3 rounded-md border border-gray-300 text-base leading-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div class="mt-3 sm:mt-0 sm:ml-3">
                                <button type="submit" class="block w-full py-3 px-4 rounded-md shadow bg-blue-600 text-white font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 focus:ring-offset-gray-100">
                                    Cari Magang
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-12 relative sm:mx-auto lg:mt-0 lg:mx-0 lg:col-span-6 lg:flex lg:items-center">
                <img class="w-full h-full object-contain" src="{{ asset('assets/backgrounds/work.png') }}" alt="Hero Illustration">
            </div>
        </div>
    </header>

    <section id="Categories" class="bg-gradient-to-br from-blue-900 to-indigo-800 py-16 sm:py-24">
        <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                    Jelajahi Kategori Pekerjaan
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-blue-200 sm:mt-4">
                    Temukan peluang karir di berbagai industri
                </p>
            </div>
            <div class="mt-10 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @forelse ($catregories as $category)
                    <div class="bg-white rounded-[30px] shadow-xl overflow-hidden transform transition duration-300">
                        <div class="p-8 bg-gradient-to-r from-blue-100 to-indigo-100">
                            <img class="h-24 w-24 mx-auto object-contain" src="{{ Storage::url($category->icon) }}" alt="{{ $category->name }}">
                            <h3 class="mt-6 text-2xl font-bold text-center text-indigo-900">{{ $category->name }}</h3>
                        </div>
                        <div class="p-6">
                            <p class="text-lg text-gray-600 text-center mb-4">{{ $category->jobs->count() }} pekerjaan tersedia</p>
                            <a href="{{ route('front.category', $category->slug) }}" class="block text-center mt-4 text-indigo-600 hover:text-indigo-500 text-lg font-semibold">
                                Lihat semua pekerjaan
                                <svg class="inline-block ml-2 w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-white text-center col-span-full text-xl">Belum ada kategori yang tersedia saat ini.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section id="Latest" class="py-16 sm:py-24">
        <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-blue-900 sm:text-4xl mb-8">
                Latest Jobs
            </h2>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @forelse($jobs as $job)
                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                        <div class="flex-shrink-0">
                            <img class="h-48 w-full object-cover" src="{{ Storage::url($job->company->logo) }}" alt="{{ $job->company->name }}">
                        </div>
                        <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-blue-600">
                                    {{ $job->company->name }}
                                </p>
                                <a href="{{ route('front.details', $job->slug) }}" class="block mt-2">
                                    <p class="text-xl font-semibold text-blue-900">{{ $job->name }}</p>
                                    <p class="mt-3 text-base text-gray-500">{{ Str::limit($job->description, 100) }}</p>
                                </a>
                            </div>
                            <div class="mt-6 flex items-center">
                                <div class="flex-shrink-0">
                                    <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                        {{ $job->type }}
                                    </span>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">
                                        Rp {{ number_format($job->salary, 0, ',', '.') }}/month
                                    </p>
                                    <p class="text-sm text-gray-500">
                                        {{ $job->location }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-center col-span-full">No new job listings available at the moment.</p>
                @endforelse
            </div>
        </div>
    </section>
</body>
@endsection

@push('after-styles')
<style>
    /* Add any custom styles here */
</style>
@endpush

@push('after-scripts')
<script>
    // Add any custom scripts here
</script>
@endpush
