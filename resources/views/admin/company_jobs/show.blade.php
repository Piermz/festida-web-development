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
                        <img src=" " alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">job name</h3>
                            <p class="text-slate-500 text-sm">category name</p>
                        </div>
                    </div>
                    <div class="flex flex-row items-center gap-x-3">
                        <a href=" " class="font-bold py-4 px-6 bg-indigo-500 text-white rounded-full">
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
                            Rp 12312/mo
                        </h3>
                    </div>
                    <div>
                        <p class="text-slate-500 text-sm">Job Type</p>
                        <h3 class="text-indigo-950 text-xl font-bold">
                            remote
                        </h3>
                    </div>
                    <div>
                        <p class="text-slate-500 text-sm">Location</p>
                        <h3 class="text-indigo-950 text-xl font-bold">
                            city
                        </h3>
                    </div>
                    <div>
                        <p class="text-slate-500 text-sm">Level</p>
                        <h3 class="text-indigo-950 text-xl font-bold">
                            level
                        </h3>
                    </div>
                </div>

                <div>
                    <h3 class="text-indigo-950 text-xl font-bold">
                        About
                    </h3>
                    <p class="text-slate-500 text-sm">about</p>
                </div>
                
                <div class="flex flex-row gap-x-10">
                    <div>
                        <h3 class="text-indigo-950 text-xl font-bold mb-3">
                            Responsibilities
                        </h3>
                        <ul class="flex flex-col gap-y-3">

                                <li class="text-slate-500 text-base">Responsibilities</li>

                        </ul>
                    </div>
    
                    <div>
                        <h3 class="text-indigo-950 text-xl font-bold mb-3">
                            Qualifications
                        </h3>
                        <ul class="flex flex-col gap-y-3">

                                <li class="text-slate-500 text-base">Qualifications</li>

                        </ul>
                    </div>
                </div>

                <hr class="my-5">

                <h3 class="text-indigo-950 text-xl font-bold">Candidates</h3>


                    <div class="flex flex-row justify-between items-center">
                        <div class="flex flex-row items-center gap-x-3">
                            <img src=" " alt="" class="rounded-full object-cover w-[70px] h-[70px]">
                            <div class="flex flex-col">
                                <h3 class="text-indigo-950 text-xl font-bold">
                                    name
                                </h3>
                                <p class="text-slate-500 text-sm">
                                    role - 12 yrs exp
                                </p>
                            </div>
                        </div>


                            <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-green-500 text-white">
                                HIRED
                            </span>

                            <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-orange-500 text-white">
                                WAITING
                            </span> 

                            <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-red-500 text-white">
                                REJECTED
                            </span>


                        <div class="flex flex-row items-center gap-x-3">
                            <a href=" " class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                                Details
                            </a>
                        </div>
                    </div>

                    <p>
                        Belum ada candidate yang tertarik pada projek ini
                    </p>

                
            </div>
        </div>
    </div>
</x-app-layout>
