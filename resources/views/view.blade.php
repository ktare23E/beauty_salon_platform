<x-layout>
    @include('components.customer-nav')
    <div class="w-full min-h-screen bg-cover bg-no-repeat bg-left bg-fixed" style="background-image: url({{ asset('imgs/salon.jpg') }})">
        
        <div class="pt-24 pb-[200px]">
            <h1 class="text-white font-semibold text-center text-6xl">Salons</h1>
            @if($salons->count() > 0)
                <div class="w-[85%] mx-auto grid grid-cols-3 ">
                    
                        @foreach ( $salons as $salon)
                            <div class="flex px-3 py-3 group">
                                <div class="salon_card max-w-sm rounded overflow-hidden shadow-lg bg-white transition-transform transform group-hover:scale-105">
                                    <div class="h-48 overflow-hidden">
                                        <img class="w-full h-full object-cover" src="{{ asset('storage/' . $salon->business_profile) }}" alt="Sunset in the mountains">
                                    </div>
                                    <div class="px-6 py-4 h-28 overflow-hidden">
                                        <div class="flex justify-between">
                                            <div class="font-bold text-md mb-2 text-white">{{$salon->business_name}}</div>
                                            <div>
                                            @if (count($salon->reviews) > 0)
                                                <p class="text-white"><span class="font-bold">Ratings:</span> <span class="text-xl"> {{number_format($salon->reviews[0]->average_rating,1)}}</span> out of 5</p>
                                            @else
                                                <p class="text-white"><span class="font-bold">Ratings:</span> <span class="text-xl"> 0 </span>out of 5</p>
                                            @endif                                            </div>
                                        </div>
                                        <p class="text-white text-base "><span class="font-bold text-white">Address:</span> {{$salon->address}}</p>
                                        <p class="text-white text-base "><span class="font-bold text-white">Owner:</span> {{$salon->user->first_name.' '.$salon->user->last_name}}</p>
                                    </div>
                                    <div class="px-6 py-4 h-36 overflow-hidden">
                                        <div class="text-base font-bold text-white">Description:</div>
                                        <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam accusamus nesciunt nobis soluta maxime aperiam quisquam repellendus quas. Rem, reiciendis.</p>
                                    </div>
                                    <div class="px-6 py-4">
                                        <a href="{{route('view_salon',$salon->id)}}" class="text-white hover:underline bg-black py-1 px-2 rounded-sm cursor-pointer">view</a>
                                        <div class="ratings"></div>
                                    </div>
                                </div>
                            </div>
                        
                        @endforeach
                
                </div>
            @else
                <h1 class="text-center text-2xl text-white mt-12">No Salons Yet</h1>
            @endif
        </div>
    </div>
    <script>

        $(document).ready(function() {
            $('#userIcon').on('click', function() {
                $('#userMenu').toggleClass('hidden');
            });

            $(window).on('click', function(event) {
                if (!$(event.target).closest('#userIcon').length && !$(event.target).closest('#userMenu').length) {
                    $('#userMenu').addClass('hidden');
                }
            });
        });

        $(document).ready(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 50) { // Adjust this value as needed
                    $('#nav_bar').addClass('bg-black bg-opacity-80');
                } else {
                    $('#nav_bar').removeClass('bg-black bg-opacity-80');
                }
            });
        });

             //check the cart number of this user and display it
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
    </script>
</x-layout>
