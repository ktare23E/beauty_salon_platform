<x-layout>
    <nav class="fixed top-0 right-0 left-0 z-10 flex flex-wrap items-center justify-between p-3 bg-[#e8e8e5]">
        <div class="text-xl">Beauty Salon Platform</div>
        <div class="flex md:hidden">
            <button id="hamburger">
                <img class="toggle block" src="https://img.icons8.com/fluent-systems-regular/2x/menu-squared-2.png"
                    width="40" height="40" />
                <img class="toggle hidden" src="https://img.icons8.com/fluent-systems-regular/2x/close-window.png"
                    width="40" height="40" />
            </button>
        </div>
        <div class=" toggle hidden w-full md:w-auto md:flex text-right text-bold mt-5 md:mt-0 md:border-none">
            <a href="{{route('dashboard')}}" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">Home
            </a>
            <a href="{{route('test')}}" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">Salon
            </a>
            <a href="#aboutus" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">About us
            </a>
        </div>

        <div class="toggle w-full text-end hidden md:flex md:w-auto px-2 py-2 md:rounded">
            <a href="tel:+123">
                <div class="flex justify-end items-center gap-4">
                    <a href="{{route('user_cart')}}" class="flex items-center h-10 w-30 rounded-md bg-[#c8a876] text-white font-medium p-2 gap-1 relative">
                        <!-- Heroicon name: phone -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                        Your Cart
                        <span class="cart_number absolute top-0 left-4 bg-red-600 text-white text-xs rounded-full px-1.5 py-0.5">0</span>
                    </a>
                    <div class="relative">
                        @auth
                            <div class="relative">
                                <div id="userIcon" class="cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </div>
                                <div id="userMenu" class="hidden absolute right-0 mt-3 w-32 text-start bg-white border border-gray-200 rounded-md shadow-lg z-10">
                                    <a href="{{route('user_profile')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profile</a>
                                    <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Bookings</a>
                                    <button class="block w-full px-4 py-2 text-gray-800 hover:bg-gray-100 text-start" form="logout">Logout</button>
                                    <x-forms.form action="{{route('logout')}}" method="POST" id="logout">
                                        @csrf
                                    </x-forms.form>
                                </div>
                            </div>
                        @endauth
                        @guest
                            <div class="relative">
                                <div id="userIcon" class="cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </div>
                                <div id="userMenu" class="hidden absolute right-0 mt-3 w-32 text-start bg-white border border-gray-200 rounded-md shadow-lg z-10">
                                    <a href="{{route('login')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Login</a>
                                    <a href="{{route('register.index')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Register</a>
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>
            </a>
        </div>
    </nav>
    <div class="w-full h-screen bg-cover bg-no-repeat bg-left bg-fixed flex items-center justify-around" style="background-image: url({{ asset('imgs/salon.jpg') }})">
            <div class="text-center text-white">
                @auth
                    <h1 class="text-4xl font-semibold leading-tight">
                        Welcome to Beauty Salon Platform {{auth()->user()->first_name}}
                    </h1>
                @endauth
                @guest
                    <h1 class="text-4xl font-semibold leading-tight">
                        Welcome to Beauty Salon Platform
                    </h1>
                @endguest
                <a href="{{route('test')}}" class="text-sm">Get Started</a>
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
    <script>

        $(document).ready(function() {  
            $('#userIcon').on('click', function() {
                $('#userMenu').toggleClass('hidden');
            });

            $(window).on('click', function(event) {
                if (!$(event.target).closest('#userIcon').length && !$(event.target).closest('#userMenu').length) {
                    $('#userMenu').addClass('hidden');
                }
            });

            $.ajax({
                url: "{{ route('cart_number') }}",
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    $('.cart_number').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
 
    </script>
</x-layout>
