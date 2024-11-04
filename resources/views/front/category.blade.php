@extends('layouts.master')
@section('content')
<body class="font-poppins text-[#0E0140] pb-[100px] overflow-x-hidden">
    <div id="page-background" class="absolute h-[863px] w-full top-0 -z-10 overflow-hidden">
        <img src="{{asset('assets//backgrounds/Group 2009.png')}}" class="w-full h-full object-fill" alt="background">
    </div>
    <x-nav/>
    <header class="container max-w-[1130px] mx-auto flex items-center justify-between gap-[50px] mt-[70px]">
        <div class="flex flex-col gap-4 items-center w-full">
            <h1 class="font-black text-[36px] leading-[70px] text-white text-center">{{ucfirst($category->name)}}</h1>
        </div>  
    </header>
    
    <section id="Result" class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px] w-fit">
        <div class="categories-container grid grid-cols-3 gap-[30px]">


        @forelse ($category->jobs as $job)

            <div class="card w-[300px] flex flex-col shrink-0 rounded-[20px] border border-[#E8E4F8] p-5 gap-5 bg-white shadow-[0_8px_30px_0_#0E01400D] hover:ring-2 hover:ring-[#FF6B2C] transition-all duration-300">
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
                            <img src="{{asset('assets//icons/note-favorite-orange.svg')}}" alt="icon">
                        </div>
                        <p class="font-medium">{{$job->type}}</p>
                    </div>
                    <div class="flex items-center gap-[6px]">
                        <div class="flex shrink-0 w-6 h-6">
                            <img src="{{asset('assets//icons/moneys-cyan.svg')}}" alt="icon">
                        </div>
                        <p class="font-medium">Guaranteed</p>
                    </div>
                    <div class="flex items-center gap-[6px]">
                        <div class="flex shrink-0 w-6 h-6">
                            <img src="{{asset('assets//icons/location-purple.svg')}}" alt="icon">
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
        @empty
        <p>Belum ada data pekerjaan terkait</p>
        @endforelse
        </div> 
    </section>


    </script>
</body>

@endsection