<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Job Listing') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg"> 
                
                <form method="POST" action=" " enctype="multipart/form-data"> 
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" 
                          required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="type" :value="__('type')" />
                        
                        <select name="type" id="type" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="Part-Time">Part-Time</option>
                            <option value="Full-Time">Full-Time</option>
                        </select>

                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="salary IDR in month" :value="__('salary IDR in month')" />
                        <x-text-input id="salary" class="block mt-1 w-full" type="number" name="salary" 
                          required autofocus autocomplete="salary" />
                        <x-input-error :messages="$errors->get('salary')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="location" :value="__('location')" />
                        <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" 
                          required autofocus autocomplete="location" />
                        <x-input-error :messages="$errors->get('location')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="skill_level" :value="__('skill_level')" />
                        
                        <select name="skill_level" id="skill_level" class="py-3 rounded-lg pl-3 w-full border border-slate-300">

                            <option value="Beginner">Beginner</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Expert">Expert</option>
                        </select>

                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="category" :value="__('category')" />
                        
                        <select name="category_id" id="category_id" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                        </select>

                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('thumbnail')" />
                        <img src=" " alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" autofocus autocomplete="thumbnail" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="about" :value="__('about')" />
                        <textarea name="about" id="about" cols="30" rows="5" class="border border-slate-300 rounded-xl w-full">Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum earum numquam animi laudantium fuga ab autem ea deserunt vitae quidem! Quibusdam nisi mollitia laudantium dignissimos, possimus voluptatum cupiditate architecto ad!</textarea>
                        <x-input-error :messages="$errors->get('about')" class="mt-2" />
                    </div>

                    <hr class="my-5">

                    <div class="mt-4">
                        
                        <div class="flex flex-col gap-y-5">
                            <x-input-label for="responsibilities" :value="__('responsibilities')" />

                                <input type="text" class="py-3 rounded-lg border-slate-300 border" placeholder="Write your responsibilities" name="responsibilities[]">

                        </div>
                        <x-input-error :messages="$errors->get('responsibilities')" class="mt-2" />
                    </div>

                    <hr class="my-5">

                    <div class="mt-4">
                        
                        <div class="flex flex-col gap-y-5">
                            <x-input-label for="qualifications" :value="__('qualifications')" />

                                <input type="text"  class="py-3 rounded-lg border-slate-300 border" placeholder="Write your qualifications" name="qualifications[]">

                        </div>
                        <x-input-error :messages="$errors->get('qualifications')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Update Job
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
