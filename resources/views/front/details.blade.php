@extends('layouts.master')
@section('content')
<body class="font-poppins text-[#0E0140] pb-[100px] overflow-x-hidden">
    <div id="page-background" class="absolute h-[533px] w-full top-0 -z-10 overflow-hidden">
        <img src="{{asset('assets/backgrounds/Group 2009.png')}}" class="w-full h-full object-fill" alt="background">
    </div>
    <nav class="container max-w-[1130px] mx-auto flex items-center justify-between pt-10">
        <a href="index.html" class="flex shrink-0">
            <img src="{{asset('assets/logos/Logo.svg')}}" alt="Logo">
        </a>
        <ul class="flex items-center gap-10">
            <li>
                <a href="index.html" class="transition-all duration-300 hover:font-semibold hover:text-[#FF6B2C] font-medium text-white">Home</a>
            </li>
            <li>
                <a href="index.html" class="transition-all duration-300 hover:font-semibold hover:text-[#FF6B2C] font-medium text-white">Features</a>
            </li>
            <li>
                <a href="index.html" class="transition-all duration-300 hover:font-semibold hover:text-[#FF6B2C] font-medium text-white">Benefits</a>
            </li>
            <li>
                <a href="index.html" class="transition-all duration-300 hover:font-semibold hover:text-[#FF6B2C] font-medium text-white">Stories</a>
            </li>
            <li>
                <a href="index.html" class="transition-all duration-300 hover:font-semibold hover:text-[#FF6B2C] font-medium text-white">About</a>
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
    <article id="Details" class="max-w-[900px] mx-auto flex flex-col rounded-[20px] bg-white border border-[#E8E4F8] p-[30px] gap-10 shadow-[0_8px_30px_0_#0E01400D] mt-[70px]">
        <div id="Cover" class="w-full relative">
            <div class="w-full aspect-[840/300] bg-[#D9D9D9] rounded-[20px] overflow-hidden">
                <img src="{{Storage::url($companyJob->thumbnail)}}" class="object-cover w-full h-full" alt="cover image">
            </div>
            <div class="absolute transform translate-y-1/2 bottom-0 left-5 w-[120px] h-[120px] p-5 flex shrink-0 items-center justify-center bg-white rounded-[20px] border border-[#E8E4F8] shadow-[0_8px_30px_0_#0E01400D]">
                <img src="{{Storage::url($companyJob->company->logo)}}" class="object-contain w-full h-full" alt="logo">
            </div>
            <div class="absolute transform translate-y-1/2 bottom-0 right-5">
                @if($companyJob->is_open)
                <p id="HiringBadge" class="rounded-full p-[8px_20px] bg-[#7521FF] font-bold text-white w-fit">WE’RE HIRING!</p>
                @else
               <p id="ClosedBadge" class="rounded-full p-[8px_20px] bg-[#FF2C39] font-bold text-white w-fit">CLOSED</p>
               @endif
                
            </div>
        </div>
        <div id="Title" class="flex flex-col mt-[90px] gap-[10px]">
            <h1 class="font-bold text-[32px] leading-[48px]">{{$companyJob->name}}</h1>
            <p>{{$companyJob->category->name}} • Posted at {{$companyJob->company->created_at->format('M d, Y')}}</p>
        </div>
        <div id="Feature" class="flex items-center gap-6">
            <div class="flex items-center gap-[6px]">
                <div class="flex shrink-0 w-[38px] h-[38px]">
                    <img src="{{asset('assets/icons/note-favorite-orange.svg')}}" alt="icon">
                </div>
                <p class="font-semibold text-lg leading-[27px]">{{$companyJob->type}}</p>
            </div>
            <div class="flex items-center gap-[6px]">
                <div class="flex shrink-0 w-[38px] h-[38px]">
                    <img src="{{asset('assets/icons/personalcard-yellow.svg')}}" alt="icon">
                </div>
                <p class="font-semibold text-lg leading-[27px]">{{$companyJob->skill_level}}</p>
            </div>
            <div class="flex items-center gap-[6px]">
                <div class="flex shrink-0 w-[38px] h-[38px]">
                    <img src="{{asset('assets/icons/moneys-cyan.svg')}}" alt="icon">
                </div>
                <p class="font-semibold text-lg leading-[27px]">Rp {{ number_format($companyJob->salary, 0, ',', '.') }}/mo</p>
            </div>
            <div class="flex items-center gap-[6px]">
                <div class="flex shrink-0 w-[38px] h-[38px]">
                    <img src="{{asset('assets/icons/location-purple.svg')}}" alt="icon">
                </div>
                <p class="font-semibold text-lg leading-[27px]">{{$companyJob->location}}</p>
            </div>
        </div>
        <div id="Overview" class="flex flex-col gap-[10px]">
            <h2 class="font-semibold text-xl leading-[30px]">Overview</h2>
            <p class="text-lg leading-[34px]">{{$companyJob->about}}</p>
        </div>
        <div id="Responsibilities" class="flex flex-col gap-[10px]">
            <h2 class="font-semibold text-xl leading-[30px]">Responsibilities</h2>
            <div class="flex flex-col gap-5">
                @foreach ($companyJob->responsibilities as $responsibility)
                <div class="flex items-center gap-2">
                    <div class="flex shrink-0">
                        <img src="{{asset('assets/icons/tick-circle.svg')}}" alt="tick icon">
                    </div>
                    <p>{{$responsibility->name}}</p>
                </div>
                @endforeach
            </div>
        </div>
        <div id="Qualifications" class="flex flex-col gap-[10px]">
            <h2 class="font-semibold text-xl leading-[30px]">Qualifications</h2>
            <div class="flex flex-col gap-5">
                @foreach ($companyJob->Qualifications as $Qualification)
                <div class="flex items-center gap-2">
                    <div class="flex shrink-0">
                        <img src="{{asset('assets/icons/tick-circle.svg')}}" alt="tick icon">
                    </div>
                    <p>{{$Qualification->name}}</p>
                </div>
                @endforeach
            </div>
        </div>
        <div id="Company" class="flex flex-col gap-[10px]">
            <h2 class="font-semibold text-xl leading-[30px]">Company</h2>
            <div class="flex flex-col gap-5">
                <div class="flex items-center gap-5">
                    <div class="company-logo w-[70px] flex shrink-0">
                        <img src="{{Storage::url($companyJob->company->logo)}}" class="object-contain" alt="icon">
                    </div>
                    <div class="flex flex-col gap-[2px]">
                        <div class="CompanyName font-semibold flex items-center gap-[2px]">
                            <p class="font-semibold">{{$companyJob->company->name}}</p>
                            <div class="w-6 h-6 flex shrink-0">
                                <img src="{{asset('assets/icons/verify.svg')}}" alt="verified"> 
                            </div>
                        </div>
                        <p class="text-sm leading-[21px]">{{$companyJob->company->jobs->count()}} Jobs</p>
                    </div>
                </div>
                <p class="leading-[28px]">{{$companyJob->company->about}}</p>
            </div>
        </div>
        <hr class="border-[#E8E4F8]">
        <div id="CTA" class="flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="w-6 h-6 flex shrink-0">
                    <img src="{{asset('assets/icons/security-user.svg')}}" alt="icon">
                </div>
                <p class="font-semibold">We use Angga to secure your data 100%</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="" class="rounded-full border border-[#0E0140] p-[14px_24px] font-semibold text-[#0E0140]">Bookmark</a>
                <a href="{{route('front.apply', $companyJob->slug)}}" class="rounded-full p-[14px_24px] bg-[#FF6B2C] font-semibold text-white hover:shadow-[0_10px_20px_0_#FF6B2C66] transition-all duration-300">Apply Now</a>
            </div>
        </div>
    </article>
    <section id="Latest" class="flex flex-col gap-[30px] mt-[70px]">
        <h2 class="container max-w-[1130px] mx-auto font-bold text-2xl leading-[36px]">Other Jobs You <br> Might Interested</h2>
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
            <p>Belum ada data job baru</p>
            @endforelse
        </div>
    </section>

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