<x-layout>

    <div class="w-full h-full grid grid-cols-[15%,1fr] gap-2 bg-[#f6f6f9]">
        <div class=" flex h-screen rounded-tr-md">
            <aside class="flex w-[12rem] max-w-xs p-4 bg-gray-800 fixed top-0 left-0 bottom-0">
                <ul class="flex flex-col w-full justify-between">
                    
                    <div class="nav_container">
                        <li class="my-px mb-10">
                            <h1 class="font-bold text-center text-white text-xl">Beauty Salon Platform</h1>
                        </li>
                        <div class="space-y-3">
                            @if(auth()->user()->user_type == 'business_admin')
                            <li class="my-px">
                                <x-nav-link :href="route('business_admin.index')" :active="request()->routeIs('business_admin.index')">
                                    <span class="flex items-center justify-center text-lg text-gray-500">
                                        <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                                <path
                                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                                </path>
                                        </svg>
                                    </span>
                                    <span class="ml-3">Dashboard</span>
                                </x-nav-link>
                            </li>
                            <li class="my-px">
                                <x-nav-link :href="route('business_admin.salon')" :active="request()->routeIs('business_admin.salon')">
                                    <span class="flex items-center justify-center text-lg text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                                        </svg>
                                    </span>
                                    <span class="ml-3">Salon</span>
                                </x-nav-link>
                            </li>
                            <li class="my-px">
                                <x-nav-link :href="route('show_service',$business->id)" :active="request()->routeIs('show_service',$business->id)">
                                    <span class="flex items-center justify-center text-lg text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                                        </svg>
                                    </span>
                                    <span class="ml-3">Service</span>
                                </x-nav-link>
                            </li>
                            <li class="my-px">
                                <x-nav-link :href="route('package_index',$business->id)" :active="request()->routeIs('package_index',$business->id)">
                                    <span class="flex items-center justify-center text-lg text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                                        </svg>
                                    </span>
                                    <span class="ml-3">Package</span>
                                </x-nav-link>
                            </li>
                            <li class="my-px">
                                <x-nav-link :href="route('client_list',$business->id)" :active="request()->routeIs('client_list',$business->id)">
                                    <span class="flex items-center justify-center text-lg text-gray-500">
                                        <svg xmlns="http://www.w3.org/2s000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                                        </svg>
                                    </span>
                                    <span class="ml-3">Client</span>
                                </x-nav-link>
                            </li>
                            <li class="my-px">
                                <x-nav-link :href="route('booking_list',$business->id)" :active="request()->routeIs('booking_list',$business->id)">
                                    <span class="flex items-center justify-center text-lg text-gray-500">
                                        <svg xmlns="http://www.w3.org/2s000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                                        </svg>
                                    </span>
                                    <span class="ml-3">Bookings</span>
                                </x-nav-link>
                            </li>
                            <li class="my-px">
                                <x-nav-link :href="route('certain_sales',$business->id)" :active="request()->routeIs('certain_sales',$business->id)">
                                    <span class="flex items-center justify-center text-lg text-gray-500">
                                        <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                            <path
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="ml-3">Sales</span>
                                </x-nav-link>
                            </li>
                        @endif
                        </div>
                    </div>
                    <div>
                        <li class="my-px">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="w-full">
                                @csrf
                                <button type="submit" class="flex flex-row items-center h-12 px-4 w-full rounded-lg text-gray-500 hover:bg-gray-700">
                                    <span class="flex items-center justify-center text-lg text-red-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                                        </svg>
                                    </span>
                                    <span class="ml-3">Logout</span>
                                </button>
                            </form>
                        </li>            
                    </div>
                </ul>
            </aside>
        </div>
        <main class="ml-17rem w-full">
            <h1 class="font-bold text-2xl">{{ $business->business_name }}</h1>
            @include('components.modal.user_transactions')
            <div class="mt-20">
                <h1 class="font-bold text-2xl">Clients</h1>
                <div class="bg-[#fff] p-[2rem] border w-[97%] rounded-md transition-all hover:shadow-2xl mx-auto">
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
        </main>
    </div>
    <script>
        $(document).ready(function() {
            $('#myTable3').DataTable();
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


    </script>
</x-layout>
