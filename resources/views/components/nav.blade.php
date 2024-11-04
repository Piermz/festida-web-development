<nav class="container max-w-[1130px] mx-auto flex items-center justify-between pt-10">
        <a href="{{route('front.index')}}" class="flex shrink-0">
            <img src="{{asset('assets/logos/Logo.svg')}}" alt="Logo">
        </a>
        <ul class="flex items-center gap-10">
            <li>
                <a href="{{route('front.index')}}" class="transition-all duration-300 hover:font-semibold hover:text-[#FF6B2C]  {{request()->routeIs('front.index') ? 'text-[#FF6B2C] font-semibold'  : 'text-white'}}">Home</a>
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