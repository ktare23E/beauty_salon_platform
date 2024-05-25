

<div class="relative overflow-x-auto">
    <table class="display w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="myTable">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <x-table.thead>
                    Product
                </x-table.thead>
                <x-table.thead>
                    Color
                </x-table.thead>
                <x-table.thead>
                    Category
                </x-table.thead>
                <x-table.thead>
                    Price
                </x-table.thead>
                <x-table.thead>
                    Action
                </x-table.thead>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <x-table.td>
                    Apple MacBook Pro 17"
                </x-table.td>
                <x-table.td>
                    Silver
                </x-table.td>
                <x-table.td>
                    Laptop
                </x-table.td>
                <x-table.td>
                    $2999
                </x-table.td>
                <x-table.td>
                    <x-table.button-action>edit</x-table.button-action>
                </x-table.td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <x-table.td>
                    Microsoft Surface Pro
                </x-table.td>
                <x-table.td>
                    White
                </x-table.td>
                <x-table.td>
                    Laptop PC
                </x-table.td>
                <x-table.td>
                    $1999
                </x-table.td>
                <x-table.td>
                    <x-table.button-action>edit</x-table.button-action>
                </x-table.td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <x-table.td>
                    Magic Mouse 2
                </x-table.td>
                <x-table.td>
                    Black
                </x-table.td>
                <x-table.td>
                    Accessories
                </x-table.td>
                <x-table.td>
                    $99
                </x-table.td>
                <x-table.td>
                    <x-table.button-action class="bg-orange-500 text-sm font-normal">edit</x-table.button-action>
                </x-table.td>
            </tr>
        </tbody>
    </table>
</div>
