<x-layout>
    
    <div class="w-full h-full grid grid-cols-[15%,1fr] gap-2 bg-[#f6f6f9]">
        <div class=" flex h-screen rounded-tr-md">
            <x-aside>

            </x-aside>
        </div>
        <main class="ml-17rem w-full">

            <div class="mt-4">
                <h1 class="text-2xl font-bold">Business Salon Information</h1>
                <div class="flex items-center justify-center px-10">
                    <div class="w-full sm:w-1/2  bg-[#fff] rounded-md hover:shadow-lg transition-all">
                        <div class="flex justify-between w-full">
                            <div class="mt-10 mb-5  px-5 ">
                                <h1><span class="font-bold ">Business Name:</span> {{ $business->business_name }}</h1>
                                <h1><span class="font-bold ">Owner:</span>  {{ $business->user->first_name . ' ' . $business->user->last_name }}</h1>
                            </div>
                            <div class="mt-10 mb-5  px-5 ">
                                <h1><span class="font-bold ">Address:</span> {{ $business->address }}</h1>
                                <h1><span class="font-bold ">Contact:</span> {{ $business->contact_info}}</h1>
                            </div>
                        </div>
                        <div class="flex justify-center px-5 ">
                            <div class="border-b-2 border-gray-500 w-full"></div>
                        </div>
                        <div class="flex justify-center text-center p-5">
                            <p>"I'm Jane Hong, and I recently graduated with an advanced diploma from Smith secondary
                                school. I'm seeking an
                                internship where I can apply my skills in content creation and increase my experience in
                                digital marketing."</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-24 pb-[500px]">
                @include('components.modal.sample')
                <h1 class="font-bold text-2xl">Business Requirement Submission</h1>
                <div class="bg-[#fff] p-[2rem] border w-[97%] rounded-md hover:shadow-xl transition-all mx-auto">
                    <div class="table_container">
                        <x-table.table id="myTable">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <x-table.thead>
                                        Requirement
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
                                @forelse ($requirements as $requirement_submission)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <x-table.td>
                                            {{ $requirement_submission->requirement->requirement_name }}
                                        </x-table.td>
                                        <x-table.td class="{{ $requirement_submission->status == 'declined' ? 'text-red-500':'text-yellow-500'}}">
                                            {{ $requirement_submission->status }}
                                        </x-table.td>
                                        <x-table.td>
                                            <button class="px-2 py-1 text-white rounded-sm bg-yellow-500 text-sm font-normal" onclick='openViewModal({{$requirement_submission->id}},"view_requirement_submission")'>view</button>
                                            <button class="px-2 py-1 text-white rounded-sm bg-green-600 text-sm font-normal" onclick='updateSubmissionStatus({{$requirement_submission->id}},"approved")'>approve</button>
                                            <button class="px-2 py-1 text-white rounded-sm bg-red-600 text-sm font-normal" onclick='updateSubmissionStatus({{$requirement_submission->id}},"declined")'>decline</button>
                                        </x-table.td>
                                    </tr>
                                    <form action="{{route('update_requirement_submission',$requirement_submission->id)}}" method="POST" id="update_requirement_submission_{{ $requirement_submission->id }}">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" id="status_{{ $requirement_submission->id }}" value="">
                                    </form>
                                @empty
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td colspan="3" class="text-center py-3">No requirement submissions available</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </x-table.table>
                    </div>
                </div>
            </div>
    
        </main>
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

        closeModal('view_requirement_submission');

        function openViewModal(id,modal){
            $.ajax({
                url: "{{ url('/requirement_submission') }}/" + id,
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

        function updateSubmissionStatus(id,status){
            $('#status_' + id).val(status);
            $('#update_requirement_submission_' + id).submit();
        }

    </script>
</x-layout>
