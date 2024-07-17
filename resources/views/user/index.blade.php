<x-layout>
    @include('components.customer-nav')
    <div class="w-full h-screen bg-cover bg-no-repeat bg-left bg-fixed flex items-center justify-around" style="background-image: url({{ asset('imgs/salon.jpg') }})">
            <div class="text-center text-white">
                @auth
                    <h1 class="text-4xl font-semibold leading-tight">
                        Welcome to Beauty Salon Platform {{auth()->user()->first_name}}
                    </h1>
                @endauth
                @guest
                    <h1 class="text-4xl font-semibold leading-tight">
                        Welcome to Beauty Salon Platform
                    </h1>
                @endguest
                <a href="{{route('test')}}" class="text-sm">Get Started</a>
            </div>
            <div class="bg-gray-900 p-[0.6rem] grid grid-cols-2 gap-3 rotate-6">
                <div class="p-[0.5rem] bg-[#f6f6f6] w-64 group">
                    <img src="{{asset('imgs/salon2.jpg')}}" alt="" class="bg-cover transform transition-transform duration-300 ease-in-out group-hover:scale-125">
                </div>
                <div class="p-[0.5rem] bg-[#f6f6f6] w-64 group">
                    <img src="{{asset('imgs/service1.jpg')}}" alt="" class="bg-cover transform transition-transform duration-300 ease-in-out group-hover:scale-125">
                </div>
                <div class="p-[0.5rem] bg-[#f6f6f6] w-64 group">
                    <img src="{{asset('imgs/service2.jpg')}}" alt="" class="bg-cover transform transition-transform duration-300 ease-in-out group-hover:scale-125">
                </div>
                <div class="p-[0.5rem] bg-[#f6f6f6] w-64 group">
                    <img src="{{asset('imgs/service3.jpg')}}" alt="" class="bg-cover transform transition-transform duration-300 ease-in-out group-hover:scale-125">
                </div>
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
 
    </script>
</x-layout>
