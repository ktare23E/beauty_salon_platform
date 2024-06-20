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
        </div>
    </nav>
    <div class="w-full min-h-screen bg-cover bg-no-repeat bg-left bg-fixed" style="background-image: url({{ asset('imgs/salon.jpg') }})">
        
        <div class="pt-24 pb-[200px]">
            <h1 class="text-white font-semibold text-center text-6xl">Salons</h1>
            <div class="w-[85%] mx-auto grid grid-cols-4 gap-2">
                @forelse ( $salons as $salon)
                    <div class="flex px-3 py-3 group">
                        <div class="salon_card max-w-sm rounded overflow-hidden shadow-lg bg-white transition-transform transform group-hover:scale-105">
                            <div class="h-48 overflow-hidden">
                                <img class="w-full h-full object-cover" src="{{ asset('storage/' . $salon->business_profile) }}" alt="Sunset in the mountains">
                            </div>
                            <div class="px-6 py-4 h-36 overflow-hidden">
                                <div class="font-bold text-xl mb-2 text-white">{{$salon->business_name}}</div>
                                <p class="text-white text-base "><span class="font-bold text-white">Address:</span> {{$salon->address}}</p>
                                <p class="text-white text-base"><span class="font-bold text-white">Contact:</span> {{$salon->contact_info}}</p>
                            </div>
                            <div class="px-6 py-4 h-36 overflow-hidden">
                                <div class="text-base font-bold text-white">Description:</div>
                                <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam accusamus nesciunt nobis soluta maxime aperiam quisquam repellendus quas. Rem, reiciendis.</p>
                            </div>
                            <div class="px-6 py-4">
                                <a href="{{route('view_salon',$salon->id)}}" class="text-white hover:underline bg-black py-1 px-2 rounded-sm cursor-pointer">view</a>
                                <div class="ratings"></div>
                            </div>
                        </div>
                    </div>
                
                @empty
                    <h1 class="text-white font-semibold text-center text-6xl">No Salon Existed Yet.</h1>
                @endforelse
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
        });

        $(document).ready(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 50) { // Adjust this value as needed
                    $('#nav_bar').addClass('bg-black bg-opacity-80');
                } else {
                    $('#nav_bar').removeClass('bg-black bg-opacity-80');
                }
            });
        });

             //check the cart number of this user and display it
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
    </script>
</x-layout>
