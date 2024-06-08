<x-layout>
    <div class="w-full h-full grid grid-cols-[15%,1fr] gap-2 bg-[#f6f6f9]">
        <div class=" flex bg-gray-100 h-screen rounded-tr-md">
            <x-aside>

            </x-aside>
        </div>
        <main class="ml-17rem w-full">
            <h1 class="text-2xl font-semibold mt-3">User List</h1>
            <div class="bg-[#fff] p-[2rem] border w-[97%] rounded-md hover:shadow-xl transition-all mx-auto">
                <div class="table_container">
                    <x-table.table>
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <x-table.thead>
                                    First Name
                                </x-table.thead>
                                <x-table.thead>
                                    Last nNme
                                </x-table.thead>
                                <x-table.thead>
                                    Email
                                </x-table.thead>
                                <x-table.thead>
                                    User Type
                                </x-table.thead>
                                <x-table.thead>
                                    Action
                                </x-table.thead>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userList as $user)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <x-table.td>
                                    {{$user->first_name}}
                                </x-table.td>
                                <x-table.td>
                                    {{$user->last_name}}
                                </x-table.td>
                                <x-table.td>
                                    {{$user->email}}
                                </x-table.td>
                                <x-table.td class="capitalize">
                                    {{($user->user_type == 'business_admin') ? 'Business Admin' : $user->user_type }}
                                </x-table.td>
                                <x-table.td>
                                    <x-table.button-action>edit</x-table.button-action>
                                </x-table.td>
                            </tr>
                            @endforeach
                        </tbody>
                    </x-table.table>
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
