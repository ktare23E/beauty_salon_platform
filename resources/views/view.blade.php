<x-layout>
    <x-nav class="bg-inherit">
        <div class="flex-shrink-0">
            <a href="/" class="text-md text-white">Beauty Salon Platform</a>
        </div>
        <div class="space-x-5 text-white">
            <a href="{{route('dashboard')}}" class="">Home</a>
            <a href="{{route('test')}}" class="">About</a>
            <a href="{{route('salon_try')}}" class="">Salons</a>
            <a href="/contact" class="">Contact</a>
        </div>
        <div class="space-x-4 text-white">
            <a href="{{route('login')}}" class="">Login</a>
            <a href="{{route('register.index')}}" class="">Register</a>
        </div>
    </x-nav>
    <div class="w-full min-h-screen bg-cover bg-no-repeat bg-left bg-fixed" style="background-image: url({{ asset('imgs/salon.jpg') }})">
        
        <div class="pt-24 pb-[200px]">
            <h1 class="text-white font-semibold text-center text-6xl">Salons</h1>
            <div class="w-[85%] mx-auto grid grid-cols-3 gap-3">
                @forelse ( $salons as $salon)
                    <div class="flex px-3 py-3">
                        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
                            <img class="w-full" src="{{ asset('storage/' . $salon->business_profile) }}" alt="Sunset in the mountains">

                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
                                <p class="text-gray-700 text-base">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et
                                    perferendis eaque, exercitationem praesentium nihil.
                                </p>
                            </div>
                            <div class="px-6 py-4">
                                <a href="" class="text-blue-500 hover:underline">view</a>
                                <div class="ratings">

                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h1 class="text-white font-semibold text-center text-6xl">No Salon Existed Yet.</h1>
                @endforelse
                
                
                
                
                
            </div>
        </div>

        
    </div>

</x-layout>
