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
                        <img src=" " alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">asdasdasd</h3>
                            <p class="text-slate-500 text-sm">qweqweqwe</p>
                        </div>
                        
                    </div>
                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Salary</p>
                        <h3 class="text-indigo-950 text-xl font-bold">
                            Rp 12312312/mo
                        </h3>
                    </div>
                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Type</p>
                        <h3 class="text-indigo-950 text-xl font-bold">
                            sdasdasdasd
                        </h3>
                    </div>
                </div>

                <hr class="my-5">

                <h3 class="text-indigo-950 text-xl font-bold">My Profile</h3>

                <div class="flex flex-row items-center justify-between">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src=" " alt="" class="rounded-full object-cover w-[70px] h-[70px]">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">asdasdad</h3>
                            <p class="text-slate-500 text-sm">adsadasdasd - 123123 yrs exp</p>
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


                </div>
                
                <div class="flex flex-col gap-y-3">
                    <h3 class="text-indigo-950 text-xl font-bold mt-5">Message</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro optio velit incidunt possimus consequatur esse excepturi minima perspiciatis iure eveniet iusto dolores inventore voluptatem, quo itaque autem aut numquam nulla?
                </p>
                </div>
                

                    <hr class="my-5">
                    <h3 class="text-indigo-950 text-xl font-bold">Congrats! Anda terpilih bekerja</h3>
                    <p>
                        Anda akan segera mendapatkan instruksi selanjutnya dari perusahaan asdasd terkait workflow pekerjaan. Silahkan periksa email Anda dengan berkala. Have a great career!
                    </p>

                        <hr class="my-5">
                        <h3 class="text-indigo-950 text-xl font-bold">Sorry! Anda belum beruntung</h3>
                        <p>
                            Silahkan mencoba apply pada pekerjaan lainnya yang tersedia!
                        </p>
                        <p>
                            <a href=" " class="font-bold py-3 px-10 rounded-full bg-indigo-700 text-white">
                            Explore Jobs</a>
                        </p>

                
            </div>
        </div>
    </div>
</x-app-layout>
