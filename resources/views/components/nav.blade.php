<nav class="container max-w-7xl mx-auto flex items-center justify-between pt-6 relative">
    <!-- Logo -->
    <a href="{{route('front.index')}}" class="flex shrink-0 z-20">
        <img src="{{asset('assets/logos/intern.png')}}" alt="Logo" class="h-10 w-auto">
    </a>

    <!-- Mobile Menu Button -->
    <button id="mobileMenuBtn" class="lg:hidden z-20 p-2 text-[#1E40AF] hover:text-[#3B82F6]">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path id="menuIcon" class="block" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            <path id="closeIcon" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>

    <!-- Desktop Menu -->
    <ul class="hidden lg:flex items-center gap-8">
        <li>
            <a href="{{route('front.index')}}"
               class="relative py-2 transition-all duration-300 hover:text-[#3B82F6] {{request()->routeIs('front.index') ? 'text-[#3B82F6] font-semibold' : 'text-[#1E40AF]'}}">
                Home
                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-[#3B82F6] transform scale-x-0 transition-transform duration-300 {{request()->routeIs('front.index') ? 'scale-x-100' : ''}}"></span>
            </a>
        </li>
        <li>
            <a href="#features" class="relative py-2 transition-all duration-300 hover:text-[#3B82F6] text-[#1E40AF]">
                Features
                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-[#3B82F6] transform scale-x-0 transition-transform duration-300 group-hover:scale-x-100"></span>
            </a>
        </li>
        <li>
            <a href="#benefits" class="relative py-2 transition-all duration-300 hover:text-[#3B82F6] text-[#1E40AF]">
                Benefits
                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-[#3B82F6] transform scale-x-0 transition-transform duration-300 group-hover:scale-x-100"></span>
            </a>
        </li>
        <li>
            <a href="#stories" class="relative py-2 transition-all duration-300 hover:text-[#3B82F6] text-[#1E40AF]">
                Stories
                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-[#3B82F6] transform scale-x-0 transition-transform duration-300 group-hover:scale-x-100"></span>
            </a>
        </li>
        <li>
            <a href="#about" class="relative py-2 transition-all duration-300 hover:text-[#3B82F6] text-[#1E40AF]">
                About
                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-[#3B82F6] transform scale-x-0 transition-transform duration-300 group-hover:scale-x-100"></span>
            </a>
        </li>
    </ul>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden lg:hidden fixed inset-0 bg-white bg-opacity-95 z-10">
        <ul class="flex flex-col items-center justify-center h-full gap-8">
            <li>
                <a href="{{route('front.index')}}"
                   class="text-xl transition-all duration-300 hover:text-[#3B82F6] {{request()->routeIs('front.index') ? 'text-[#3B82F6] font-semibold' : 'text-[#1E40AF]'}}">
                    Home
                </a>
            </li>
            <li>
                <a href="#features" class="text-xl transition-all duration-300 hover:text-[#3B82F6] text-[#1E40AF]">Features</a>
            </li>
            <li>
                <a href="#benefits" class="text-xl transition-all duration-300 hover:text-[#3B82F6] text-[#1E40AF]">Benefits</a>
            </li>
            <li>
                <a href="#stories" class="text-xl transition-all duration-300 hover:text-[#3B82F6] text-[#1E40AF]">Stories</a>
            </li>
            <li>
                <a href="#about" class="text-xl transition-all duration-300 hover:text-[#3B82F6] text-[#1E40AF]">About</a>
            </li>
        </ul>
    </div>

    <!-- Auth Buttons/Profile -->
    <div class="hidden lg:flex items-center gap-4 z-20">
        @guest
            <a href="{{route('login')}}"
               class="rounded-full border border-[#3B82F6] px-6 py-3 font-medium text-[#3B82F6] hover:bg-[#3B82F6] hover:text-white transition-all duration-300">
                Sign In
            </a>
            <a href="{{route('register')}}"
               class="rounded-full px-6 py-3 bg-[#3B82F6] font-medium text-white hover:bg-[#1E40AF] hover:shadow-[0_10px_20px_0_#3B82F666] transition-all duration-300">
                Sign up
            </a>
        @endguest
        @auth
            <div class="flex items-center gap-4">
                <p class="username font-medium text-[#1E40AF]">Hi, {{Auth::user()->name}}</p>
                <a href="{{route('dashboard')}}" class="w-12 h-12 flex shrink-0 rounded-full overflow-hidden ring-2 ring-[#3B82F6] ring-offset-2 ring-offset-white transition-all duration-300 hover:ring-4">
                    <img src="{{Storage::url(Auth::user()->avatar)}}" class="object-cover w-full h-full" alt="User avatar">
                </a>
            </div>
        @endauth
    </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const menuIcon = document.getElementById('menuIcon');
    const closeIcon = document.getElementById('closeIcon');
    let isMenuOpen = false;

    mobileMenuBtn.addEventListener('click', function() {
        isMenuOpen = !isMenuOpen;
        if (isMenuOpen) {
            mobileMenu.classList.remove('hidden');
            menuIcon.classList.add('hidden');
            closeIcon.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        } else {
            mobileMenu.classList.add('hidden');
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    });
});
</script>
