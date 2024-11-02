<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Job Applications') }}
            </h2>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">


                <div class="item-card flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src=" " alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">
                                asdsad
                            </h3>
                        <p class="text-slate-500 text-sm">
                           asdasdasd
                        </p>
                        </div>
                    </div> 
                    <div  class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Salary</p>
                        <h3 class="text-indigo-950 text-xl font-bold">
                            Rp 12312312/mo
                        </h3>
                    </div>
                    <div  class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Status</p>

                            <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-green-500 text-white">
                                HIRED
                            </span>

                            <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-orange-500 text-white">
                                WAITING
                            </span> 

                            <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-red-500 text-white">
                                REJECTED
                            </span>

                    </div>
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <a href=" " class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            View Details
                        </a>
                    </div>
                </div>
                
                <p>
                    <a href=" " class="py-3 px-10 bg-indigo-500 text-white">
                    Explore Jobs</a>
                </p>

                

            </div>
        </div>
    </div>
</x-app-layout>
