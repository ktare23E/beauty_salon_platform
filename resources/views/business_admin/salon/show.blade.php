<x-layout>

    <div class="w-full h-full grid grid-cols-[15%,1fr] gap-2 bg-[#f6f6f9]">
        <div class=" flex h-screen rounded-tr-md">
            <x-aside>

            </x-aside>
        </div>
        <main class="ml-17rem w-full">
            <h1 class="font-bold text-2xl">{{ $business->business_name }}</h1>
            <div class="mt-24">
                <h1 class="font-bold text-2xl">Services</h1>
                <div class="w-full">
                    <a href="{{ route('create_service', $business->id) }}">
                        <button
                            class="py-1 px-2  rounded-sm {{ $business->status == 'pending' ? 'bg-gray-200 text-gray-500' : 'bg-black text-white' }}"
                            {{ $business->status == 'pending' ? 'disabled' : '' }}>Create Service</button>
                    </a>
                </div>
                <div class="bg-[#fff] p-[2rem] border w-[97%] rounded-md hover:shadow-xl transition-all mx-auto mt-10">
                    <div class="table_container">
                        <x-table.table id="myTable">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <x-table.thead>
                                        Service Name
                                    </x-table.thead>
                                    <x-table.thead>
                                        Description
                                    </x-table.thead>
                                    <x-table.thead>
                                        Action
                                    </x-table.thead>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($services as $service)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <x-table.td>
                                            {{ $service->service_name }}
                                        </x-table.td>
                                        <x-table.td>
                                            {{ $service->description }}
                                        </x-table.td>
                                        <x-table.td>
                                            <x-table.button-action
                                                href="{{ route('service_variant_list', $service->id) }}">view</x-table.button-action>
                                            <x-table.button-action
                                                href="{{ route('edit_service', $service->id) }}">edit</x-table.button-action>
                                        </x-table.td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </x-table.table>
                    </div>
                </div>
            </div>
            <div class="mt-24">
                <h1 class="font-bold text-2xl">Packages</h1>
                <div class="w-full">
                    <a href="{{ route('create_package', $business->id) }}">
                        <button
                            class="py-1 px-2  rounded-sm {{ $business->status == 'pending' ? 'bg-gray-200 text-gray-500' : 'bg-black text-white' }}"
                            {{ $business->status == 'pending' ? 'disabled' : '' }}>Create Packages</button>
                    </a>
                </div>
                <div class="bg-[#fff] p-[2rem] border w-[97%] rounded-md hover:shadow-xl transition-all mx-auto mt-10">
                    <div class="table_container">
                        <x-table.table id="myTable2">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <x-table.thead>
                                        Package Name
                                    </x-table.thead>
                                    <x-table.thead>
                                        Package Description
                                    </x-table.thead>
                                    <x-table.thead>
                                        Price
                                    </x-table.thead>
                                    <x-table.thead>
                                        Status
                                    </x-table.thead>
                                    <x-table.thead>
                                        Action
                                    </x-table.thead>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($packages as $package)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <x-table.td>
                                            {{ $package->package_name }}
                                        </x-table.td>
                                        <x-table.td>
                                            {{ $package->description }}
                                        </x-table.td>
                                        <x-table.td>
                                            ₱{{ number_format($package->price, 2) }}
                                        </x-table.td>
                                        <x-table.td>
                                            {{ $package->status }}
                                        </x-table.td>
                                        <x-table.td>
                                            <x-table.button-action
                                                href="{{ route('view_package', $package->id) }}">view</x-table.button-action>
                                            <x-table.button-action
                                                href="{{ route('edit_package', $package->id) }}">edit</x-table.button-action>
                                        </x-table.td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </x-table.table>
                    </div>
                </div>
            </div>
            @include('components.modal.user_transactions')
            <div class="mt-20">
                <h1 class="font-bold text-2xl">Clients</h1>
                <div class="bg-[#fff] p-[2rem] border w-[97%] rounded-md hover:shadow-xl transition-all mx-auto">
                    <div class="table_container">
                        <x-table.table id="myTable3">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <x-table.thead>
                                        First Name
                                    </x-table.thead>
                                    <x-table.thead>
                                        Last Name
                                    </x-table.thead>
                                    <x-table.thead>
                                        Email
                                    </x-table.thead>
                                    <x-table.thead>
                                        Action
                                    </x-table.thead>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr>
                                        <x-table.td>
                                            {{ $client->first_name }}
                                        </x-table.td>
                                        <x-table.td>
                                            {{ $client->last_name }}
                                        </x-table.td>
                                        <x-table.td>
                                            {{ $client->email }}
                                        </x-table.td>
                                        <x-table.td>
                                            <button
                                                onclick='viewClientTransactions({{ $client->id }},"user_transactions")'
                                                class="bg-yellow-500 py-1 px-2 text-sm rounded-sm text-white">view</button>
                                        </x-table.td>
                                    </tr>
                                @endforeach
                        </x-table.table>
                    </div>
                </div>
            </div>
            <div class="pb-[500px] mt-20">
                <h1 class="font-bold text-2xl">Bookings</h1>
                <div class="bg-[#fff] p-[2rem] border w-[97%] rounded-md hover:shadow-xl transition-all mx-auto">
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
                                        <x-table.td>
                                            {{ $booking->status }}
                                        </x-table.td>
                                        <x-table.td>
                                            ₱{{ number_format($booking->total_price, 2) }}
                                        </x-table.td>
                                        <x-table.td>
                                            {{-- <x-table.button-action href="{{route('',$booking->id)}}">view</x-table.button-action> --}}
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
            $('#myTable').DataTable();
            $('#myTable2').DataTable();
            $('#myTable3').DataTable();
            $('#myTable4').DataTable();
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

        closeModal('user_transactions');

        function viewClientTransactions(id, modal) {
            const url = `{{ route('user.transactions', ':id') }}`.replace(':id', id);

            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    let userData = response.user; // User data
                    let transactions = response.transactions; // Transactions array

                    // Clear previous data
                    $('#booking-container').empty();

                    // Loop through each transaction and generate HTML content
                    transactions.forEach(transaction => {
                        const bookingDate = new Date(transaction.booking_date);
                        const options = { year: 'numeric', month: 'long', day: 'numeric' };
                        const humanReadableDate = bookingDate.toLocaleDateString(undefined, options);
                        let hours = bookingDate.getHours();
                        let minutes = bookingDate.getMinutes();
                        const ampm = hours >= 12 ? 'PM' : 'AM';
                        hours = hours % 12;
                        hours = hours ? hours : 12; // the hour '0' should be '12'
                        minutes = minutes < 10 ? '0' + minutes : minutes;
                        const formattedTime = hours + ':' + minutes + ' ' + ampm;

                        let bookingHtml = `
                            <div class="p-8 bg-white rounded-lg shadow">
                                <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Booking Details</div>
                                <div class="booking-info mt-4">
                                    <p class="text-lg leading-tight font-medium text-black">Client Name: ${userData.first_name} ${userData.last_name}</p>
                                    <p class="text-lg leading-tight font-medium text-black">Booking Date: ${humanReadableDate} at ${formattedTime}</p>
                                    <p class="mt-2 text-gray-500">Total Price: ₱${transaction.total_price}</p>
                                </div>
                        `;

                        transaction.items.forEach(item => {
                            if (item.item_type === 'package') {
                                let packageHtml = `
                                    <div class="package mt-4">
                                        <p class="text-gray-500 font-medium">Package Name: ${item.item.package_name}</p>
                                        <p class="text-gray-500 font-medium">Package Details: ${item.item.description}</p>
                                        <button class="toggle-service-variants mt-2 text-indigo-600 hover:text-indigo-900">Show Package Inclusions</button>
                                        <div class="service-variants mt-2 hidden">
                                `;
                                item.item.service_variants.forEach(variant => {
                                    packageHtml += `
                                        <p class="text-gray-500"><span class="font-medium">${variant.name}</span>: ${variant.description}</p>
                                    `;
                                });
                                packageHtml += `</div></div>`;
                                bookingHtml += packageHtml;
                            } else if (item.item_type === 'service_variant') {
                                bookingHtml += `
                                    <div class="service-variant mt-4">
                                        <p class="text-gray-500 font-medium">Service Name: ${item.item.name}</p>
                                        <p class="text-gray-500 font-medium">Service Details: ${item.item.description}</p>
                                    </div>
                                `;
                            }
                        });

                        bookingHtml += `</div>`;
                        $('#booking-container').append(bookingHtml);
                    });

                    // Add click event for toggle buttons
                    $('.toggle-service-variants').on('click', function() {
                        $(this).next('.service-variants').toggleClass('hidden');
                        $(this).text(function(i, text) {
                            return text === "Show Package Inclusions" ? "Hide Package Inclusions" : "Show Package Inclusions";
                        });
                    });

                    // Show the modal
                    $('#' + modal).removeClass('hidden');
                }
            });
        }

        // $(document).ready(function() {
        //     $('.toggle-service-variants').on('click', function() {
        //         $(this).next('.service-variants').toggleClass('hidden');
        //         $(this).text(function(i, text) {
        //             return text === "Show Service Variants" ? "Hide Service Variants" : "Show Service Variants";
        //         });
        //     });
        // });
    </script>
</x-layout>
