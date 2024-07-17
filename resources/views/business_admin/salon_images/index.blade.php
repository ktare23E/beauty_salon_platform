<x-layout>
    <div class="w-full h-full grid grid-cols-[15%,1fr] gap-2 bg-[#f6f6f9]">
        <div class=" flex h-screen rounded-tr-md">
            @include('components.salon-aside')
        </div>
        <main class="ml-17rem w-full">
            @include('components.salon_name')
            <div class="mt-24">
                <h1 class="font-bold text-2xl">Salon Images</h1>
                
                <div class="bg-[#fff] p-[2rem] border w-[97%] rounded-md transition-all hover:shadow-2xl mx-auto mt-10">
                    
                </div>
            </div>
            @include('components.modal.sample')
            @include('components.modal.reupload_requirements')
        </main>
    </div>
    
</x-layout>
