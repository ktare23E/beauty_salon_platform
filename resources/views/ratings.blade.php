<x-layout>
    <!-- nav bar section -->

    @include('components.salon-nav')
    <!-- hero seciton -->
    <div class="relative w-full h-[320px] pt-3" id="home">
        <div class="absolute inset-0 opacity-40">
            <img class="w-full h-full object-cover" src="{{ asset('storage/' . $business->business_profile) }}" alt="Sunset in the mountains">
        </div>
        <div class="absolute inset-9 flex flex-col md:flex-row items-center justify-between z-10">
            <div class="md:w-1/2 mb-4 md:mb-0">
                <h1 class="text-grey-700 font-bold text-4xl md:text-5xl leading-tight mb-2">{{$business->business_name}}</h1>
                <p class="font-bold text-xl mb-8 mt-4">One stop solution for beauty services</p>
                <a href="#contactUs"
                    class="px-6 py-3 bg-[#c8a876] text-white font-medium rounded-full hover:bg-[#c09858]  transition duration-200">Contact
                    Us</a>
            </div>
        </div>
    </div>
    
    {{-- ratings and reviews --}}
    <section class=" body-font bg-gray-100"  id="reviews">
        <div class="flex justify-center text-3xl font-bold text-gray-800 text-center py-10">
            Reviews
        </div>
        <div class="mt-5 rounded-lg shadow-lg dark:bg-gray-900 py-0 lg:py-16 antialiased">
            <div class="w-full px-12 mt-[-3rem]">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Comments({{$reviewsCount}})</h2>
                    <h2>Total Ratings: </h2>
                </div>
                <form class="mb-6">
                    <div class="grid grid-cols-[70%,25%] gap-5">
                        <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                            <label for="comment" class="sr-only">Your comment</label>
                            <textarea id="salon_review" rows="2" class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800" placeholder="Write a review..."></textarea>
                        </div>
                        <!-- Create container for dropdown rating value with design -->
                        <div class="rating flex items-center">
                            <input type="radio" id="star1" name="rating" value="1" class="hidden" />
                            <label for="star1" class="flex items-center cursor-pointer" title="1">
                                <svg class="w-6 h-6 fill-current text-gray-400 hover:text-orange-400 transition-colors duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                            </label>
                            <input type="radio" id="star2" name="rating" value="2" class="hidden" />
                            <label for="star2" class="flex items-center cursor-pointer" title="2">
                                <svg class="w-6 h-6 fill-current text-gray-400 hover:text-orange-400 transition-colors duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                            </label>
                            <input type="radio" id="star3" name="rating" value="3" class="hidden" />
                            <label for="star3" class="flex items-center cursor-pointer" title="3">
                                <svg class="w-6 h-6 fill-current text-gray-400 hover:text-orange-400 transition-colors duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                            </label>
                            <input type="radio" id="star4" name="rating" value="4" class="hidden" />
                            <label for="star4" class="flex items-center cursor-pointer" title="4">
                                <svg class="w-6 h-6 fill-current text-gray-400 hover:text-orange-400 transition-colors duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                            </label>
                            <input type="radio" id="star5" name="rating" value="5" class="hidden" />
                            <label for="star5" class="flex items-center cursor-pointer" title="5">
                                <svg class="w-6 h-6 fill-current text-gray-400 hover:text-orange-400 transition-colors duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                            </label>
                        </div>
                    </div>
                    <button type="button" class="salon_rating_btn inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Post review
                    </button>
                </form>

                <div class="flex flex-col items-start justify-center gap-3">
                    @forelse ($reviews as $review)
                        <article class="p-2 text-base bg-white rounded-lg dark:bg-gray-900 mb-2 w-[70%]">
                            <footer class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"><img class="mr-2 w-6 h-6 rounded-full" src="{{asset('imgs/default profile.png')}}" alt="Michael Gough">Anonymous</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">{{$review->date_review_entity}}</p>
                                </div>
                                <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                        <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                    </svg>
                                    <span class="sr-only">Comment settings</span>
                                </button>
                                <!-- Dropdown menu -->
        
                            </footer>
                            <div class="flex justify-between items-center">
                                <p class="text-gray-500 dark:text-gray-400">{{$review->review}}</p>
                                <img src="{{ asset('imgs/ratings/rating-' . $review->rate . '0.png') }}" alt="" class="h-5">  
                            </div>
                        </article>
                    @empty
                        <h1 class="text-2xl font-bold text-center">No Reviews Yet.</h1>
                    @endforelse
                    
                </div>
                
                
        

            </div>
        </div>
        
    </section>
    <!-- footer -->
    <section>
        <footer class="bg-gray-200 text-white py-4 px-3">
            <div class="container mx-auto flex flex-wrap items-center justify-between">
                <div class="w-full md:w-1/2 md:text-center md:mb-4 mb-8">
                    <p class="text-xs text-gray-400 md:text-sm">Copyright 2024 &copy; All Rights Reserved</p>
                </div>
                <div class="w-full md:w-1/2 md:text-center md:mb-0 mb-8">
                    <ul class="list-reset flex justify-center flex-wrap text-xs md:text-sm gap-3">
                        <li><a href="#contactUs" class="text-gray-400 hover:text-white">Contact</a></li>
                        <li class="mx-4"><a href="/privacy" class="text-gray-400 hover:text-white">Privacy
                                Policy</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </section>
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
                if (!$(event.target).closest('#userIcon').length && !$(event.target).closest('#userMenu').length) {
                    $('#userMenu').addClass('hidden');
                }
            });
        });

         //rating
        $('.rating label').click(function() {
            let rating = $(this).attr('title');
            $('#rating').val(rating);

            //change colors of stars depending on the rating
            let star = $(this).attr('title');
            let starCount = 1;
            $('.rating label').each(function() {
                if (starCount <= star) {
                    $(this).children('svg').removeClass('text-gray-400').addClass('text-orange-400');
                } else {
                    $(this).children('svg').removeClass('text-orange-400').addClass('text-gray-400');
                }
                starCount++;
            });
        });

        //university rating
    $('.salon_rating_btn').click(function() {
        let rating = $('input[name="rating"]:checked').val();
        let salon_review = $('#salon_review').val();
        let salon_id = {{$business->id}};
        
        $.ajax({
            url: "{{route('auth_salon_rating')}}",
            method: 'POST',
            data: {
                rate: rating,
                review: salon_review,
                business_id: salon_id,
                _token: "{{csrf_token()}}"
            },
            success: function(response) {

                if (response.message === 'failed') {
                    alert('You need to login to rate');
                    location.href = @json(route('login'));
                } else {
                    alert('Rating posted');
                    location.reload();
                }
            }
        });
    })
    </script>

</x-layout>
