<x-layout>
    
    <div class="w-full h-full grid grid-cols-[15%,1fr] gap-2 bg-[#f6f6f9]">
        <div class=" flex h-screen rounded-tr-md">
            <x-aside>

            </x-aside>
        </div>
        <main class="ml-17rem w-full">
            <h1 class="font-bold text-2xl">{{$business->business_name}}</h1>
            <div class="mt-24">
                <h1 class="font-bold text-2xl">Services</h1>
                <div class="w-full">
                    <a href="{{route('create_service',$business->id)}}" >
                        <button class="py-1 px-2  rounded-sm {{$business->status == 'pending' ? 'bg-gray-200 text-gray-500' : 'bg-black text-white'}}" {{$business->status == 'pending' ? 'disabled' : ''}}>Create Service</button>
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
                                            <x-table.button-action href="{{route('service_variant_list',$service->id)}}">view</x-table.button-action>
                                            <x-table.button-action href="{{route('edit_service',$service->id)}}">edit</x-table.button-action>
                                        </x-table.td>
                                    </tr>
                                @empty
                             
                                @endforelse
                            </tbody>
                        </x-table.table>
                    </div>
                </div>
            </div>
            <div class="mt-24">
                <h1 class="font-bold text-2xl">Packages</h1>
                <div class="w-full">
                    <a href="{{route('create_package',$business->id)}}" >
                        <button class="py-1 px-2  rounded-sm {{$business->status == 'pending' ? 'bg-gray-200 text-gray-500' : 'bg-black text-white'}}" {{$business->status == 'pending' ? 'disabled' : ''}}>Create Packages</button>
                    </a>
                </div>
                <div class="bg-[#fff] p-[2rem] border w-[97%] rounded-md hover:shadow-xl transition-all mx-auto mt-10">
                    <div class="table_container">
                        <x-table.table id="myTable2">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <x-table.thead>
                                        Package Name
                                    </x-table.thead>
                                    <x-table.thead>
                                        Package Description
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
                                @forelse ($packages as $package)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <x-table.td>
                                            {{ $package->package_name }}
                                        </x-table.td>
                                        <x-table.td>
                                            {{ $package->description }}
                                        </x-table.td>
                                        <x-table.td>
                                            ₱{{ number_format($package->price , 2)}}
                                        </x-table.td>
                                        <x-table.td>
                                            {{ $package->status }}
                                        </x-table.td>
                                        <x-table.td>
                                            <x-table.button-action href="{{route('view_package',$package->id)}}">view</x-table.button-action>
                                            <x-table.button-action href="{{route('edit_package',$package->id)}}">edit</x-table.button-action>
                                        </x-table.td>
                                    </tr>
                                @empty
                            
                                @endforelse
                            </tbody>
                        </x-table.table>
                    </div>
                </div>
            </div>
            <div class="mt-20">
                <h1 class="font-bold text-2xl">Clients</h1>
                <div class="bg-[#fff] p-[2rem] border w-[97%] rounded-md hover:shadow-xl transition-all mx-auto">
                    <div class="table_container">
                        <x-table.table id="myTable3">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <x-table.thead>
                                        First Name
                                    </x-table.thead>
                                    <x-table.thead>
                                        Last Name
                                    </x-table.thead>
                                    <x-table.thead>
                                        Address
                                    </x-table.thead>
                                    <x-table.thead>
                                        Action
                                    </x-table.thead>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @forelse ($requirements as $requirement_submission)
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
                                @empty
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td colspan="3" class="text-center py-3">No requirement submissions available</td>
                                </tr>
                                @endforelse
                            </tbody> --}}
                        </x-table.table>
                    </div>
                </div>
            </div>
            <div class="pb-[500px] mt-20">
                <h1 class="font-bold text-2xl">Bookings</h1>
                <div class="bg-[#fff] p-[2rem] border w-[97%] rounded-md hover:shadow-xl transition-all mx-auto">
                    <div class="table_container">
                        <x-table.table id="myTable4">
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
                                {{-- @forelse ($requirements as $requirement_submission)
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
                            </tbody> --}}
                        </x-table.table>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
            $('#myTable2').DataTable();
            $('#myTable3').DataTable();
            $('#myTable4').DataTable();
        } );

    </script>
</x-layout>
