<x-layout>
    <div class="w-full h-full grid grid-cols-[15%,1fr] gap-2 bg-[#f6f6f9]">
        <div class=" flex h-screen rounded-tr-md">
            <x-aside>
                
            </x-aside>
        </div>
        <main class="w-full">
            <h1 class="text-2xl font-semibold mt-3">Salon</h1>
            <div class="action_buttons flex justify-end mr-12">
                <a href="{{route('business_admin.create_salon')}}">
                    <button class="flex justify-between gap-1 bg-gray-950 py-1 px-2 text-white rounded-sm mt-20">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        <span>Salon</span>
                    </button>
                </a>
            </div>
            <div class="w-full flex gap-3">
                @foreach ($userWithBusinesses->businesses as $business)
                    <div class="relative flex min-h-screen flex-col justify-start items-start overflow-hidden sm:py-12">
                        <div
                            class="group relative cursor-pointer overflow-hidden bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:mx-auto sm:max-w-sm sm:rounded-lg sm:px-10">
                            <div class="absolute top-0 left-0 w-full h-full bg-sky-500 transition-all duration-300 transform origin-top-left scale-x-0 scale-y-0 group-hover:scale-x-100 group-hover:scale-y-100"></div>
                            <div class="relative z-10 mx-auto max-w-md">
                                <div class="space-y-6 pt-5 text-base leading-7 text-gray-600 transition-all duration-300 group-hover:text-white/90">
                                    <p class="font-bold">{{$business->business_name}}</p>
                                    <p>Owner: {{$userWithBusinesses->first_name.' '.$userWithBusinesses->last_name}}</p>
                                </div>
                                <div class="pt-5 text-base font-semibold leading-7">
                                    <p>
                                        <a href="{{route('show_service',$business->id)}}" class="text-sky-500 transition-all duration-300 group-hover:text-white">View Business Salon
                                            &rarr;</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </main>
    </div>
    <script>
        
    </script>
</x-layout>
