<x-layout>

    <div class="w-full h-full grid grid-cols-[15%,1fr] gap-2 bg-[#f6f6f9]">
        <div class=" flex h-screen rounded-tr-md">
            @include('components.salon-aside')
        </div>
        <main class="ml-17rem w-full">
            <h1 class="font-bold text-2xl">{{ $business->business_name }}</h1>
            <div class="mt-24">
                <h1 class="font-bold text-2xl">Services</h1>
                <div class="w-full">
                    <a href="{{ route('create_service', $business->id) }}">
                        <button
                            class="py-1 px-2  rounded-sm {{ $business->status == 'pending' ? 'bg-gray-200 text-gray-500' : 'bg-black text-white' }}"
                            {{ $business->status == 'pending' ? 'disabled' : '' }}>Create Service</button>
                    </a>
                </div>
                <div class="bg-[#fff] p-[2rem] border w-[97%] rounded-md transition-all hover:shadow-2xl mx-auto mt-10">
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
                                        Action
                                    </x-table.thead>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($services as $service)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <x-table.td>
                                            {{ $service->service_name }}
                                        </x-table.td>
                                        <x-table.td>
                                            {{ $service->description }}
                                        </x-table.td>
                                        <x-table.td>
                                            <x-table.button-action
                                                href="{{ route('service_variant_list', $service->id) }}">view</x-table.button-action>
                                            <x-table.button-action
                                                href="{{ route('edit_service', $service->id) }}">edit</x-table.button-action>
                                        </x-table.td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </x-table.table>
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
