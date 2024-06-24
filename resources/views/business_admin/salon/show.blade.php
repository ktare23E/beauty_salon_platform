<x-layout>

    <div class="w-full h-full grid grid-cols-[15%,1fr] gap-2 bg-[#f6f6f9]">
        <div class=" flex h-screen rounded-tr-md">
            <x-aside>

            </x-aside>
        </div>
        <main class="ml-17rem w-full">
            <h1 class="font-bold text-2xl">{{ $business->business_name }}</h1>
            
            
            
            
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

       

    </script>
</x-layout>
