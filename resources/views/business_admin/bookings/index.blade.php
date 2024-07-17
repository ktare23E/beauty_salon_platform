<x-layout>

    <div class="w-full h-full grid grid-cols-[15%,1fr] gap-2 bg-[#f6f6f9]">
        <div class=" flex h-screen rounded-tr-md">
            @include('components.salon-aside')

        </div>
        <main class="ml-17rem w-full">
            @include('components.salon_name')
            @include('components.modal.user_booking')
            <div class="mt-20">
                <h1 class="font-bold text-2xl">Bookings</h1>
                <div class="bg-[#fff] p-[2rem] border w-[97%] rounded-md transition-all hover:shadow-2xl mx-auto">
                    <div class="table_container">
                        <x-table.table id="myTable4">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <x-table.thead>
                                        Client Name
                                    </x-table.thead>
                                    <x-table.thead>
                                        Status
                                    </x-table.thead>
                                    <x-table.thead>
                                        Total Price
                                    </x-table.thead>
                                    <x-table.thead>
                                        Date And Time
                                    </x-table.thead>
                                    <x-table.thead>
                                        Action
                                    </x-table.thead>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <x-table.td>
                                            {{ $booking->user->first_name }} {{ $booking->user->last_name }}
                                        </x-table.td>
                                        <x-table.td class="text-green-500">
                                            {{ $booking->status }}
                                        </x-table.td>
                                        <x-table.td>
                                            ₱{{ number_format($booking->total_price, 2) }}
                                        </x-table.td>
                                        <x-table.td>
                                            @formatDate($booking->booking_date)
                                        </x-table.td>
                                        <x-table.td>
                                            <button class="bg-yellow-500 py-1 px-2 text-sm rounded-sm text-white" onclick='viewBooking({{$booking->id}},"user_booking")'>view</button>
                                        </x-table.td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </x-table.table>
                    </div>
                </div>
            </div>
            <div class="mt-20">
                <h1 class="font-bold text-2xl">Pending Bookings</h1>
                <div class="bg-[#fff] p-[2rem] border w-[97%] rounded-md transition-all hover:shadow-2xl mx-auto">
                    <div class="table_container">
                        <x-table.table id="myTable5">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <x-table.thead>
                                        Client Name
                                    </x-table.thead>
                                    <x-table.thead>
                                        Status
                                    </x-table.thead>
                                    <x-table.thead>
                                        Total Price
                                    </x-table.thead>
                                    <x-table.thead>
                                        Date And Time
                                    </x-table.thead>
                                    <x-table.thead>
                                        Action
                                    </x-table.thead>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pendingBookings as $booking)
                                    <tr>
                                        <x-table.td>
                                            {{ $booking->user->first_name }} {{ $booking->user->last_name }}
                                        </x-table.td>
                                        <x-table.td class="text-orange-500">
                                            {{ $booking->status }}
                                        </x-table.td>
                                        <x-table.td>
                                            ₱{{ number_format($booking->total_price, 2) }}
                                        </x-table.td>
                                        <x-table.td>
                                            @formatDate($booking->booking_date)
                                        </x-table.td>
                                        <x-table.td>
                                            <button class="bg-yellow-500 py-1 px-2 text-sm rounded-sm text-white" onclick='viewBooking({{$booking->id}},"user_booking")'>view</button>
                                        </x-table.td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </x-table.table>
                    </div>
                </div>
            </div>
            <div class="pb-[500px] mt-20">
                <h1 class="font-bold text-2xl">Approved Bookings of {{$currentDate}}</h1>
                <div class="bg-[#fff] p-[2rem] border w-[97%] rounded-md transition-all hover:shadow-2xl mx-auto">
                    <div class="table_container">
                        <x-table.table id="myTable6">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <x-table.thead>
                                        Client Name
                                    </x-table.thead>
                                    <x-table.thead>
                                        Status
                                    </x-table.thead>
                                    <x-table.thead>
                                        Total Price
                                    </x-table.thead>
                                    <x-table.thead>
                                        Date And Time
                                    </x-table.thead>
                                    <x-table.thead>
                                        Action
                                    </x-table.thead>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($approvedBookingsToday as $booking)
                                    <tr>
                                        <x-table.td>
                                            {{ $booking->user->first_name }} {{ $booking->user->last_name }}
                                        </x-table.td>
                                        <x-table.td class="text-green-500">
                                            {{ $booking->status }}
                                        </x-table.td>
                                        <x-table.td>
                                            ₱{{ number_format($booking->total_price, 2) }}
                                        </x-table.td>
                                        <x-table.td>
                                            @formatDate($booking->booking_date)
                                        </x-table.td>
                                        <x-table.td>
                                            <button class="bg-yellow-500 py-1 px-2 text-sm rounded-sm text-white" onclick='viewBooking({{$booking->id}},"user_booking")'>view</button>
                                        </x-table.td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </x-table.table>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
        $(document).ready(function() {
            $('#myTable4').DataTable();
            $('#myTable5').DataTable();
            $('#myTable6').DataTable();
        });
        
        document.addEventListener('DOMContentLoaded', function() {
            // Listen for click events on elements with the data-modal-toggle attribute
            document.querySelectorAll('[data-modal-toggle]').forEach(function(toggleBtn) {
                toggleBtn.addEventListener('click', function() {
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

        function closeModal(modalId) {
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

        closeModal('user_booking');


        function viewBooking(id, modal) {
        const url = `{{ route('client_booking', ':id') }}`.replace(':id', id);
        
        $('.approve').click(function(){
            $.ajax({
                url: `{{ route('approve_booking', ':id') }}`.replace(':id', id),
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response);
                    if(response.message == 'Booking approved successfully') {
                        alert('Booking approved successfully!');
                        location.reload();
                    }
                }
            });
        });

        $.ajax({
            url: url,
            method: 'GET',
            success: function(response) {
                let bookingData = response.booking;
                let userData = response.user;

                if(id == bookingData.id && bookingData.status == 'approved') {
                    $('.booking_actions').addClass('hidden');
                }else{
                    $('.booking_actions').removeClass('hidden');
                }

                // Format the booking date
                let bookingDate = new Date(bookingData.booking_date);
                let options = { year: 'numeric', month: 'long', day: 'numeric' };
                let formattedBookingDate = bookingDate.toLocaleDateString(undefined, options);
                let formattedTotalPrice = new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(bookingData.total_price);
                let bookingTime = bookingDate.toLocaleTimeString(undefined, { hour: 'numeric', minute: 'numeric', hour12: true });

                // Populate booking details
                $('#client-name').html(`<strong>Name:</strong> ${userData.first_name} ${userData.last_name}`);
                $('#booking-date').html(`<strong>Booking Date:</strong> ${formattedBookingDate} at ${bookingTime}`);
                $('#total-price').html(`<strong>Total Price:</strong> ${formattedTotalPrice}`);
                $('#status').html(`<strong>Status:</strong> <span class="${bookingData.status  == 'pending' ? 'text-yellow-500' : 'text-green-500'}">${bookingData.status}</span>`);

                // Populate payment details
                let paymentDetails = $('#payment-details');
                paymentDetails.empty();
                if (bookingData.payments.length === 0) {
                    paymentDetails.append('<p>No Payment Yet.</p>');
                } else {
                    bookingData.payments.forEach(payment => {
                        let paymentDate = new Date(payment.payment_date);
                        let formattedPaymentDate = paymentDate.toLocaleDateString(undefined, options);
                        let formattedPaymentAmount = new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(payment.amount);

                        paymentDetails.append(`
                            <p class="mb-1"><strong>Amount:</strong> ${formattedPaymentAmount}</p>
                            <p class="mb-1"><strong>Status:</strong> ${payment.status}</p>
                            <p class="mb-1"><strong>Date of Payment:</strong> ${formattedPaymentDate}</p>
                        `);
                    });
                }

                // Populate booking items
                let bookingItems = $('#booking-items');
                bookingItems.empty();
                bookingData.items.forEach(item => {
                    if (item.item_type === 'service_variant') {
                        bookingItems.append(`
                            <div>
                                <p class="mb-1"><strong>Service:</strong> ${item.item.name}</p>
                            </div>
                        `);
                    } else if (item.item_type === 'package') {
                        let packageHTML = `
                            <div>
                                <p class="mb-1"><strong>Package:</strong> ${item.item.package_name}</p>
                                <div class="pl-4">
                                    ${item.item.service_variants.map(variant => `
                                        <div>
                                            <p class="mb-1"><strong>&gt; Service:</strong> ${variant.name}</p>
                                        </div>
                                    `).join('')}
                                </div>
                            </div>
                        `;
                        bookingItems.append(packageHTML);
                    }
                });

                $('#' + modal).toggleClass('hidden');
            }
        });
        }


    </script>
</x-layout>
