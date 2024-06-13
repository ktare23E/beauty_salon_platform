<x-layout>
    <x-nav class="">
        <div class="flex-shrink-0">
            <a href="/" class="text-md text-white">Beauty Salon Platform</a>
        </div>
        <div class="space-x-5 text-white">
            <a href="/" class="">Home</a>
            <a href="/about" class="">About</a>
            <a href="{{route('salon_try')}}" class="">Salons</a>
            <a href="/contact" class="">Contact</a>
        </div>
        <div class="space-x-4 text-white">
            <a href="{{route('login')}}" class="">Login</a>
            <a href="{{route('register.index')}}" class="">Register</a>
        </div>
    </x-nav>
    <div class="w-full h-screen bg-cover bg-no-repeat bg-left bg-fixed flex items-center justify-around" style="background-image: url({{ asset('imgs/salon.jpg') }})">
            <div class="text-center text-white">
                <h1 class="text-4xl font-semibold leading-tight">
                    Welcome to Beauty Salon Platform
                </h1>
                <a href="" class="text-sm">Get Started</a>
            </div>
            <div class="bg-gray-900 p-[0.6rem] grid grid-cols-2 gap-3 rotate-6">
                <div class="p-[0.5rem] bg-[#f6f6f6] w-64">
                    <img src="{{asset('imgs/salon2.jpg')}}" alt="" class="bg-cover">
                </div>
                <div class="p-[0.5rem] bg-[#f6f6f6] w-64">
                    <img src="{{asset('imgs/service1.jpg')}}" alt="" class="bg-cover">
                </div>
                <div class="p-[0.5rem] bg-[#f6f6f6] w-64">
                    <img src="{{asset('imgs/service2.jpg')}}" alt="" class="bg-cover">
                </div>
                <div class="p-[0.5rem] bg-[#f6f6f6] w-64">
                    <img src="{{asset('imgs/service3.jpg')}}" alt="" class="bg-cover">
                </div>
            </div>
    </div>

</x-layout>
