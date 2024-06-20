<x-layout>
    <!-- nav bar section -->
    <nav class="fixed top-0 right-0 left-0 z-10 flex flex-wrap items-center justify-between p-3 bg-[#e8e8e5]">
        <div class="text-xl">{{$business->business_name}}</div>
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
            <a href="#services" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">Services
            </a>
            </a>
            <a href="#gallery" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">Gallery
            </a>
        </div>

        <div class="toggle w-full text-end hidden md:flex md:w-auto px-2 py-2 md:rounded">
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
        </div>
    </nav>
    <!-- hero seciton -->
    <div class="relative w-full h-[320px]" id="home">
        <div class="absolute inset-0 opacity-70">
            <img src="{{asset('imgs/service1.jpg')}}"
                alt="Background Image" class="object-cover object-center w-full h-full" />

        </div>
        <div class="absolute inset-9 flex flex-col md:flex-row items-center justify-between">
            <div class="md:w-1/2 mb-4 md:mb-0">
                <h1 class="text-grey-700 font-medium text-4xl md:text-5xl leading-tight mb-2">{{$business->business_name}}</h1>
                <p class="font-regular text-xl mb-8 mt-4">One stop solution for flour grinding services</p>
                <a href="#contactUs"
                    class="px-6 py-3 bg-[#c8a876] text-white font-medium rounded-full hover:bg-[#c09858]  transition duration-200">Contact
                    Us</a>
            </div>
        </div>
    </div>

    <button type="button" class="back_button mt-12 ml-5 flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
        <svg class="w-5 h-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
        </svg>
        <span>Go back</span>
    </button>
    <!-- our services section -->
    <section class="py-10" id="services">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">{{$service->service_name}} Variants</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 ">
                @forelse ($service_variants as $service_variant)
                    <div class="group">
                        <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform transform scale-100 group-hover:scale-105">
                            <img src="{{asset('imgs/service1.jpg')}}"
                                alt="wheat flour grinding" class="w-full h-64 object-cover ">
                            <div class="p-6 text-center">
                                <h3 class="text-xl font-medium text-gray-800 mb-2">{{$service_variant->name}}</h3>
                                <p class="text-gray-700 text-base">{{$service_variant->description}}</p>
                                <p class="text-gray-700 text-base">Price: ₱{{ number_format($service_variant->price , 2)}}</p>
                            </div>
                            <div class="pb- text-center">
                                <input type="submit" class="block w-full bg-green-500 py-1 px-4 text-center text-white rounded-sm" value="Add to Cart" form="addToCart"></input>
                                <x-forms.form method="POST" action="{{route('addToCart')}}" id="addToCart">
                                    @csrf
                                    <input type="hidden" name="service_variant_id" id="service_variant_id" value="{{$service_variant->id}}">
                                </x-forms.form>
                            </div>
                        </div>
                    </div>
                @empty
                    <h1 class="text-center">No {{$service->service_name}} variant Yet.</h1>
                @endforelse
                
                {{-- <div class="group">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform transform scale-100 group-hover:scale-105">
                        <img src="https://images.unsplash.com/photo-1606854428728-5fe3eea23475?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Z3JhbSUyMGZsb3VyfGVufDB8fDB8fHww"
                            alt="Coffee" class="w-full h-64 object-cover">
                        <div class="p-6 text-center">
                            <h3 class="text-xl font-medium text-gray-800 mb-2">Gram Flour Grinding</h3>
                            <p class="text-gray-700 text-base">Our gram flour is perfect for a variety of uses, including
                                baking, cooking, and making snacks. It is also a good source of protein and fiber.Our gram
                                flour
                                grinding service is a convenient and affordable way to get the freshest gram flour possible.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="group">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform transform scale-100 group-hover:scale-105">
                        <img src="https://image2.jdomni.in/banner/13062021/D2/99/0D/48D7F4AFC48C041DC8D80432E9_1623562146900.png?output-format=webp"
                            alt="Coffee" class="w-full h-64 object-cover">
                        <div class="p-6 text-center">
                            <h3 class="text-xl font-medium text-gray-800 mb-2">Jowar Flour Grinding</h3>
                            <p class="text-gray-700 text-base">Our jowar grinding service is a convenient and affordable way
                                to
                                get fresh, high-quality jowar flour. We use state-of-the-art equipment to grind jowar into a
                                fine powder, which is perfect for making roti, bread, and other dishes.
                            <details>
                                <summary>Read More</summary>
                                <p>Our jowar flour is also
                                    a good source of protein and fiber, making it a healthy choice for your family.</p>
                            </details>
                            </p>
    
                        </div>
                    </div>
                </div>
                <div class="group">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform transform scale-100 group-hover:scale-105">
                        <img src="https://images.unsplash.com/photo-1607672632458-9eb56696346b?q=80&w=1914&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="Coffee" class="w-full h-64 object-cover">
                        <div class="p-6 text-center">
                            <h3 class="text-xl font-medium text-gray-800 mb-2">Chilli pounding</h3>
                            <p class="text-gray-700 text-base">We specializes in the production of high-quality chili
                                powder.
                                Our chili powder is made from the finest, freshest chilies, and we use traditional pounding
                                methods to ensure that our chili powder retains its full flavor and aroma.
                            <details>
                                <summary>Read More</summary>
                                <p> We offer a variety of chili powder products, including mild, medium, and hot. We also
                                    offer
                                    custom blends to meet the specific needs of our customers.</p>
                            </details>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="group">
                        <!-- special card -->
                    <div
                        class="bg-white rounded-lg bg-gradient-to-tr from-pink-300 to-blue-300 p-0.5 shadow-lg overflow-hidden min-h-full transition-transform transform scale-100 group-hover:scale-105">
                        <div class="text-center text-white font-medium">Special product</div>
                        <img src="https://images.unsplash.com/photo-1556910110-a5a63dfd393c?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8cmF3JTIwc3BhZ2hldHRpfGVufDB8fDB8fHww"
                            alt="Coffee" class="w-full h-64 object-cover rounded-t-lg">
                        <div class="p-6 bg-white text-center rounded-b-lg md:min-h-full">
                            <h3 class="text-xl font-medium text-gray-800 mb-2">Flavoured Spaghetti</h3>
                            <p class="text-gray-700 text-base"><span class="font-medium underline">Our speciality is</span>
                                Bappa Flour Mill offers a variety of flavored spaghetti dishes that are sure to tantalize
                                your
                                taste
                                buds. We use only the freshest ingredients Our
                                flavors include: Mango, spinach
                            </p>
                        </div>
                    </div>
                </div>
                <div class="group">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform transform scale-100 group-hover:scale-105">
                        <img src="https://media.istockphoto.com/id/1265641298/photo/fried-papad.jpg?s=612x612&w=0&k=20&c=e_iEy4CTvU6Thn02zGgKt_TiSYAheCKmgfTF5j52ovU="
                            alt="papad" class="w-full h-64 object-cover">
                        <div class="p-6 text-center">
                            <h3 class="text-xl font-medium text-gray-800 mb-2">Rice Papad</h3>
                            <p class="text-gray-700 text-base">Our company produces high-quality rice papad that is made
                                with
                                the finest ingredients. We use traditional methods to make our papad, which gives it a
                                unique
                                flavor and texture. Our papad is also gluten-free and vegan.
                            <details>
                                <summary>Read More</summary>
                                <p> We offer a variety of rice papad flavors, including plain, salted, spicy, and flavored.
                                    We
                                    also
                                    offer a variety of sizes and shapes to choose from. Our papad is available in bulk or in
                                    individual packages.</p>
                            </details>
                            </p>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    

    <!-- why us  -->
    <section class="text-gray-700 body-font mt-10">
        <div class="flex justify-center text-3xl font-bold text-gray-800 text-center">
            Why Us?
        </div>
        <div class="container px-5 py-12 mx-auto">
            <div class="flex flex-wrap text-center justify-center">
                {{-- <div class="p-4 md:w-1/4 sm:w-1/2">
                    <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                        <div class="flex justify-center">
                            <img src="https://image3.jdomni.in/banner/13062021/58/97/7C/E53960D1295621EFCB5B13F335_1623567851299.png?output-format=webp"
                                class="w-32 mb-3">
                        </div>
                        <h2 class="title-font font-regular text-2xl text-gray-900">Latest Milling Machinery</h2>
                    </div>
                </div> --}}

                <div class="p-4 md:w-1/4 sm:w-1/2">
                    <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                        <div class="flex justify-center">
                            <img src="https://image2.jdomni.in/banner/13062021/3E/57/E8/1D6E23DD7E12571705CAC761E7_1623567977295.png?output-format=webp"
                                class="w-32 mb-3">
                        </div>
                        <h2 class="title-font font-regular text-2xl text-gray-900">Reasonable Rates</h2>
                    </div>
                </div>

                <div class="p-4 md:w-1/4 sm:w-1/2">
                    <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                        <div class="flex justify-center">
                            <img src="https://image3.jdomni.in/banner/13062021/16/7E/7E/5A9920439E52EF309F27B43EEB_1623568010437.png?output-format=webp"
                                class="w-32 mb-3">
                        </div>
                        <h2 class="title-font font-regular text-2xl text-gray-900">Time Efficiency</h2>
                    </div>
                </div>

                <div class="p-4 md:w-1/4 sm:w-1/2">
                    <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                        <div class="flex justify-center">
                            <img src="https://image3.jdomni.in/banner/13062021/EB/99/EE/8B46027500E987A5142ECC1CE1_1623567959360.png?output-format=webp"
                                class="w-32 mb-3">
                        </div>
                        <h2 class="title-font font-regular text-2xl text-gray-900">Expertise in Industry</h2>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- gallery -->
    <section class="text-gray-700 body-font" id="gallery">
        <div class="flex justify-center text-3xl font-bold text-gray-800 text-center py-10">
            Gallery
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 p-4">
            @forelse ($service_images as $image )
                <div class="group relative">
                    <img src="{{ asset('' . $image->path) }}"
                        alt="Image 1"
                        class="w-full h-auto object-cover aspect-[16/9] rounded-lg transition-transform transform scale-100 group-hover:scale-105" />
                </div>
            @empty
                <h1>No images yet.</h1>
            @endforelse
            
        </div>
    </section>

    
    <!-- footer -->
    <section>
        <footer class="bg-gray-200 text-white py-4 px-3">
            <div class="container mx-auto flex flex-wrap items-center justify-between">
                <div class="w-full md:w-1/2 md:text-center md:mb-4 mb-8">
                    <p class="text-xs text-gray-400 md:text-sm">Copyright 2024 &copy; All Rights Reserved</p>
                </div>
                <div class="w-full md:w-1/2 md:text-center md:mb-0 mb-8">
                    <ul class="list-reset flex justify-center flex-wrap text-xs md:text-sm gap-3">
                        <li><a href="#contactUs" class="text-gray-400 hover:text-white">Contact</a></li>
                        <li class="mx-4"><a href="/privacy" class="text-gray-400 hover:text-white">Privacy
                                Policy</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </section>

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
        
        document.getElementById("hamburger").onclick = function toggleMenu() {
            const navToggle = document.getElementsByClassName("toggle");
            for (let i = 0; i < navToggle.length; i++) {
                navToggle.item(i).classList.toggle("hidden");
            }
        };
        
        $('.back_button').click(function(){
            window.location.href = "{{ route('view_salon', $business->id) }}";
        });

        $('.add_to_cart').click(function(){
            let service_variant_id = $(this).attr('service_variant_id');
            
        });
    </script>

</x-layout>
