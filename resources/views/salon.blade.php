<x-layout>
    <!-- nav bar section -->
    <nav class="flex flex-wrap items-center justify-between p-3 bg-[#e8e8e5]">
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
            <a href="#home" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">Home
            </a>
            <a href="#services" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">Services
            </a>
            <a href="#aboutus" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">About us
            </a>
            <a href="#gallery" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">Gallery
            </a>
            <a href="#contactUs" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">Visit Us
            </a>
        </div>

        <div class="toggle w-full text-end hidden md:flex md:w-auto px-2 py-2 md:rounded">
            <a href="tel:+123">
                <div class="flex justify-end">
                    <div class="flex items-center h-10 w-30 rounded-md bg-[#c8a876] text-white font-medium p-2">
                        <!-- Heroicon name: phone -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                        </svg>
                        Call now
                    </div>
                </div>
            </a>
        </div>

    </nav>
    <!-- hero seciton -->
    <div class="relative w-full h-[320px]" id="home">
        <div class="absolute inset-0 opacity-70">
            <img class="w-full h-full object-cover" src="{{ asset('storage/' . $business->business_profile) }}" alt="Sunset in the mountains">


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
                            <div class="pb-4 text-center">
                                <a href="{{route('view_service',$service->id)}}" class="text-white hover:underline bg-black py-1 px-2 rounded-sm cursor-pointer">view</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <h1 class="text-center">No Services Yet.</h1>
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

    {{-- Package --}}
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
                                <a href="{{route('view_service',$package->id)}}" class="text-white hover:underline bg-black py-1 px-2 rounded-sm cursor-pointer">view</a>
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
        document.getElementById("hamburger").onclick = function toggleMenu() {
            const navToggle = document.getElementsByClassName("toggle");
            for (let i = 0; i < navToggle.length; i++) {
                navToggle.item(i).classList.toggle("hidden");
            }
        };
    </script>

</x-layout>
