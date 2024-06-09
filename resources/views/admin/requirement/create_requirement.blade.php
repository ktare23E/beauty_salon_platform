<x-layout>
    <div class="w-full h-full grid grid-cols-[15%,1fr] gap-2 bg-[#f6f6f9]">
        <div class=" flex  h-screen rounded-tr-md">
            <x-aside>

            </x-aside>
        </div>
        <main class="ml-17rem w-full">
            <div>
                <h1 class="text-2xl font-semibold mt-36 text-center">Create Requirement</h1>
                
                <div class="bg-[#fff] p-[2rem] border w-[50%] rounded-md hover:shadow-xl transition-all mt-3 mx-auto">
                    <div class="table_container">
                        <form class="max-w-md mx-auto" method="POST" action="{{route('admin.store_requirement')}}">
                            @csrf
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" name="requirement_name" id="requirement_name"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label for="floating_email"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Requirements Name</label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Requirement Description" required></textarea>
                                
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <label for="underline_select" class="sr-only">Status</label>
                                <select id="status" name="status" required class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                    <option selected>Choose a status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</x-layout>
