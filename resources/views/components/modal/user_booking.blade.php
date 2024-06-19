<div id="user_booking" class="overflow-y-auto overflow-x-hidden fixed inset-0 z-50 w-full h-full bg-black bg-opacity-30 backdrop-blur-sm ">
    <div class="flex items-center justify-center min-h-full">
        <div class="content_container relative rounded-md max-w-[90%] max-h-[90vh] w-[60%] h-[450px] mx-auto my-auto bg-gray-100 p-6">
            <div class="top flex align-center justify-between border-b border-black mb-4">
                <h3 class="requirement_name font-bold text-xl">Client Booking</h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="view_requirement_submission">
                    <svg class="w-3 h-3" aria-hidden="true" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="w-full h-[93%] grid grid-cols-[1fr,2fr] gap-4 pb-4">
                <!-- Left side (Booking Details) -->
                <div class="h-full border-r-2 border-black pr-4 ">
                    <div class="booking_details border-b-2 border-black pb-8">
                        <h4 class="font-bold mb-2">Booking Details</h4>
                        <p>Name:</p>
                        <p>Booking Date:</p>
                        <p>Total Price:</p>
                        <p>Status:</p>
                        <!-- Add more booking details as needed -->
                    </div>
                    <div class="mt-4">
                        <h4 class="font-bold mb-2">Payment Details</h4>
                        <p>Amount:</p>
                        <p>Status:</p>
                        <p>Date of Payment:</p>
                    </div>
                </div>
                <!-- Right side (Booking Items Data) -->
                <div class="pl-4 h-full flex flex-col justify-between">
                    <div>
                        <h4 class="font-bold mb-2">Booking Items</h4>
                        <p>Details about booking items go here...</p>
                        <!-- Add more booking items data as needed -->
                    </div>
                    <div class="w-full flex justify-end">
                        <div class="flex space-x-2">
                            <button type="button" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-700">Approve</button>
                            <button type="button" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Pay</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
