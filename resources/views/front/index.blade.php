@extends('layouts.master')

@section('content')
<body class="font-poppins text-gray-800 bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <nav class="bg-white shadow-md fixed w-full z-10">
        <div class="container mx-auto px-6 py-3">
            <div class="flex justify-between items-center">
                <a href="" class="flex items-center space-x-3">
                    <img src="{{ asset('assets/logos/Logo.svg') }}" alt="Portal Magang Logo" class="h-10 w-auto">
                    <span class="font-bold text-xl text-indigo-700">Portal Magang</span>
                </a>
                <div class="hidden md:flex space-x-8">
                    <a href="#" class="text-gray-600 hover:text-indigo-700 transition duration-300">Home</a>
                    <a href="#" class="text-gray-600 hover:text-indigo-700 transition duration-300">Internships</a>
                    <a href="#" class="text-gray-600 hover:text-indigo-700 transition duration-300">Companies</a>
                    <a href="#" class="text-gray-600 hover:text-indigo-700 transition duration-300">About</a>
                </div>
                <div class="flex items-center space-x-4">
                    @guest
                        <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-800 transition duration-300">Sign In</a>
                        <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-6 py-2 rounded-full hover:bg-indigo-700 transition duration-300 shadow-md hover:shadow-lg">Sign Up</a>
                    @endguest
                    @auth
                        <span class="text-gray-600">Welcome, {{ Auth::user()->name }}</span>
                        <a href="{{ route('dashboard') }}" class="bg-indigo-600 text-white px-6 py-2 rounded-full hover:bg-indigo-700 transition duration-300 shadow-md hover:shadow-lg">Dashboard</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <header class="pt-32 pb-20 px-6">
        <div class="container mx-auto text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold text-indigo-900 mb-6 leading-tight">Discover Your Perfect <span class="text-indigo-600">Internship</span></h1>
            <p class="text-xl text-gray-600 mb-10 max-w-2xl mx-auto">Unlock your potential and kickstart your career with exciting opportunities tailored just for you.</p>
            <form action="#" class="max-w-3xl mx-auto flex flex-col md:flex-row gap-4">
                <input type="text" placeholder="Search for internships..." class="flex-grow px-6 py-4 rounded-full border-2 border-indigo-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-lg">
                <button type="submit" class="bg-indigo-600 text-white px-10 py-4 rounded-full hover:bg-indigo-700 transition duration-300 shadow-lg hover:shadow-xl text-lg font-semibold">Find Opportunities</button>
            </form>
        </div>
    </header>

    <section id="Categories" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-indigo-900 mb-12 text-center">Explore Internship Categories</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse ($catregories as $category)
                    <a href="{{ route('front.category', $category->slug) }}" class="bg-gray-50 rounded-xl shadow-md p-6 hover:shadow-xl transition-all duration-300 group transform hover:-translate-y-1">
                        <div class="flex flex-col items-center text-center">
                            <div class="bg-indigo-100 rounded-full p-4 mb-4 group-hover:bg-indigo-200 transition duration-300">
                                <svg class="w-12 h-12 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2 group-hover:text-indigo-600 transition duration-300">{{ $category->name }}</h3>
                            <p class="text-gray-600">{{ $category->jobs->count() }} opportunities</p>
                        </div>
                    </a>
                @empty
                    <p class="text-gray-600 col-span-4 text-center text-lg">No categories found at the moment.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section id="Featured" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-indigo-900 mb-12 text-center">Featured Internship Opportunities</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($jobs as $job)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <img src="{{ Storage::url($job->company->logo) }}" alt="{{ $job->company->name }} logo" class="w-14 h-14 object-cover rounded-full mr-4">
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-800">{{ $job->name }}</h3>
                                    <p class="text-indigo-600">{{ $job->company->name }}</p>
                                </div>
                            </div>
                            <p class="text-gray-600 mb-4">{{ Str::limit($job->about, 100) }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500">Posted {{ $job->created_at->diffForHumans() }}</span>
                                <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium">View Details &rarr;</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-600 col-span-3 text-center text-lg">No internship opportunities available at the moment.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section id="cta" class="bg-indigo-700 text-white py-20">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-4">Ready to Start Your Journey?</h2>
            <p class="text-xl mb-8">Join thousands of students who have found their dream internships through our platform.</p>
            <a href="{{ route('register') }}" class="bg-white text-indigo-700 px-8 py-3 rounded-full text-lg font-semibold hover:bg-indigo-100 transition duration-300 shadow-lg hover:shadow-xl">Get Started Today</a>
        </div>
    </section>
</body>
@endsection

@push('after-scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true,
    });
</script>
@endpush

@push('after-styles')
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
@endpush
