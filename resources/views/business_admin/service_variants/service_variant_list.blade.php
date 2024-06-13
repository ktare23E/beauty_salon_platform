<x-layout>
    
    <div class="w-full h-full grid grid-cols-[15%,1fr] gap-2 bg-[#f6f6f9]">
        <div class=" flex h-screen rounded-tr-md">
            <x-aside>

            </x-aside>
        </div>
        <main class="ml-17rem w-full">
            <div class="mt-24">
                <h1 class="font-bold text-2xl">{{$service->service_name}} Variants</h1>
                <div class="w-full">
                    <a href="{{route('create_service_variant',$service->id)}}">
                        <button class="py-1 px-2  bg-black text-white rounded-sm">create variant</button>
                    </a>
                </div>
                <div class="bg-[#fff] p-[2rem] border w-[97%] rounded-md hover:shadow-xl transition-all mx-auto mt-10">
                    <div class="table_container">
                        <x-table.table id="myTable">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <x-table.thead>
                                        Service Name
                                    </x-table.thead>
                                    <x-table.thead>
                                        Description
                                    </x-table.thead>
                                    <x-table.thead>
                                        Price
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
                                @forelse ($serviceVariants as $service_variant)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <x-table.td>
                                            {{ $service_variant->name }}
                                        </x-table.td>
                                        <x-table.td>
                                            {{ $service_variant->description }}
                                        </x-table.td>
                                        <x-table.td>
                                            ₱{{ number_format($service_variant->price, 2)}}
                                        </x-table.td>
                                        <x-table.td>
                                            {{ $service_variant->status }}
                                        </x-table.td>
                                        <x-table.td>
                                            <x-table.button-action href="{{route('edit_service_variant',$service_variant->id)}}">edit</x-table.button-action>
                                        </x-table.td>
                                    </tr>
                                @empty
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td colspan="5" class="text-center py-3">No variants yet</td>
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
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
</x-layout>
