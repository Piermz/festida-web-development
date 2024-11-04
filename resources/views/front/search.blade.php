@extends('layouts.master')
@section('content')
<body class="font-poppins text-[#0E0140] pb-[100px] overflow-x-hidden">
    <div id="page-background" class="absolute h-[863px] w-full top-0 -z-10 overflow-hidden">
        <img src="{{asset('assets//backgrounds/Group 2009.png')}}" class="w-full h-full object-fill" alt="background">
    </div>
    <x-nav/>
    <header class="container max-w-[1130px] mx-auto flex items-center justify-between gap-[50px] mt-[70px]">
        <div class="flex flex-col items-center w-full gap-[30px]">
            <h1 class="font-black text-[36px] leading-[50px] text-white text-center">Explore 10,000 <br>Most Popular Jobs</h1>
            <form method="GET" action="{{route('front.search')}}" class="w-[579px] flex items-center bg-white rounded-full pl-6 h-fit focus-within:ring-2 focus-within:ring-[#FF6B2C] transition-all duration-300">
                <div class="flex items-center w-full mr-6 gap-[10px]">
                    @csrf
                    <div class="flex shrink-0">
                        <img src="{{asset('assets//icons/search-normal.svg')}}" alt="icon">
                    </div>
                    <input type="text" id="" name="keyword" autocomplete="off" class="appearance-none w-full outline-none font-semibold placeholder:font-normal placeholder:text-[#0E0140] focus:outline-none" placeholder="Quick search your dream job...">
                </div>
                <button type="submit" class="rounded-full py-5 px-[30px] bg-[#FF6B2C] font-semibold text-white text-nowrap hover:shadow-[0_10px_20px_0_#FF6B2C66] transition-all duration-300">Explore Now</button>
            </form>
        </div>
    </header>
    <section id="Result" class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px] w-fit">
        <h2 class="font-bold text-2xl leading-[36px] text-white">Search Result: {{ucfirst($keyword)}}</h2>
        <div class="categories-container grid grid-cols-3 gap-[30px]">
            @forelse ($jobs as $job)
            <div class="card first-of-type:pl-[calc((100%-1130px)/2)] last-of-type:pr-[calc((100%-1130px)/2)] px-[15px] py-[2px]">
                <div class="w-[300px] flex flex-col shrink-0 rounded-[20px] border border-[#E8E4F8] p-5 gap-5 bg-white shadow-[0_8px_30px_0_#0E01400D] hover:ring-2 hover:ring-[#FF6B2C] transition-all duration-300">
                    <div class="company-info flex items-center gap-3">
                        <div class="w-[70px] flex shrink-0 overflow-hidden">
                            <img src="{{Storage::url($job->company->logo)}}" class="object-contain w-full h-full" alt="logo">
                        </div>
                        <div class="flex flex-col">
                            <p class="font-semibold">{{$job->company->name}}</p>
                            <p class="text-sm leading-[21px]">Posted at {{$job->company->created_at->format('M d, Y')}}</p>
                        </div>
                    </div>
                    <hr class="border-[#E8E4F8]">
                    <p class="job-title font-bold text-lg leading-[27px] h-[54px] flex shrink-0 line-clamp-2">{{$job->name}}</p>
                    <div class="job-info flex flex-col gap-[14px]">
                        <div class="flex items-center gap-[6px]">
                            <div class="flex shrink-0 w-6 h-6">
                                <img src="{{asset('assets/icons/note-favorite-orange.svg')}}" alt="icon">
                            </div>
                            <p class="font-medium">{{$job->type}}</p>
                        </div>
                        <div class="flex items-center gap-[6px]">
                            <div class="flex shrink-0 w-6 h-6">
                                <img src="{{asset('assets/icons/moneys-cyan.svg')}}" alt="icon">
                            </div>
                            <p class="font-medium">Guaranteed</p>
                        </div>
                        <div class="flex items-center gap-[6px]">
                            <div class="flex shrink-0 w-6 h-6">
                                <img src="{{asset('assets/icons/location-purple.svg')}}" alt="icon">
                            </div>
                            <p class="font-medium">{{$job->location}}</p>
                        </div>
                    </div>
                    <hr class="border-[#E8E4F8]">
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col gap-[2px]">
                            <p class="font-bold text-lg leading-[27px]">Rp {{ number_format($job->salary, 0, ',', '.') }}</p>
                            <p class="text-sm leading-[21px]">/month</p>
                        </div>
                        <a href="{{route('front.details', $job->slug)}}" class="rounded-full p-[14px_24px] bg-[#FF6B2C] font-semibold text-white hover:shadow-[0_10px_20px_0_#FF6B2C66] transition-all duration-300">Details</a>
                    </div>
                </div>
            </div>  
            @empty
            <p class="text-white text-lg">Tidak ada data ditemukan</p>
            @endforelse

        
        </div>

        
        <div id="Pagination" class="flex items-center justify-center gap-[14px] mt-10">
            <button class="w-[38px] h-[38px] flex shrink-0 rounded-full justify-center items-center text-white font-semibold hover:bg-[#7521FF] transition-all duration-300 bg-[#7521FF]">1</button>
            <button class="w-[38px] h-[38px] flex shrink-0 rounded-full justify-center items-center text-white font-semibold hover:bg-[#7521FF] transition-all duration-300 bg-[#0E0140]">2</button>
            <button class="w-[38px] h-[38px] flex shrink-0 rounded-full justify-center items-center text-white font-semibold hover:bg-[#7521FF] transition-all duration-300 bg-[#0E0140]">3</button>
            <button class="w-[38px] h-[38px] flex shrink-0 rounded-full justify-center items-center text-white font-semibold hover:bg-[#7521FF] transition-all duration-300 bg-[#0E0140]">4</button>
            <button class="w-[38px] h-[38px] flex shrink-0 rounded-full justify-center items-center text-white font-semibold hover:bg-[#7521FF] transition-all duration-300 bg-[#0E0140]">5</button>
            <button class="w-[38px] h-[38px] flex shrink-0 rounded-full justify-center items-center text-white font-semibold hover:bg-[#7521FF] transition-all duration-300 bg-[#0E0140]">6</button>
            <button class="w-[38px] h-[38px] flex shrink-0 rounded-full justify-center items-center text-white font-semibold hover:bg-[#7521FF] transition-all duration-300 bg-[#0E0140]">7</button>
        </div>
    </section>

@endsection

