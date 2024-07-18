<x-layout>
    <div class="w-full h-full grid grid-cols-[15%,1fr] gap-2 bg-[#f6f6f9]">
        <div class=" flex  h-screen rounded-tr-md">
            <x-aside>

            </x-aside>
        </div>
        <main class="ml-17rem w-full">
            <div>
                @if(session('success'))
                    <script>
                        alert("{{ session('success') }}");
                    </script>
                @endif
                <h1 class="text-2xl font-semibold mt-3">Admin Fee</h1>
                <div class="action_buttons flex justify-end mr-12">
                    <a href="{{route('create_admin_fee')}}">
                        <button class="flex justify-between gap-1 bg-gray-950 py-1 px-2 text-white rounded-sm mt-20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            <span>Admin Fee</span>
                        </button>
                    </a>
                </div>
                <div class="bg-[#fff] p-[2rem] border w-[50%] rounded-md hover:shadow-xl transition-all mt-3 mx-auto">
                    <div class="table_container">
                        <x-table.table id="myTable">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <x-table.thead>
                                        Fee
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
                                @foreach ($fees as $fee )
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <x-table.td>
                                            {{$fee->fee}}
                                        </x-table.td>
                                        <x-table.td>
                                            {{$fee->status}}
                                        </x-table.td>
                                        <x-table.td>
                                            <x-table.button-action href="{{route('edit_fee',$fee->id)}}">edit</x-table.button-action>
                                        </x-table.td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </x-table.table>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
</x-layout>
