<x-layout>
    @include('components.customer-nav')
    <div class="bg-gray-100 h-screen py-8 mt-20">
        <div class="container mx-auto px-4">
            <h1 class="text-2xl font-semibold mb-4">Service Cart</h1>
            <div class="flex flex-col md:flex-row gap-4">
                <div class="md:w-3/4">
                    <div class="bg-white rounded-lg shadow-md p-6 mb-4">
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="text-left font-semibold">Service/Package</th>
                                    <th class="text-left font-semibold">Price</th>
                                    <th class="text-left font-semibold">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if ($userCart)
                                    @foreach ($userCart->items as $items)
                                        <tr class="border-b-2">
                                            <td class="py-4">
                                                <div class="flex items-center">
                                                    <img class="h-16 w-16 mr-4" src="https://via.placeholder.com/150"
                                                        alt="Product image">
                                                    <span class="font-semibold">
                                                        @if ($items->item->name)
                                                            {{ $items->item->name }}
                                                        @else
                                                            {{ $items->item->package_name }}
                                                        @endif
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="py-4">₱{{ number_format($items->item->price, 2) }}</td>
                                            <td class="py-4">
                                                <button class="bg-red-600 text-white text-sm py-1 px-2 rounded-sm"
                                                    form="remove_cart_item">remove</button>
                                            </td>
                                        </tr>
                                        <x-forms.form method="POST" action="{{ route('remove_cart_item', $items->id) }}"
                                            id="remove_cart_item">
                                            @method('DELETE')
                                            @csrf
                                        </x-forms.form>
                                    @endforeach
                                @else
                                    <tr col="3" class="text-center">
                                        <td>No items in the cart</td>
                                    </tr>
                                @endif

                                <!-- More product rows -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="md:w-1/4">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-lg font-semibold mb-4">Summary</h2>
                        <x-forms.form method="POST" action="{{route('booking')}}">
                            @csrf
                            @if ($userCart)
                                @foreach ($userCart->items as $items)
                                    <div class="flex justify-between mb-2">
                                        <span>
                                            @if ($items->item->name)
                                                <input type="hidden" name="items[{{ $loop->index }}][id]" value="{{ $items->item->id }}">
                                                <input type="hidden" name="items[{{ $loop->index }}][type]" value="service_variant">
                                                {{ $items->item->name }}
                                            @else
                                                <input type="hidden" name="items[{{ $loop->index }}][id]" value="{{ $items->item->id }}">
                                                <input type="hidden" name="items[{{ $loop->index }}][type]" value="package">
                                                {{ $items->item->package_name }}
                                            @endif
                                        </span>
                                        <span>₱{{ number_format($items->item->price, 2) }}</span>
                                    </div>
                                @endforeach
                                @if($admin_fee)
                                    <div class="flex justify-between mb-2">
                                        <span>Admin Fee</span>
                                        <span>{{$admin_fee->first()->fee}}%</span>
                                    </div>
                                @endif
                            @else
                                <div class="flex justify-between mb-2">
                                    <span>Subtotal</span>
                                    <span>₱0.00</span>
                                </div>
                            @endif
                            <hr class="my-2">
                            <div class="flex justify-between mb-2">
                                <span class="font-semibold">Total</span>
                                <input type="hidden" name="total_price" id="total_price" value="{{$totalPrice}}">
                                <span class="font-semibold"> ₱{{ number_format($totalPrice, 2) }}</span>
                            </div>
                            <div class="bg-white p-6 rounded shadow-lg">
                                <label for="datetime" class="block text-gray-700 text-sm font-bold mb-2">Select Date
                                    and Time:</label>
                                <input id="date" type="date" name="date"
                                    class="block w-full mt-1 p-2 border border-gray-300 rounded" min="{{ now()->toDateString() }}"  required>
                                <input id="time" type="time" name="time"
                                    class="block w-full mt-1 p-2 border border-gray-300 rounded" required>
                                <div id="error" class="text-red-500 text-sm mt-2 hidden">Please select a future
                                    date and time.</div>
                            </div>
                            <button class="bg-blue-500 text-white py-2 px-4 rounded-lg mt-4 w-full" type="submit"     @if(is_null($userCart) || $userCart->items->isEmpty()) disabled @endif>
                                Checkout</button>
                        </x-forms.form>
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
                    console.log(response);
                    $('.cart_number').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
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
