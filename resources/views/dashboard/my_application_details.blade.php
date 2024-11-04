<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidate Details') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">

                <div class="item-card flex flex-row gap-y-10 justify-between md:items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{Storage::url($JobCandidate->job->thumbnail)}}" alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">{{$JobCandidate->job->name}}</h3>
                            <p class="text-slate-500 text-sm">{{$JobCandidate->job->category->name}}</p>
                        </div>
                        
                    </div>
                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Salary</p>
                        <h3 class="text-indigo-950 text-xl font-bold">
                            Rp {{ number_format($JobCandidate->job->salary, 0, ',', '.') }}/mo
                        </h3>
                    </div>
                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Type</p>
                        <h3 class="text-indigo-950 text-xl font-bold">
                            {{$JobCandidate->job->type}}
                        </h3>
                    </div>
                </div>

                <hr class="my-5">

                <h3 class="text-indigo-950 text-xl font-bold">My Profile</h3>

                <div class="flex flex-row items-center justify-between">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{Storage::url($JobCandidate->profile->avatar)}}" alt="" class="rounded-full object-cover w-[70px] h-[70px]">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">{{$JobCandidate->profile->name}}</h3>
                            <p class="text-slate-500 text-sm">{{$JobCandidate->profile->occupation}} - {{$JobCandidate->profile->experience}} yrs exp</p>
                        </div>
                    </div>


                    @if ($JobCandidate->is_hired)
                    <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-green-500 text-white">
                        HIRED
                    </span>
                @elseif (!$JobCandidate->is_hired && $JobCandidate->job->is_open)
                    <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-orange-500 text-white">
                        WAITING
                    </span>
                @else
                    <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-red-500 text-white">
                        REJECTED
                    </span>
                @endif


                </div>
                
                <div class="flex flex-col gap-y-3">
                    <h3 class="text-indigo-950 text-xl font-bold mt-5">Message</h3>
                <p>
                    {{$JobCandidate->massage}}
                </p>
                </div>
                

                @if($JobCandidate->candidate_id == Auth::id() && $JobCandidate->is_hired && !$JobCandidate->job->is_open)
                <hr class="my-5">
                <h3 class="text-indigo-950 text-xl font-bold">Congrats! Anda terpilih bekerja</h3>
                <p>
                    Anda akan segera mendapatkan instruksi selanjutnya dari perusahaan asdasd terkait workflow pekerjaan. Silahkan periksa email Anda dengan berkala. Have a great career!
                </p>
            @elseif($JobCandidate->candidate_id == Auth::id() && !$JobCandidate->is_hired && !$JobCandidate->job->is_open)
                <hr class="my-5">
                <h3 class="text-indigo-950 text-xl font-bold">Sorry! Anda belum beruntung</h3>
                <p>
                    Silahkan mencoba apply pada pekerjaan lainnya yang tersedia!
                </p>
                <p>
                    <a href="{{route('front.index')}}" class="font-bold py-3 px-10 rounded-full bg-indigo-700 text-white">
                        Explore Jobs
                    </a>
                </p>
            @endif

                
            </div>
        </div>
    </div>
</x-app-layout>
