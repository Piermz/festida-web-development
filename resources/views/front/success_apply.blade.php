@extends('layouts.master')

@section('content')
<body class="font-poppins text-[#0E0140] pb-[100px] overflow-x-hidden  min-h-screen flex flex-col">
    <x-nav/>
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none">
        <div class="absolute top-0 left-0 w-96 h-96 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute top-1/4 right-0 w-96 h-96 bg-yellow-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 left-1/4 w-96 h-96 bg-pink-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 -translate-y-1/2"></div>
    </div>
    <div class="flex-1 flex items-center justify-center px-4">
        <div class="flex flex-col items-center justify-center gap-8">
            <div class="w-48 h-48 rounded-full bg-blue-600 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <div class="text-center">
                <h2 class="text-3xl font-bold text-[#0E0140] mb-4">Kerja Bagus!</h2>
                <p class="text-lg text-gray-600 mb-8">Kami telah menerima lamaran Anda dan rekruter akan meninjau dalam beberapa hari kerja.</p>
            </div>
            <a href="{{ route('front.index') }}" class="w-full rounded-full py-4 px-6 bg-blue-600 font-semibold text-white text-center text-lg hover:shadow-lg transition-all duration-300">
                Jelajahi Pekerjaan Lain
            </a>
        </div>
    </div></body>
@endsection
