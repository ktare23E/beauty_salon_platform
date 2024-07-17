<x-layout>
    @include('components.customer-nav')
    @include('components.modal.booking_reschedule')
    <div class="bg-gray-100 min-h-screen py-8 mt-20 ">
        <div class="container mx-auto w-[70%]">
            <div class="bg-white shadow-md rounded-lg p-4">
                <div class="flex mb-4">
                    <button class="tab-button px-4 py-2 mr-2 bg-blue-500 text-white rounded" data-tab="pending">Pending
                        Bookings</button>
                    <button class="tab-button px-4 py-2 bg-gray-200 text-gray-700 rounded" data-tab="approved">Approved
                        Bookings</button>
                </div>
                <div class="tab-content">
                    <div class="tab-pane" id="pending">
                        <h2 class="text-xl font-bold mb-4">Pending Bookings</h2>
                        @forelse ($userBookingPending as $booking)
                            <div class="booking_details bg-gray-50 p-4 rounded-lg shadow-inner mb-4">
                                <div class="flex flex-wrap -mx-4">
                                    <div class="w-full md:w-1/2 px-4">
                                        <h3 class="text-lg font-semibold mb-2">User Details</h3>
                                        <p><strong>Name:</strong>{{ $userData['first_name'] . ' ' . $userData['last_name'] }}
                                        </p>
                                        <p><strong>Email:</strong>{{ $userData['email'] }}</p>

                                        <h3 class="text-lg font-semibold mt-4 mb-2">Booking Details</h3>
                                        <p><strong>Total Amount:</strong> {{ $booking->total_price }}</p>
                                        <p><strong>Date:</strong>
                                            {{ date('Y-m-d', strtotime($booking['booking_date'])) }}</p>
                                        <p><strong>Time:</strong> 14:00 pm</p>
                                    </div>
                                    <div class="w-full md:w-1/2 px-4">
                                        <h3 class="text-lg font-semibold mb-2">Services/Packages</h3>
                                        @foreach ($booking->items as $item)
                                            @if ($item->item_type == 'service_variant')
                                                <p>{{ $item->item->name }}</p>
                                            @elseif($item->item_type == 'package')
                                                <p>{{ $item->item->package_name }}</p>
                                                <div class="package_inclusion hidden" data-package-id="{{ $item->item->id }}">

                                                </div>
                                            @endif
                                        @endforeach
                                        <h3 class="text-lg font-semibold mt-4 mb-2">Business Information</h3>
                                        @if ($item->item_type == 'service_variant')
                                            <p><strong>Business Name:</strong>
                                                {{ $item->item->service->business->business_name }}</p>
                                            <p><strong>Address:</strong> {{ $item->item->service->business->address }}
                                            </p>
                                        @endif
                                        @if ($item->item_type == 'package')
                                            <div class="package_business_name1 hidden">

                                            </div>
                                            <div class="package_business_address hidden">

                                            </div>
                                        @endif
                                        <h3 class="text-lg font-semibold mt-4 mb-2">Payment Details</h3>
                                        {{-- check payments if empty --}}
                                        @if ($booking->payments->count() > 0)
                                            @foreach ($booking->payments as $payment)
                                                <p><strong>Amount:</strong> {{$payment->amount}}</p>
                                                <p><strong>Status:</strong> {{$payment->status}}</p>
                                                <p><strong>Date of Payment:</strong> @formatDate($payment->payment_date)</p>
                                            @endforeach
                                    
                                        @else
                                            No Payment Yet.
                                        @endif
                                    </div>
                                    <div class="w-full px-4 flex justify-center item-center mt-5">
                                        <div class="action_buttons space-x-1">
                                            <button
                                                class="text-sm bg-black text-white py-1 px-2 rounded-sm" onclick='rescheduleBooking({{$booking->id}},"booking_reschedule")'>reschedule</button>
                                            <button
                                                class="text-sm bg-green-500 text-white py-1 px-2 rounded-sm">pay</button>
                                                <button
                                                class="text-sm bg-red-500 text-white py-1 px-2 rounded-sm" form="cancel_booking">cancel</button>
                                        </div>
                                    </div>
                                </div>
                                <x-forms.form method="POST" id="cancel_booking" action="{{route('cancel_booking',$booking->id)}}">
                                    @csrf
                                </x-forms.form>
                            </div>
                        @empty
                            <h1>No Pending Booking</h1>
                        @endforelse
                    </div>
                    <div class="tab-pane hidden" id="approved">
                        <h2 class="text-xl font-bold mb-4">Approved Bookings</h2>
                        <!-- Approved bookings content here -->
                        @forelse ($userBookingApproved as $booking)
                            <div class="booking_details bg-gray-50 p-4 rounded-lg shadow-inner mb-4">
                                <div class="flex flex-wrap -mx-4">
                                    <div class="w-full md:w-1/2 px-4">
                                        <h3 class="text-lg font-semibold mb-2">User Details</h3>
                                        <p><strong>Name:</strong>{{ $userData['first_name'] . ' ' . $userData['last_name'] }}
                                        </p>
                                        <p><strong>Email:</strong>{{ $userData['email'] }}</p>

                                        <h3 class="text-lg font-semibold mt-4 mb-2">Booking Details</h3>
                                        <p><strong>Total Amount:</strong> {{ $booking->total_price }}</p>
                                        <p><strong>Date:</strong>
                                            {{ date('Y-m-d', strtotime($booking['booking_date'])) }}</p>
                                        <p><strong>Time:</strong> 15:00 pm</p>
                                    </div>
                                    <div class="w-full md:w-1/2 px-4">
                                        <h3 class="text-lg font-semibold mb-2">Services/Packages</h3>
                                        @foreach ($booking->items as $item)
                                            @if ($item->item_type == 'service_variant')
                                                <p>{{ $item->item->name }}</p>
                                            @elseif($item->item_type == 'package')
                                                <p>{{ $item->item->package_name }}</p>
                                                <div class="package_inclusion2 hidden" data-package-id="{{ $item->item->id }}">

                                                </div>
                                            @endif
                                        @endforeach
                                        <h3 class="text-lg font-semibold mt-4 mb-2">Business Information</h3>
                                        @if ($item->item_type == 'service_variant')
                                            <p><strong>Business Name:</strong>
                                                {{ $item->item->service->business->business_name }}</p>
                                            <p><strong>Address:</strong> {{ $item->item->service->business->address }}
                                            </p>
                                        @endif
                                        @if ($item->item_type == 'package')
                                            <div class="package_business_name2 hidden">

                                            </div>
                                            <div class="package_business_address2 hidden">

                                            </div>
                                        @endif
                                        <h3 class="text-lg font-semibold mt-4 mb-2">Payment Details</h3>
                                        @if ($booking->payments->count() > 0)
                                            @foreach ($booking->payments as $payment)
                                                <p><strong>Amount:</strong> {{ $payment->amount }}</p>
                                                <p><strong>Date of Payment:</strong> @formatDate($payment->date_of_payment)</p>
                                            @endforeach
                                        @else
                                            No Payment Yet.
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h1>No approved booking</h1>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
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
                if (!$(event.target).closest('#userIcon').length && !$(event.target).closest('#userMenu')
                    .length) {
                    $('#userMenu').addClass('hidden');
                }
            });

            $.ajax({
                url: "{{ route('cart_number') }}",
                type: 'GET',
                success: function(response) {
                    // console.log(response);
                    $('.cart_number').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });

            $('.tab-button').click(function() {
                var tabId = $(this).data('tab');
                $('.tab-button').removeClass('bg-blue-500 text-white').addClass(
                'bg-gray-200 text-gray-700');
                $(this).addClass('bg-blue-500 text-white').removeClass('bg-gray-200 text-gray-700');
                $('.tab-pane').addClass('hidden');
                $('#' + tabId).removeClass('hidden');
            });

            let data = @json($userBookingPending);
            let allServiceVariantsByPackageId2 = {};

            
            for (let key in data) {
                if (data.hasOwnProperty(key)) {  // Ensure key is a direct property of the object
                    let booking = data[key];
                    // Assuming 'items' is an array within each booking
                    booking.items.forEach(function(item) {
                        if (item.item_type == 'package') {

                            let packageId = item.item.id;
                            if (!allServiceVariantsByPackageId2[packageId]) {
                                allServiceVariantsByPackageId2[packageId] = [];
                            }

                            // Show the package business name and address
                            //loop item.item.service_variants
                            item.item.service_variants.forEach(function(service_variant) {
                                allServiceVariantsByPackageId2[packageId].push(service_variant);


                                var businessName = service_variant.service.business.business_name;
                                var $strongTag = $('<strong></strong>').text('Business Name: ');
                                var $pTag = $('<p></p>');
                                $pTag.append($strongTag);
                                $pTag.append(businessName);
                                $('.package_business_name1').removeClass('hidden').empty().append($pTag);

                                var address = service_variant.service.business.address;
                                var $strongTag2 = $('<strong></strong>').text('Address: ');
                                var $pTag2 = $('<p></p>');
                                $pTag2.append($strongTag2);
                                $pTag2.append(address);


                                $('.package_business_address').removeClass('hidden').empty().append($pTag2);

                                
                            });
                        }
                    });
                }
            }

            // Populate the package inclusions in the DOM
            $('.package_inclusion').each(function() {
                let packageId = $(this).data('packageId');  // Use camelCase here
                console.log(packageId);
                if (allServiceVariantsByPackageId2[packageId]) {
                    let ul2 = $('<ul class="pl-10 list-disc"></ul>');
                    allServiceVariantsByPackageId2[packageId].forEach(function(service_variant) {
                        let li = $('<li class="text-xs"></li>').text(service_variant.name);
                        ul2.append(li);
                    });
                    $(this).removeClass('hidden').empty().append(ul2);
                }
            });


            let data2 = @json($userBookingApproved);

            let allServiceVariantsByPackageId = {};

            
            for (let key in data2) {
                if (data2.hasOwnProperty(key)) {  // Ensure key is a direct property of the object
                    let booking = data2[key];
                    // Assuming 'items' is an array within each booking
                    booking.items.forEach(function(item) {
                        if (item.item_type == 'package') {
                            // Show the package business name and address
                            //loop item.item.service_variants
                            let packageId = item.item.id;
                            if (!allServiceVariantsByPackageId[packageId]) {
                                allServiceVariantsByPackageId[packageId] = [];
                            }

                            item.item.service_variants.forEach(function(service_variant) {
                                allServiceVariantsByPackageId[packageId].push(service_variant);

                                var businessName = service_variant.service.business.business_name;
                                var $strongTag = $('<strong></strong>').text('Business Name: ');
                                var $pTag = $('<p></p>');
                                $pTag.append($strongTag);
                                $pTag.append(businessName);

                                var address = service_variant.service.business.address;
                                var $strongTag2 = $('<strong></strong>').text('Address: ');
                                var $pTag2 = $('<p></p>');
                                $pTag2.append($strongTag2);
                                $pTag2.append(address);


                                $('.package_business_name2').removeClass('hidden').empty().append($pTag);
                                $('.package_business_address2').removeClass('hidden').empty().append($pTag2);

                            });
                        }
                    });
                }
            }


         // Populate the package inclusions in the DOM
            $('.package_inclusion2').each(function() {
                let packageId = $(this).data('packageId');  // Use camelCase here
                // console.log(packageId);
                if (allServiceVariantsByPackageId[packageId]) {
                    let ul2 = $('<ul class="pl-10 list-disc"></ul>');
                    allServiceVariantsByPackageId[packageId].forEach(function(service_variant) {
                        let li = $('<li class="text-xs"></li>').text(service_variant.name);
                        ul2.append(li);
                    });
                    $(this).removeClass('hidden').empty().append(ul2);
                }
            });
            
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

        closeModal('booking_reschedule');

        function rescheduleBooking(id,modal){
         

            $('#reschedule').click(function(){
                let date = $('#date').val();
                let time = $('#time').val();

                $.ajax({
                    url: "{{ route('reschedule_booking', '') }}/" + id,
                    type: 'POST',
                    data: {
                        id: id,
                        date: date,
                        time: time,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if(response.success === true){
                            alert(response.message);
                            location.reload();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            })

            $('#' + modal).toggleClass('hidden');

        }

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
