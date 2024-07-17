<x-layout>
    <!-- nav bar section -->
    @include('components.customer-nav')
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
    @if(session('success'))
        <div id="success-message" class="bg-green-500 py-2 px-4 rounded-md text-white text-center fixed bottom-4 right-4 flex gap-4">
            <p>{{ session('success') }}</p>
            <span class="cursor-pointer font-bold" onclick="return this.parentNode.remove()"><sup>X</sup></span>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Wait for 1 second before starting the fade-out animation
                setTimeout(function() {
                    var message = document.getElementById('success-message');
                    if (message) {
                        message.classList.add('animate-fadeOut');
                        // Remove the element from the DOM after the animation completes (1 second)
                        message.addEventListener('animationend', function() {
                            message.remove();
                        });
                    }
                }, 1000); // 1 second delay
            });
        </script>
    @endif
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
