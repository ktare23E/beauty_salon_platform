<x-layout>
    <div class="w-full h-full grid grid-cols-[15%,1fr] gap-2 bg-[#f6f6f9]">
        <div class=" flex h-screen rounded-tr-md">
            <x-aside>
                
            </x-aside>
        </div>
        <main class="w-full">
            <h1 class="text-2xl font-semibold mt-3">Business Admin Dashboard</h1>
            <div class="analytics mt-12 w-[90%] mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div class="bg-white p-4 rounded-md transition hover:shadow-2xl">
                        <h2 class="text-xl font-semibold">Business Owner</h2>
                        <p class="text-xl">-{{$user->first_name.' '.$user->last_name}}</p>
                    </div>
                    <div class="bg-white p-4 rounded-md transition hover:shadow-2xl">
                        <h2 class="text-xl font-semibold">Business Salon's</h2>
                        @forelse ($businesses as $business)
                            <p class="text-xl">- {{$business->business_name}}</p>
                        @empty
                            <p class="text-3xl font-semibold">No business salon yet.</p>
                        @endforelse
                        <a href="{{route('business_admin.salon')}}" class="text-blue-500 text-sm hover:underline">view details</a>
                    </div>
                    <div class="bg-white p-4 rounded-md transition hover:shadow-2xl">
                        <h2 class="text-xl font-semibold">Total Products</h2>
                        <p class="text-3xl font-semibold">100</p>
                    </div>
                    <div class="bg-white p-4 rounded-md transition hover:shadow-2xl">
                        <h2 class="text-xl font-semibold">Total Products</h2>
                        <p class="text-3xl font-semibold">100</p>
                    </div>
                    <div class="bg-white p-4 rounded-md transition hover:shadow-2xl">
                        <h2 class="text-xl font-semibold">Total Products</h2>
                        <p class="text-3xl font-semibold">100</p>
                    </div>
                    <div class="bg-white p-4 rounded-md transition hover:shadow-2xl">
                        <h2 class="text-xl font-semibold">Total Products</h2>
                        <p class="text-3xl font-semibold">100</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
        
    </script>
</x-layout>
