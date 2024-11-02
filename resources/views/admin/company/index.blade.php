<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('My Company') }}
            </h2>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">


                <div class="item-card flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src=" " alt="" class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">
                                asdasd
                            </h3>
                        <p class="text-slate-500 text-sm">
                            123 jobs posted
                        </p>
                        </div>
                    </div>   
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <a href=" " class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Edit Company
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-indigo-950 text-xl font-bold">About</h3>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum repudiandae eum beatae officia ipsum dolore inventore quo ut tempora, aliquam cum distinctio accusamus vero. Vel, assumenda iste. Aliquid, at molestiae!
                    </p>
                </div>
 

            </div>
        </div>
    </div>
</x-app-layout>
