<x-layout>
    <div class="w-full h-full grid grid-cols-[15%,1fr] gap-2 bg-[#f6f6f9]" x-data="{ open: false, imageSrc: '', menuOpen: null }">
        <div class="flex h-screen rounded-tr-md">
            @include('components.salon-aside')
        </div>
        <main class="ml-17rem w-full">
            @include('components.salon_name')
            <div class="mt-4 pb-[100px]">
                <h1 class="font-bold text-2xl">Salon Images</h1>
                
                @if ($images)
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 p-4">
                        @foreach ($images as $image)
                            <div class="group relative" x-data="{ openMenu: false }">
                                <img src="{{ asset('storage/' . $image->image_path) }}"
                                    alt="Image"
                                    class="w-full h-auto object-cover aspect-[16/9] rounded-lg transition-transform transform scale-100 group-hover:scale-105 cursor-pointer"
                                    @click="open = true; imageSrc = '{{ asset('storage/' . $image->image_path) }}'" />
                                
                                <!-- 3-dot menu -->
                                <div class="absolute top-2 right-2">
                                    <button @click="openMenu = !openMenu" class="text-white bg-black bg-opacity-50 p-2 rounded-full focus:outline-none">
                                        ...
                                    </button>
                                    <div x-show="openMenu" @click.away="openMenu = false" class="mt-2 py-2 w-48 bg-white rounded-lg shadow-xl absolute right-0 z-20">
                                        <button class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white" onclick='openEditModal({{$image->id}},"edit_image_modal")'>edit</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                    </div>
                @else
                    <h1 class="font-bold text-2xl text-center">No images yet.</h1>
                @endif
            </div>
        </main>
        @include('components.modal.edit_image')
        <!-- Modal -->
        <div x-show="open" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
            <div class="relative bg-white p-4 rounded-lg shadow-lg max-w-5xl w-full mx-4" @click.away="open = false">
                <img :src="imageSrc" alt="Expanded Image" class="w-full h-auto object-cover rounded-lg" />
                <button @click="open = false" class="absolute top-4 right-4 text-white bg-black bg-opacity-50 p-2 rounded-full">Close</button>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Listen for click events on elements with the data-modal-toggle attribute
            document.querySelectorAll('[data-modal-toggle]').forEach(function (toggleBtn) {
                toggleBtn.addEventListener('click', function () {
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

        function closeModal(modalId){
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

        closeModal('edit_image_modal');

        function openEditModal(id,modal){
            // $('.requirement_name').html(requirement);
            // $('#upload').click(function(){
            //     let formData = new FormData();
            //     formData.append('_token', "{{ csrf_token() }}");
            //     formData.append('submission_details', $('#submission_details')[0].files[0]);
            //     formData.append('requirement', requirement);
            //         $.ajax({
            //         url: "{{ url('/update_requirement_submission') }}/" + id,
            //         type: 'POST',
            //         data:formData,
            //         contentType: false,
            //         processData: false,
            //         success: function(response) {
            //             console.log(response);
            //             if(response.message == 'success'){
            //                 alert('Requirement submission updated successfully');
            //                 location.reload();
            //             }
            //         },
            //         error: function(xhr, status, error) {
            //             console.error(xhr.responseText);
            //         }
            //     });
            // });

            $('#' + modal).toggleClass('hidden');

        }
    </script>
</x-layout>
