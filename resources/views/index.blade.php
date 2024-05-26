<x-layout>
    <x-nav>
        <div class="flex-shrink-0">
            <a href="/" class="text-md">Beauty Salon Platform</a>
        </div>
        <div class="space-x-5">
            <a href="/" class="">Home</a>
            <a href="/about" class="">About</a>
            <a href="/services" class="">Services</a>
            <a href="/contact" class="">Contact</a>
        </div>
        <div class="space-x-4">
            <a href="{{route('login.create')}}" class="">Login</a>
            <a href="{{route('login.store')}}" class="">Register</a>
        </div>
    </x-nav>
    <div class="diagonal-bg flex items-center justify-start min-h-screen">
        <div class="text-start leading-normal pl-40">
            <h1 class="text-4xl font-bold mb-4">Le Beauté Just For You</h1>
            <a href="" class="px-3 py-2 bg-light-pink rounded-lg font-bold">Get Started</a>
        </div>
        <img src="{{asset('imgs/model.jpg')}}" alt="" class="model rounded-xl">
    </div>
</x-layout>
