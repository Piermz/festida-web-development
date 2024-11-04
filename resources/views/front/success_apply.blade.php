@extends('layouts.master')
@section('content')
<body class="font-poppins text-[#0E0140] pb-[100px] overflow-x-hidden bg-[#0E0140] min-h-screen flex flex-col">
    <nav class="container max-w-[1130px] mx-auto flex items-center justify-between pt-10">
        <a href="index.html" class="flex shrink-0">
            <img src="{{asset('assets/logos/Logo.svg')}}" alt="Logo">
        </a>
        <ul class="flex items-center gap-10">
            <li>
                <a href="index.html" class="transition-all duration-300 hover:font-semibold hover:text-[#FF6B2C] font-medium text-white">Home</a>
            </li>
            <li>
                <a href="" class="transition-all duration-300 hover:font-semibold hover:text-[#FF6B2C] font-medium text-white">Features</a>
            </li>
            <li>
                <a href="" class="transition-all duration-300 hover:font-semibold hover:text-[#FF6B2C] font-medium text-white">Benefits</a>
            </li>
            <li>
                <a href="" class="transition-all duration-300 hover:font-semibold hover:text-[#FF6B2C] font-medium text-white">Stories</a>
            </li>
            <li>
                <a href="" class="transition-all duration-300 hover:font-semibold hover:text-[#FF6B2C] font-medium text-white">About</a>
            </li>
        </ul>
        @guest
        <div class="flex items-center gap-3">
            <a href="{{route('login')}}" class="rounded-full border border-white p-[14px_24px] font-semibold text-white">Sign In</a>
            <a href="{{route('register')}}" class="rounded-full p-[14px_24px] bg-[#FF6B2C] font-semibold text-white hover:shadow-[0_10px_20px_0_#FF6B2C66] transition-all duration-300">Sign up</a>
        </div>   
        @endguest
        @auth
        <div class="flex items-center gap-4">
            <p class="username font-medium text-white">Hi, {{Auth::user()->name}}</p>
            <div class="w-[52px] h-[52px] flex shrink-0 rounded-full overflow-hidden">
                <a href="{{route('dashboard')}}">
                    <img src="{{Storage::url(Auth::user()->avatar)}}" class="object-cover w-full h-full" alt="photo">
                </a>
            </div>
        </div>
        @endauth
    </nav>
    <div class="flex-1 flex items-center justify-center">
        <div id="Success" class="flex flex-col items-center justify-center gap-[30px] my-auto">
            <div class="flex shrink-0 w-[330px] h-[330px]">
                <img src="{{asset('assets/backgrounds/success illustration.png')}}" class="object-contain" alt="cover image">
            </div>
            <div class="flex flex-col gap-[14px] text-center max-w-[389px]">
                <p class="font-semibold text-[32px] leading-[48px] text-white">Well, Great Work!</p>
                <p class="leading-[26px] text-white">We have received your application and the recruiter will review in a couple business days</p>
            </div>
            <a href="{{route('front.index')}}" class="rounded-full p-[14px_24px] bg-[#FF6B2C] font-semibold text-white hover:shadow-[0_10px_20px_0_#FF6B2C66] transition-all duration-300">Explore Other Jobs</a>
        </div>
    </div>
</body>
@endsection