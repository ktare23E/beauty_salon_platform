<x-layout>
    <x-nav>This is my Navbar</x-nav>
    
    <div class="w-[80%] mx-auto mt-1 rounded-lg">
        <div class="w-full flex items-center gap-2 mb-6 justify-end">
            <x-table.button-action>Create</x-table.button-action>
        </div>
        <x-table.table >
        
        </x-table.table>
    </div>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
    
</x-layout>
