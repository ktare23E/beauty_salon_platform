
<x-layout>
    <div class="w-full h-full grid grid-cols-[15%,1fr] gap-2 bg-[#f6f6f9]">
        <div class=" flex bg-gray-100 h-screen rounded-tr-md">
            <x-aside>

            </x-aside>
        </div>
        <main class="ml-17rem w-full">
            
            <h1>Hello {{$business->business_name}}</h1>
            <h1>Owner: {{$business->user->first_name.' '.$business->user->last_name}}</h1>
            
        </main>
    </div>
    
</x-layout>
