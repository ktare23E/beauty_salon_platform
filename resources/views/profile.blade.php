<x-layout>
    @include('components.customer-nav')
    <div class="bg-gray-100 min-h-screen py-8 flex items-center justify-center ">
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
                    <p><strong>Salon:</strong> {{ $business->business_name}}</p>
                    <p><strong>Total Price:</strong> ₱{{ number_format($user->latestBooking->total_price, 2) }}</p>
                    <p><strong>Booking Date:</strong> {{ \Carbon\Carbon::parse($user->latestBooking->booking_date)->format('Y-m-d') }}</p>
                    <p><strong>Status:</strong> <span class="{{$user->latestBooking->status === 'approved' ? 'text-green-500':'text-orange-500'}}">{{ $user->latestBooking->status }}</span></p>
                    <a href="{{route('user_booking_list')}}" class="text-blue-500 hover:underline">View Booking</a>
                </div>
            @else
                <h3 class="text-xl font-semibold mb-2">No Bookings Yet</h3>
            @endif
    
            <form id="editForm" class="hidden mt-4">
                <div class="mb-4">
                    <label for="firstName" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" id="first_name" name="first_name" value="{{ $user->first_name }}" class="mt-1 py-2 block border-2 border-black w-full rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="lastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" id="last_name" name="last_name" value="{{ $user->last_name }}" class="mt-1 py-2 block w-full border-2 border-black rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}" class="mt-1 block py-2 w-full border-2 border-black rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
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
