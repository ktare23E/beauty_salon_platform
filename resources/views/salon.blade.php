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
            <a href="#services" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">Services
            </a>
            <a href="#packages" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">Packages
            </a>
            <a href="#aboutus" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">About us
            </a>
            <a href="#gallery" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">Gallery
            </a>
            <a href="#contactUs" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">Visit Us
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
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Dashboard</a>
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Bookings</a>
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Logout</a>
                            </div>
                        </div>
                    @endauth
                    @guest
                        <div id="userMenu" class="hidden absolute right-0 mt-3 w-32 text-center bg-white border border-gray-200 rounded-md shadow-lg z-10">
                            <a href="{{route('login')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Login</a>
                            <a href="{{route('register.index')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Register</a>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <!-- hero seciton -->
    <div class="relative w-full h-[320px] pt-3" id="home">
        <div class="absolute inset-0 opacity-40">
            <img class="w-full h-full object-cover" src="{{ asset('storage/' . $business->business_profile) }}" alt="Sunset in the mountains">
        </div>
        <div class="absolute inset-9 flex flex-col md:flex-row items-center justify-between z-10">
            <div class="md:w-1/2 mb-4 md:mb-0">
                <h1 class="text-grey-700 font-bold text-4xl md:text-5xl leading-tight mb-2">{{$business->business_name}}</h1>
                <p class="font-bold text-xl mb-8 mt-4">One stop solution for beauty services</p>
                <a href="#contactUs"
                    class="px-6 py-3 bg-[#c8a876] text-white font-medium rounded-full hover:bg-[#c09858]  transition duration-200">Contact
                    Us</a>
            </div>
        </div>
    </div>

    <!-- our services section -->
    <section class="py-10" id="services">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Our Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 ">
                @forelse ($services as $service)
                    <div class="group">
                        <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform transform scale-100 group-hover:scale-105">
                            <img src="{{asset('imgs/service1.jpg')}}"
                                alt="wheat flour grinding" class="w-full h-64 object-cover ">
                            <div class="p-6 text-center">
                                <h3 class="text-xl font-medium text-gray-800 mb-2">{{$service->service_name}}</h3>
                                <p class="text-gray-700 text-base">{{$service->description}}</p>
                            </div>
                            <div class="text-center">
                                <a href="{{route('view_service',$service->id)}}" class="block text-white hover:underline bg-black py-1 px-2 rounded-sm cursor-pointer">view</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <h1 class="text-center">No Services Yet.</h1>
                @endforelse
                
                {{-- 
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
                --}}
            </div>
        </div>
    </section>

    {{-- Package --}}
    @include('components.modal.package_inclusion')
    <section class="py-10" id="packages">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Our Packages</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 ">
                @forelse ($packages as $package)
                    <div class="group">
                        <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform transform scale-100 group-hover:scale-105">
                            <img src="{{asset('imgs/service1.jpg')}}"
                                alt="wheat flour grinding" class="w-full h-64 object-cover ">
                            <div class="p-6 text-center">
                                <h3 class="text-xl font-medium text-gray-800 mb-2">{{$package->package_name}}</h3>
                                <p class="text-gray-700 text-base">{{$package->description}}</p>
                                <p class="text-gray-700 text-base">Price: ₱{{ number_format($package->price , 2)}}</p>
                            </div>
                            <div class="pb-4 text-center">
                                <button onclick='viewPackageInclusion({{$package->id}},"package_inclusion")' class="text-white hover:underline bg-black py-1 px-2 rounded-sm cursor-pointer">view</button>
                                <input type="submit" class="bg-green-500 py-1 px-4 text-center text-white rounded-sm cursor-pointer" value="Add to Cart" form="addToCart"></input>
                                <x-forms.form method="POST" action="{{route('addToCart')}}" id="addToCart">
                                    @csrf
                                    <input type="hidden" name="package_id" value="{{$package->id}}">
                                </x-forms.form>
                            </div>
                        </div>
                    </div>
                @empty
                    <h1 class="text-center">No Packages Yet.</h1>
                @endforelse
            </div>
        </div>
    </section>

    <!-- about us -->
    <section class="bg-gray-100" id="aboutus">
        <div class="container mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
                <div class="max-w-lg">
                    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">About Us</h2>
                    <p class="mt-4 text-gray-600 text-lg">
                        Bappa flour mill provides our customers with the highest quality products and services. We offer
                        a
                        wide variety of flours and spices to choose from, and we are always happy to help our customers
                        find
                        the perfect products for their needs.
                        We are committed to providing our customers with the best possible experience. We offer
                        competitive
                        prices, fast shipping, and excellent customer service. We are also happy to answer any questions
                        that our customers may have about our products or services.
                        If you are looking for a flour and spices service business that can provide you with the highest
                        quality products and services, then we are the company for you. We look forward to serving you!
                    </p>
                </div>
                <div class="mt-12 md:mt-0">
                    <img src="https://images.unsplash.com/photo-1531973576160-7125cd663d86" alt="About Us Image"
                        class="object-cover rounded-lg shadow-md">
                </div>
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
            @foreach ($images as $image)
                <div class="group relative">
                    <img src="{{ asset('storage/' . $image->image_path) }}"
                        alt="Image 1"
                        class="w-full h-auto object-cover aspect-[16/9] rounded-lg transition-transform transform scale-100 group-hover:scale-105" />
                </div>
            @endforeach
            
        </div>
    </section>

    <!-- Visit us section -->
    <section class="bg-gray-100">
        <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:py-20 lg:px-8">
            <div class="max-w-2xl lg:max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-extrabold text-gray-900" id="contactUs">Visit Our Location</h2>
                <p class="mt-3 text-lg text-gray-500">Let us serve you the best</p>
            </div>
            <div class="mt-8 lg:mt-20">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <div class="max-w-full mx-auto rounded-lg overflow-hidden">
                            <div class="border-t border-gray-200 px-6 py-4">
                                <h3 class="text-lg font-bold text-gray-900">Contact</h3>
                                <p class="mt-1 font-bold text-gray-600"><a href="tel:+123">Phone: +91
                                        123456789</a></p>
                                <a class="flex m-1" href="tel:+919823331842">
                                    <div class="flex-shrink-0">
                                        <div
                                            class="flex items-center justify-between h-10 w-30 rounded-md bg-indigo-500 text-white p-2">
                                            <!-- Heroicon name: phone -->
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                            </svg>
                                            Call now
                                        </div>
                                    </div>

                                </a>
                            </div>
                            <div class="px-6 py-4">
                                <h3 class="text-lg font-medium text-gray-900">Our Address</h3>
                                <p class="mt-1 text-gray-600">Sale galli, 60 foot road, Latur</p>
                            </div>
                            <div class="border-t border-gray-200 px-6 py-4">
                                <h3 class="text-lg font-medium text-gray-900">Hours</h3>
                                <p class="mt-1 text-gray-600">Monday - Sunday : 2pm - 9pm</p>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-lg overflow-hidden order-none sm:order-first">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63206.39949991296!2d123.70967212344421!3d8.060621128727119!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32544c586cd142a5%3A0x432227ecbe5b7109!2sTangub%20City%20Plaza!5e0!3m2!1sen!2sph!4v1718320898136!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    </div>

                </div>
            </div>
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
        });

        document.getElementById("hamburger").onclick = function toggleMenu() {
            const navToggle = document.getElementsByClassName("toggle");
            for (let i = 0; i < navToggle.length; i++) {
                navToggle.item(i).classList.toggle("hidden");
            }
        };

        document.addEventListener('DOMContentLoaded', function () {
            // Listen for click events on elements with the data-modal-toggle attribute
            document.querySelectorAll('[data-modal-toggle]').forEach(function (toggleBtn) {
                toggleBtn.addEventListener('click', function () {
                    // Get the target modal ID from the data-modal-toggle attribute
                    var target = toggleBtn.getAttribute('data-modal-toggle');
                    var modal = document.getElementById(target);

                    if (modal) {
                        // Toggle the "hidden" class on the modal
                        modal.classList.toggle('hidden');
                    }
                });
            });
        });

        function closeModal(modalId){
            document.addEventListener("DOMContentLoaded", function() {
                const modal = document.getElementById(`${modalId}`);
                modal.addEventListener('click', function(event) {
                    const modalContent = modal.querySelector('.relative');
                    if (!modalContent.contains(event.target)) {
                        modal.classList.add('hidden');
                    }
                });
            });
        }

        closeModal('package_inclusion');

        function viewPackageInclusion(id,modal){
            $.ajax({
                url: "{{ url('/package_inclusion') }}/" + id,
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    $('.package_name').html(response.data.package.package_name);

                    let formattedPackagePrice = Number(response.data.package.price).toLocaleString('en-PH', {
                            style: 'currency',
                            currency: 'PHP',
                            minimumFractionDigits: 2,
                        });
                    $('.package_price').html(formattedPackagePrice);

                    // Clear previous content or initialize an empty string if appending
                    let service_variants = response.data.service_variants;
                    let tableHtml = '';


                    service_variants.forEach(function(variant) {
                        
                        let formattedPrice = Number(variant.price).toLocaleString('en-PH', {
                            style: 'currency',
                            currency: 'PHP',
                            minimumFractionDigits: 2,
                        });

                        tableHtml += '<tr>' +
                                        '<td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4">' + variant.name + '</td>' +
                                        '<td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">' + formattedPrice + '</td>' +
                                        '</tr>';
                    });

                    // Update the HTML of the table body with all service variants
                    $('.service_variants_table tbody').html(tableHtml);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
            $('#' + modal).toggleClass('hidden');
        }

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
