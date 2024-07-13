<x-layout>
    <div class="w-full h-full grid grid-cols-[15%,1fr] gap-2 bg-[#f6f6f9]">
        <div class=" flex h-screen rounded-tr-md">
            <x-aside>
                
            </x-aside>
        </div>
        <main class="w-full">
            <h1 class="text-2xl font-semibold mt-3">Admin Dashboard</h1>
            <div class="analytics mt-12 w-[90%] mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div class="bg-white p-4 rounded-md shadow-md">
                        <h2 class="text-xl font-semibold">Active Requirements</h2>
                        @forelse ($requirements as $requirement)
                            <p class="text-xl ">{{$requirement->requirement_name}}</p>
                        @empty
                            <p class="text-xl ">No requirements yet.</p>
                        @endforelse
                        <a href="{{route('admin.requirement_list')}}" class="mt-2 text-blue-500 text-sm hover:underline">view details</a>
                    </div>
                    <div class="bg-white p-4 rounded-md shadow-md flex flex-col justify-between">
                        <h2 class="text-xl font-semibold">Total Salon Owner</h2>
                        <p class="text-3xl font-semibold">{{$businessAdminCount}}</p>
                        <a href="{{route('admin.user_list')}}" class="mt-2 text-blue-500 text-sm hover:underline">view details</a>
                    </div>
                    <div class="bg-white p-4 rounded-md shadow-md flex flex-col justify-between">
                        <h2 class="text-xl font-semibold">Total Client</h2>
                        <p class="text-3xl font-semibold">{{$clientCount}}</p>
                        <a href="{{route('admin.user_list')}}" class="mt-2 text-blue-500 text-sm hover:underline">view details</a>
                    </div>
                    <div class="bg-white p-4 rounded-md shadow-md flex flex-col justify-between">
                        <h2 class="text-xl font-semibold">Total Approved Salon</h2>
                        <p class="text-3xl font-semibold">{{$approvedBusinessCount}}</p>
                        <a href="{{route('admin.salon_list')}}" class="mt-2 text-blue-500 text-sm hover:underline">view details</a>
                    </div>
                    <div class="bg-white p-4 rounded-md shadow-md flex flex-col justify-between">
                        <h2 class="text-xl font-semibold">Total Pending Salon</h2>
                        <p class="text-3xl font-semibold">{{$pendingBusinessCount}}</p>
                        <a href="{{route('admin.salon_list')}}" class="mt-2 text-blue-500 text-sm hover:underline">view details</a>
                    </div>
                    <div class="bg-white p-4 rounded-md shadow-md flex flex-col justify-between">
                        <h2 class="text-xl font-semibold">Latest Approved Salon</h2>
                        @if ($latestBusinessApproved->count() > 0)
                            <p class="text-3xl font-semibold">{{$latestBusinessApproved[0]->business_name}}</p>

                        @else
                            <p class="text-md font-semibold">No approved salon yet.</p>
                        @endif
                        <a href="{{route('admin.salon_list')}}" class="mt-2 text-blue-500 text-sm hover:underline">view details</a>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
        
    </script>
</x-layout>
