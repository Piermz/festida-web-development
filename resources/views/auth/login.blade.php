@extends('layouts.master')
@section('content')
	<body class="font-poppins text-[#0E0140]">
		<main class="min-h-dvh">
			<div id="left-side" class="fixed top-0 left-0 h-dvh w-[640px] outline outline-1 outline-[#E8E4F8]">
				<img src="{{asset('assets/backgrounds/Smiley Woman on Floor.png')}}" class="size-full object-cover" alt="background image" />
				<div class="absolute bottom-0 flex p-5 flex-col gap-4 max-w-[590px] mx-[30px] mb-[30px] rounded-[20px] outline outline-1 outline-[#E8E4F8] bg-white shadow-[0_8px_30px_0_#0E01400D]">
					<p class="text-base leading-[32px] font-semibold">
						Berkat Jobank saya bisa bekerja dari rumah dengan santai tanpa harus macet-macetan. Seluruh lokernya juga aman bebas dari penipuan yang sering terjadi saat ini di seluruh dunia.
					</p>
					<div class="flex justify-between items-center">
						<div class="flex items-center gap-[14px]">
							<div class="flex shrink-0 size-[60px] rounded-full overflow-hidden">
								<img src="{{asset('assets/photos/photo2.png')}}" class="object-cover w-full h-full" alt="profile picture" />
							</div>
							<div>
								<p class="text-base font-semibold">Shayna Angga</p>
								<p class="text-sm leading-[21px]">Programmer</p>
							</div>
						</div>
						<div class="flex items-center gap-[2px]">
							<div class="flex shrink-0 size-6">
								<img src="{{asset('assets/icons/Star.svg')}}" alt="star" />
							</div>
							<div class="flex shrink-0 size-6">
								<img src="{{asset('assets/icons/Star.svg')}}" alt="star" />
							</div>
							<div class="flex shrink-0 size-6">
								<img src="{{asset('assets/icons/Star.svg')}}" alt="star" />
							</div>
							<div class="flex shrink-0 size-6">
								<img src="{{asset('assets/icons/Star.svg')}}" alt="star" />
							</div>
							<div class="flex shrink-0 size-6">
								<img src="{{asset('assets/icons/Star.svg')}}" alt="star" />
							</div>
						</div>
					</div>
				</div>
			</div>
			<section id="right-side" class="w-dvw h-dvh flex flex-col items-center justify-center pl-[640px] py-[140px]">
				<a href="index.html" class="flex shrink-0 justify-start w-[500px] h-[10] mb-[70px]">
					<img src="{{asset('assets/logos/Logo-black.svg')}}" class="object-contain" alt="logo" />
        </a>
				<form id="form-signin" method="POST" action="{{route('login')}}" class="w-[500px] flex flex-col gap-[30px]">
                    @csrf
					<h1 class="text-[26px] leading-[39px] font-bold">Sign In</h1>
					<div class="flex flex-col gap-2">
						<label for="email" class="text-base font-semibold">Email Address</label>
						<div class="flex items-center rounded-full py-[14px] px-[24px] gap-[10px] ring-1 ring-[#0E0140] focus-within:ring-2 focus-within:ring-[#FF6B2C] transition-all duration-300">
							<div class="flex shrink-0 size-6">
								<img src="{{asset('assets/icons/sms.svg')}}" alt="email icon" />
							</div>
							<input type="email" id="email" name="email" class="w-full focus:outline-none font-semibold placeholder:font-normal placeholder:text-[#0E0140]" placeholder="Write your email address" required />
						</div>
					</div>
					<div class="flex flex-col gap-2">
						<label for="password" class="text-base font-semibold">Password</label>
						<div class="flex items-center rounded-full py-[14px] px-[24px] gap-[10px] ring-1 ring-[#0E0140] focus-within:ring-2 focus-within:ring-[#FF6B2C] transition-all duration-300">
							<div class="flex shrink-0 size-6">
								<img src="{{asset('assets/icons/lock.svg')}}" alt="password icon" />
							</div>
							<input type="password" id="password" name="password" class="w-full focus:outline-none font-semibold placeholder:font-normal placeholder:text-[#0E0140]" placeholder="Write your password" required />
						</div>
						<a href="#" class="text-sm leading-[21px] hover:underline">Forgot Password</a>
					</div>
					<div class="flex flex-col gap-3">
						<button type="submit" class="flex items-center justify-center py-[14px] px-[30px] bg-[#FF6B2C] font-semibold text-white rounded-full hover:shadow-[0px_10px_20px_0px_#FF6B2C66] transition-all duration-300">
							Sign In to My Account
						</button>
						<a href="{{route('register')}}" class="flex items-center justify-center py-[14px] px-[30px] font-semibold text-[#0E0140] outline outline-1 outline-[#0E0140] rounded-full">Create New Account</a>
					</div>
				</form>
			</section>
		</main>
	</body>
@endsection
