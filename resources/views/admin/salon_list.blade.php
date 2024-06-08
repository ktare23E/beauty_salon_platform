<x-layout>
    <div class="w-full h-full grid grid-cols-[15%,1fr] gap-2 bg-[#f6f6f9]">
        <div class=" flex bg-gray-100 h-screen rounded-tr-md">
            <x-aside>

            </x-aside>
        </div>
        <main class="ml-17rem w-full">
            <h1 class="text-2xl font-semibold mt-3">Salon</h1>
            <div class="bg-[#fff] p-[2rem] border w-[97%] rounded-md hover:shadow-xl transition-all mx-auto">
                
            </div>
        </main>
    </div>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
</x-layout>
