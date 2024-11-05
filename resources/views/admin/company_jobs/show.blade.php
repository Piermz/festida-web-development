<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Project Details') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">


                <div class="item-card flex flex-row gap-y-10 justify-between md:items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{ Storage::url($companyJob->thumbnail) }}" alt=""
                            class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $companyJob->name }}</h3>
                            <p class="text-slate-500 text-sm">{{ $companyJob->category->name }}</p>
                        </div>
                    </div>
                    <div class="flex flex-row items-center gap-x-3">
                        <a href="{{ route('admin.company_jobs.edit', $companyJob) }}"
                            class="font-bold py-4 px-6 bg-indigo-500 text-white rounded-full">
                            Edit Job
                        </a>
                        <a href=" " class="font-bold py-4 px-6 bg-orange-500 text-white rounded-full">
                            Preview
                        </a>
                    </div>


                </div>

                <hr class="my-5">
                <div class="flex flex-row justify-between">
                    <div>
                        <p class="text-slate-500 text-sm">Salary</p>
                        <h3 class="text-indigo-950 text-xl font-bold">
                            Rp {{ number_format($companyJob->salary, 0, ',', '.') }}/mo
                        </h3>
                    </div>
                    <div>
                        <p class="text-slate-500 text-sm">Job Type</p>
                        <h3 class="text-indigo-950 text-xl font-bold">
                            {{ $companyJob->type }}
                        </h3>
                    </div>
                    <div>
                        <p class="text-slate-500 text-sm">Location</p>
                        <h3 class="text-indigo-950 text-xl font-bold">
                            {{ $companyJob->location }}
                        </h3>
                    </div>
                    <div>
                        <p class="text-slate-500 text-sm">Level</p>
                        <h3 class="text-indigo-950 text-xl font-bold">
                            {{ $companyJob->skill_level }}
                        </h3>
                    </div>
                </div>

                <div>
                    <h3 class="text-indigo-950 text-xl font-bold">
                        About
                    </h3>
                    <p class="text-slate-500 text-sm">
                        {{ $companyJob->about }}
                    </p>
                </div>

                <div class="flex flex-row gap-x-10">
                    <div>
                        <h3 class="text-indigo-950 text-xl font-bold mb-3">
                            Responsibilities
                        </h3>
                        <ul class="flex flex-col gap-y-3">
                            @foreach ($companyJob->responsibilities as $responsibility)
                                <li class="text-slate-500 text-base">{{ $responsibility->name }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-indigo-950 text-xl font-bold mb-3">
                            Qualifications
                        </h3>
                        <ul class="flex flex-col gap-y-3">
                            @foreach ($companyJob->Qualifications as $Qualification)
                                <li class="text-slate-500 text-base">{{ $Qualification->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <hr class="my-5">

                <h3 class="text-indigo-950 text-xl font-bold">Candidates</h3>

                @forelse($companyJob->job_candidates as $candidate)
                    <div class="flex flex-row justify-between items-center">
                        <div class="flex flex-row items-center gap-x-3">
                            <img src="{{ Storage::url($candidate->profile->avatar) }}" alt="" class="rounded-full object-cover w-[70px] h-[70px]">
                            <div class="flex flex-col">
                                <h3 class="text-indigo-950 text-xl font-bold">
                                    {{ $candidate->profile->name }}
                                </h3>
                                <p class="text-slate-500 text-sm">
                                   {{ $candidate->profile->occupation }} - {{ $candidate->profile->experience }} yrs exp
                                </p>
                            </div>
                        </div>

                        @if($candidate->is_hired)
                        <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-green-500 text-white">
                            HIRED
                        </span>
                        @elseif(!$candidate->is_hired && $companyJob->is_open)
                        <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-orange-500 text-white">
                            WAITING
                        </span>
                        @elseif(!$candidate->is_hired)
                        <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-red-500 text-white">
                            REJECTED
                        </span>
                        @endif

                        <div class="flex flex-row items-center gap-x-3">
                            <a href="{{route('admin.job_candidate.show', $companyJob)}}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                                Details
                            </a>
                        </div>
                    </div>
                @empty
                    <p>
                        Belum ada candidate yang tertarik pada projek ini
                    </p>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
