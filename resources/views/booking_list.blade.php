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
            <a href="{{ route('dashboard') }}"
                class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">Home
            </a>
            <a href="{{ route('test') }}"
                class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">Salon
            </a>
            <a href="#aboutus" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">About us
            </a>
        </div>

        <div class="toggle w-full text-end hidden md:flex md:w-auto px-2 py-2 md:rounded">
            <a href="tel:+123">
                <div class="flex justify-end items-center gap-4">
                    <a href="{{ route('user_cart') }}"
                        class="flex items-center h-10 w-30 rounded-md bg-[#c8a876] text-white font-medium p-2 gap-1 relative">
                        <!-- Heroicon name: phone -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                        Your Cart
                        <span
                            class="cart_number absolute top-0 left-4 bg-red-600 text-white text-xs rounded-full px-1.5 py-0.5">0</span>
                    </a>
                    <div class="relative">
                        @auth
                            <div class="relative">
                                <div id="userIcon" class="cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </div>
                                <div id="userMenu"
                                    class="hidden absolute right-0 mt-3 w-32 text-start bg-white border border-gray-200 rounded-md shadow-lg z-10">
                                    <a href="{{route('user_profile')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profile</a>
                                    <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Bookings</a>
                                    <button class="block w-full px-4 py-2 text-gray-800 hover:bg-gray-100 text-start"
                                        form="logout">Logout</button>
                                    <x-forms.form action="{{ route('logout') }}" method="POST" id="logout">
                                        @csrf
                                    </x-forms.form>
                                </div>
                            </div>
                        @endauth
                        @guest
                            <div class="relative">
                                <div id="userIcon" class="cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </div>
                                <div id="userMenu"
                                    class="hidden absolute right-0 mt-3 w-32 text-start bg-white border border-gray-200 rounded-md shadow-lg z-10">
                                    <a href="{{ route('login') }}"
                                        class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Login</a>
                                    <a href="{{ route('register.index') }}"
                                        class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Register</a>
                                </div>
                            </div>

                        @endguest
                    </div>
                </div>
            </a>
        </div>
    </nav>
    <div class="bg-gray-100 min-h-screen py-8 mt-20 ">
        <div class="container mx-auto w-[70%]">
            <div class="bg-white shadow-md rounded-lg p-4">
                <div class="flex mb-4">
                    <button class="tab-button px-4 py-2 mr-2 bg-blue-500 text-white rounded" data-tab="pending">Pending Bookings</button>
                    <button class="tab-button px-4 py-2 bg-gray-200 text-gray-700 rounded" data-tab="approved">Approved Bookings</button>
                </div>
                <div class="tab-content">
                    <div class="tab-pane" id="pending">
                        <h2 class="text-xl font-bold mb-4">Pending Bookings</h2>
                        <!-- Pending bookings content here -->
                        <div class="booking_details bg-gray-50 p-4 rounded-lg shadow-inner mb-4">
                            <div class="flex flex-wrap -mx-4">
                                <div class="w-full md:w-1/2 px-4">
                                    <h3 class="text-lg font-semibold mb-2">User Details</h3>
                                    <p><strong>Name:</strong> John Doe</p>
                                    <p><strong>Email:</strong> john.doe@example.com</p>
                                    
                                    <h3 class="text-lg font-semibold mt-4 mb-2">Booking Details</h3>
                                    <p><strong>Date:</strong> 2024-06-25</p>
                                    <p><strong>Time:</strong> 14:00</p>
                                </div>
                                <div class="w-full md:w-1/2 px-4">
                                    <h3 class="text-lg font-semibold mb-2">Services/Packages</h3>
                                    <p>Service 1, Service 2, Package 1</p>
                                    
                                    <h3 class="text-lg font-semibold mt-4 mb-2">Business Information</h3>
                                    <p><strong>Business Name:</strong> XYZ Spa</p>
                                    <p><strong>Address:</strong> 1234 Main St, City, Country</p>
                                    
                                    <h3 class="text-lg font-semibold mt-4 mb-2">Payment Details</h3>
                                    <p><strong>Amount:</strong> $100</p>
                                    <p><strong>Status:</strong> Pending</p>
                                </div>
                                <div class="w-full px-4 flex justify-center item-center mt-5">
                                    <div class="action_buttons space-x-2">
                                        <button class="text-sm bg-black text-white py-1 px-2 rounded-sm">reschedule</button>
                                        <button class="text-sm bg-green-500 text-white py-1 px-2 rounded-sm">pay</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div class="tab-pane hidden" id="approved">
                        <h2 class="text-xl font-bold mb-4">Approved Bookings</h2>
                        <!-- Approved bookings content here -->
                        <div class="booking_details bg-gray-50 p-4 rounded-lg shadow-inner mb-4">
                            <div class="flex flex-wrap -mx-4">
                                <div class="w-full md:w-1/2 px-4">
                                    <h3 class="text-lg font-semibold mb-2">User Details</h3>
                                    <p><strong>Name:</strong> Jane Smith</p>
                                    <p><strong>Email:</strong> jane.smith@example.com</p>
                                    
                                    <h3 class="text-lg font-semibold mt-4 mb-2">Booking Details</h3>
                                    <p><strong>Date:</strong> 2024-06-26</p>
                                    <p><strong>Time:</strong> 15:00</p>
                                </div>
                                <div class="w-full md:w-1/2 px-4">
                                    <h3 class="text-lg font-semibold mb-2">Services/Packages</h3>
                                    <p>Service 3, Package 2</p>
                                    
                                    <h3 class="text-lg font-semibold mt-4 mb-2">Business Information</h3>
                                    <p><strong>Business Name:</strong> ABC Salon</p>
                                    <p><strong>Address:</strong> 5678 Market St, City, Country</p>
                                    
                                    <h3 class="text-lg font-semibold mt-4 mb-2">Payment Details</h3>
                                    <p><strong>Amount:</strong> $150</p>
                                    <p><strong>Status:</strong> Approved</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#userIcon').on('click', function() {
                $('#userMenu').toggleClass('hidden');
            });

            $(window).on('click', function(event) {
                if (!$(event.target).closest('#userIcon').length && !$(event.target).closest('#userMenu')
                    .length) {
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

            $('.tab-button').click(function() {
                var tabId = $(this).data('tab');
                $('.tab-button').removeClass('bg-blue-500 text-white').addClass('bg-gray-200 text-gray-700');
                $(this).addClass('bg-blue-500 text-white').removeClass('bg-gray-200 text-gray-700');
                $('.tab-pane').addClass('hidden');
                $('#' + tabId).removeClass('hidden');
            });
        });

        $(document).ready(function() {
            const $dateInput = $('#date');
            const $timeInput = $('#time');
            const $errorDiv = $('#error');

            // Set the min attribute to disable past dates
            const today = new Date().toISOString().split('T')[0];
            $dateInput.attr('min', today);

            $dateInput.on('change', function() {
                const selectedDate = new Date($(this).val());
                const now = new Date();

                if (selectedDate.setHours(0, 0, 0, 0) < now.setHours(0, 0, 0, 0)) {
                    $errorDiv.removeClass('hidden');
                    $(this).val('');
                } else {
                    $errorDiv.addClass('hidden');
                }
            });

            // Optional: Handle time input validation if needed
            $timeInput.on('change', function() {
                if ($dateInput.val()) {
                    const selectedDateTime = new Date(`${$dateInput.val()}T${$(this).val()}`);
                    const now = new Date();

                    if (selectedDateTime < now) {
                        $errorDiv.removeClass('hidden');
                    } else {
                        $errorDiv.addClass('hidden');
                    }
                }
            });
        });
    </script>
</x-layout>
