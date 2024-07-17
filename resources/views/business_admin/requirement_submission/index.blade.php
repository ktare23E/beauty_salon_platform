<x-layout>

    <div class="w-full h-full grid grid-cols-[15%,1fr] gap-2 bg-[#f6f6f9]">
        <div class=" flex h-screen rounded-tr-md">
            @include('components.salon-aside')
        </div>
        <main class="ml-17rem w-full">
            @include('components.salon_name')
            <div class="mt-24">
                <h1 class="font-bold text-2xl">Requirement Submissions</h1>
                
                <div class="bg-[#fff] p-[2rem] border w-[97%] rounded-md transition-all hover:shadow-2xl mx-auto mt-10">
                    <div class="table_container">
                        <x-table.table id="myTable">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <x-table.thead>
                                        Requirement Name
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
                                @forelse ($requirement_submissions as $submission)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <x-table.td>
                                            {{ $submission->requirement->requirement_name }}
                                        </x-table.td>
                                        <x-table.td class="{{ $submission->status === 'pending' ? 'text-yellow-400' : ($submission->status === 'approved' ? 'text-green-500' : 'text-red-500' ) }}">
                                            {{ $submission->status }}
                                        </x-table.td>
                                        <x-table.td>
                                            <button class="cursor-pointer px-2 py-1 text-white rounded-sm bg-yellow-500 text-sm font-normal" onclick='openViewModal({{$submission->id}},"view_requirement_submission")'>view</button>      
                                            <button class="cursor-pointer px-2 py-1 rounded-sm  text-white text-sm font-normal {{$submission->status !== 'declined' ? 'bg-orange-300' : 'bg-orange-500 '}}" onclick='openEditModal({{$submission->id}},"{{$submission->requirement->requirement_name}}","reupload_modal")' {{$submission->status !== 'declined' ? 'disabled' : ''}} >edit</button>                                       
                                            {{-- <button class="py-1 px-2 bg-orange-700 text-white text-sm rounded-sm">edit</button> --}}
                                            {{-- <x-table.button-action
                                                href="{{ route('edit_service', $service->id) }}">edit</x-table.button-action> --}}
                                        </x-table.td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </x-table.table>
                    </div>
                </div>
            </div>
            @include('components.modal.sample')
            @include('components.modal.reupload_requirements')
        </main>
    </div>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
        
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

        closeModal('view_requirement_submission');

        function openViewModal(id,modal){
            $.ajax({
                url: "{{ url('/view_requirement_submission') }}/" + id,
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    let image = response.data.submission.submission_details;
                    let assetUrl = "{{ asset('storage/') }}"; // Retrieve asset URL from Blade template

                    $('.test_data').html(response.data.submission.submission_details);
                    $('.requirement_name').html(response.data.requirement.requirement_name);
                    $('.img_submission').attr('src', assetUrl + '/' + image);

                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
            $('#' + modal).toggleClass('hidden');
        }

        function openEditModal(id,requirement,modal){
            $('.requirement_name').html(requirement);
            $('#upload').click(function(){
                let formData = new FormData();
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('submission_details', $('#submission_details')[0].files[0]);
                formData.append('requirement', requirement);
                    $.ajax({
                    url: "{{ url('/update_requirement_submission') }}/" + id,
                    type: 'POST',
                    data:formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        if(response.message == 'success'){
                            alert('Requirement submission updated successfully');
                            location.reload();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            $('#' + modal).toggleClass('hidden');

        }

    </script>
</x-layout>
