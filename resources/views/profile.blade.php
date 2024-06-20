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
                                    <a href="{{route('user_booking_list')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Bookings</a>
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
    <div class="bg-gray-100 h-screen py-8 flex items-center justify-center">
        <div class="user_data p-8 bg-white rounded-md w-[40%] hover:shadow-lg transition-all relative text-center">
            <div class="absolute top-4 right-4">
                <button id="editButton" class="p-2 rounded-full bg-gray-200 hover:bg-gray-300 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 text-gray-600 hover:text-gray-800">
                        <path fill-rule="evenodd" d="M13.293 3.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-10 10a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.265-1.265l1-3a1 1 0 0 1 .242-.39l10-10zM14 6l-8.5 8.5-1.5 4 4-1.5L14 6z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            <div class="overflow-hidden w-24 h-24 bg-gray-300 rounded-full mx-auto -mt-20 mb-4">
                <img src="{{ asset('imgs/default profile.png') }}" alt="Profile Image" class="w-full h-full object-cover">
            </div>
            <h2 id="userName" class="text-2xl font-semibold mb-2">{{ $user->first_name }} {{ $user->last_name }}</h2>
            <p id="userEmail" class="text-gray-600 mb-4">{{ $user->email }}</p>
            @if ($user->latestBooking)
                <div class="latest_booking p-4 bg-gray-100 rounded-md text-center">
                    <h3 class="text-xl font-semibold mb-2">Latest Booking</h3>
                    <p><strong>Salon:</strong> {{ $user->latestBooking->items[0]->item->service->business->business_name }}</p>
                    <p><strong>Total Price:</strong> ₱{{ number_format($user->latestBooking->total_price, 2) }}</p>
                    <p><strong>Booking Date:</strong> {{ \Carbon\Carbon::parse($user->latestBooking->booking_date)->format('Y-m-d') }}</p>
                    <p><strong>Status:</strong> {{ $user->latestBooking->status }}</p>
                    <a href="{{route('user_booking_list')}}" class="text-blue-500 hover:underline">View Booking</a>
                </div>
            @else
                <h3 class="text-xl font-semibold mb-2">No Bookings Yet</h3>
            @endif
    
            <form id="editForm" class="hidden mt-4">
                <div class="mb-4">
                    <label for="firstName" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" id="first_name" name="first_name" value="{{ $user->first_name }}" class="mt-1 py-2 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="lastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" id="last_name" name="last_name" value="{{ $user->last_name }}" class="mt-1 py-2 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}" class="mt-1 block py-2 w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                </div>
                <div class="flex justify-end">
                    <button type="button" id="saveButton" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Save</button>
                    <button type="button" id="cancelButton" class="ml-2 px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-100">Cancel</button>
                </div>
            </form>
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

            // Toggle between view and edit mode
            $('#editButton').click(function() {
                $('#userName, #userEmail').hide();
                $('#editForm').show();
            });

            $('#cancelButton').click(function() {
                $('#editForm').hide();
                $('#userName, #userEmail').show();
            });

            // Handle form submission (for demo purposes, adjust as per your backend logic)
            $('#saveButton').click(function() {
                var first_name = $('#first_name').val();
                var last_name = $('#last_name').val();
                var email = $('#email').val();

                // Perform AJAX request to update user details
                $.ajax({
                    url: '{{ route('update_user_details') }}', // Adjust route as per your Laravel setup
                    type: 'POST',
                    data: {
                        last_name: last_name,
                        first_name: first_name,
                        email: email,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response);
                        // Update UI with new details
                        $('#userName').text(first_name + ' ' + last_name);
                        $('#userEmail').text(email);

                        // Hide edit form and show user details
                        $('#editForm').hide();
                        $('#userName, #userEmail').show();
                    },
                    error: function(xhr) {
                        // Handle error
                        console.log(xhr.responseText);
                    }
                });
            });
        });

    </script>
</x-layout>
