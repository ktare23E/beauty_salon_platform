<div id="reupload_modal" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 w-full h-full bg-black bg-opacity-30 backdrop-blur-sm">
    <div class="flex items-center justify-center min-h-full">
        <div class="content_container relative bg-[#fff] p-[1.8rem] rounded-md max-w-[90%] max-h-[90vh] w-[25%] h-[300px] mx-auto my-auto">
            <div class="top flex align-center justify-between border-b border-black">
                <h3 class="requirement_name font-bold font text-xl">Reupload Requirements</h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="reupload_modal">
                    <svg class="w-3 h-3" aria-hidden="true" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="student_information w-full h-full flex justify-center items-center">
                <div class="img_container w-full h-full flex flex-col justify-center items-center my-auto">
                    <div class="relative z-0 w-full mb-5 group">
                        <h1 class="requirement_name font-bold text-md"></h1>
                        <div class="max-w-xs">
                            <label for="example1" class="mb-1 block text-sm font-medium text-gray-700">Upload file</label>
                            <input name="submission_details" id="submission_details" type="file" class="mt-2 block w-full text-sm file:mr-4 file:rounded-sm file:border-0 file:bg-teal-500 file:py-1 file:px-2 file:text-sm file:font-normal file:text-white hover:file:bg-teal-700 focus:outline-none disabled:pointer-events-none disabled:opacity-60" />
                        </div>
                    </div>
                    <div>
                        <button id="upload" class="bg-black text-sm text-white font-bold py-2 px-4 rounded mt-4">Upload</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
