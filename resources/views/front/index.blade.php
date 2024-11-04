@extends('layouts.master')
@section('content')
<body class="font-poppins text-[#0E0140] pb-[100px] overflow-x-hidden">
    <div id="page-background" class="absolute h-[1330px] w-full top-0 -z-10 overflow-hidden">
        <img src="assets/backgrounds/Group 2009.png" class="w-full h-full object-fill" alt="background">
    </div>
  <x-nav/>
    <header class="container max-w-[1130px] mx-auto flex items-center justify-between gap-[50px] mt-[70px]">
        <div class="flex flex-col justify-center w-full gap-10">
            <div class="badge flex items-center rounded-full py-2 pl-4 pr-6 gap-[10px] bg-white w-fit">
                <div class="flex shrink-0">
                    <img src="assets/icons/crown-orange.svg" alt="icon">
                </div>
                <p class="font-semibold text-sm leading-[21px] text-[#0C0039]">Helped 5 Million People Worldwide Grow Career</p>
            </div>
            <div class="flex flex-col gap-4">
                <h1 class="font-black text-[60px] leading-[70px] text-white">We Help You<br>Get Dream Job</h1>
                <p class="text-lg leading-[34px] text-white">Must trusted platform to build new career and<br>get an happy job better than befooore</p>
            </div>
            <form method="GET"action="{{route('front.search')}}" class="flex items-center bg-white rounded-full pl-6 h-fit focus-within:ring-2 focus-within:ring-[#FF6B2C] transition-all duration-300">
                @csrf
                <div class="flex items-center w-full mr-6 gap-[10px]">
                    <div class="flex shrink-0">
                        <img src="assets/icons/search-normal.svg" alt="icon">
                    </div>
                    <input name="keyword" type="text" autocomplete="off" class="appearance-none w-full outline-none font-semibold placeholder:font-normal placeholder:text-[#0E0140] focus:outline-none" placeholder="Quick search your dream job...">
                </div>
                <button type="submit" class="rounded-full py-5 px-[30px] bg-[#FF6B2C] font-semibold text-white text-nowrap hover:shadow-[0_10px_20px_0_#FF6B2C66] transition-all duration-300">Explore Now</button>
            </form>
        </div>
        <div class="flex shrink-0 w-[548px]">
            <img src="assets/backgrounds/hero illustration v2.png" class="object-contain" alt="banner">
        </div>
    </header>
    <section id="Categories" class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px]">
        <h2 class="font-bold text-2xl leading-[36px] text-white">Browse by <br> Job Categories</h2>
        <div class="categories-container grid grid-cols-4 gap-[30px]">
            @forelse ($catregories as $category)
            <a href="{{route('front.category', $category->slug)}}" class="card">
                <div class="flex flex-col rounded-[20px] border border-[#E8E4F8] p-5 gap-[30px] bg-white shadow-[0_8px_30px_0_#0E01400D] hover:ring-2 hover:ring-[#FF6B2C] transition-all duration-300">
                    <div class="w-[60px] h-[60px] flex shrink-0">
                        <img src="assets/icons/Web Development 1-2.png" class="object-contain" alt="icon">
                    </div>
                    <div class="flex items-center justify-between gap-4">
                        <div class="flex flex-col">
                            <p class="font-bold text-lg leading-[27px]">{{$category->name}}</p>
                            <p class="font-medium">{{$category->jobs->count()}}</p>
                        </div>
                        <img src="assets/icons/arrow-circle-right.svg" alt="icon">
                    </div>
                </div>
            </a>
            @empty
                
            @endforelse
        </div>
    </section>
    <section id="Latest" class="flex flex-col gap-[30px] mt-[70px]">
        <h2 class="container max-w-[1130px] mx-auto font-bold text-2xl leading-[36px]">Latest Jobs <br> Get Them Now</h2>
        <div class="main-carousel *:!overflow-visible">

            @forelse($jobs as $job)
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
                                <img src="assets/icons/note-favorite-orange.svg" alt="icon">
                            </div>
                            <p class="font-medium">{{$job->type}}</p>
                        </div>
                        <div class="flex items-center gap-[6px]">
                            <div class="flex shrink-0 w-6 h-6">
                                <img src="assets/icons/moneys-cyan.svg" alt="icon">
                            </div>
                            <p class="font-medium">Guaranteed</p>
                        </div>
                        <div class="flex items-center gap-[6px]">
                            <div class="flex shrink-0 w-6 h-6">
                                <img src="assets/icons/location-purple.svg" alt="icon">
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
            <p>Belum ada data job baru</p>
            @endforelse
        </div>
    </section>
</body>
@endsection

@push('after-scripts')

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- JavaScript -->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

<script>
    $('.main-carousel').flickity({
        // options
        cellAlign: 'left',
        contain: true,
        prevNextButtons: false,
        pageDots: false
    });
</script>
@endpush