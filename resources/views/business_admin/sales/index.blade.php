<x-layout>
    <div class="w-full h-full grid grid-cols-[15%,1fr] gap-2 bg-[#f6f6f9]">
        <div class=" flex h-screen rounded-tr-md">
            <x-aside>

            </x-aside>
        </div>
        <main class="w-full">
            <h1 class="text-2xl font-semibold mt-3">Sales</h1>
            @include('components.modal.edit_business')
            <div class="w-full flex gap-3">
                @foreach ($user->businesses as $business)
                    <div class="relative flex min-h-screen flex-col justify-start items-start overflow-hidden sm:py-12">
                        <div
                            class="group relative cursor-pointer overflow-hidden bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:mx-auto sm:max-w-sm sm:rounded-lg sm:px-10 h-64">
                            <div
                                class="absolute top-0 left-0 w-full h-full bg-sky-500 transition-all duration-300 transform origin-top-left scale-x-0 scale-y-0 group-hover:scale-x-100 group-hover:scale-y-100">
                            </div>
                            {{-- <div class="absolute top-2 right-2 z-20">
                                <button onclick='editBusiness({{$business->id}},"{{$business->business_name}}","{{$business->address}}","{{$business->contact_info}}","{{$business->status}}","edit_business")'
                                    class="text-gray-400 hover:text-gray-600 transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.232 5.232l3.536 3.536m-2.036-2.036a2.5 2.5 0 11-3.536-3.536l-7.5 7.5a2 2 0 00-.586 1.414V17h4.586a2 2 0 001.414-.586l7.5-7.5z" />
                                    </svg>
                                </button>
                            </div> --}}
                            <div class="relative z-10 mx-auto max-w-md">
                                <div
                                    class="space-y-1 pt-5 text-base leading-7 text-gray-600 transition-all duration-300 group-hover:text-white/90">
                                    <p class="font-bold">{{ $business->business_name }}</p>
                                    <p>Owner: {{ $user->first_name . ' ' . $user->last_name }}
                                    </p>
                                    <p class="truncate">Business Address: {{ $business->address }}
                                    </p>
                                    <p>Business Status: <span class="{{ $business->status == 'approved' ? 'text-green-500':'text-orange-500'}}">{{ $business->status}}</span> 
                                    </p>
                                </div>
                                <div class="pt-5 text-base font-semibold leading-7">
                                    <p>
                                        <a href="{{ route('certain_sales', $business->id) }}"
                                            class="text-sky-500 transition-all duration-300 group-hover:text-white">View
                                            {{$business->business_name}} Sales
                                            &rarr;</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
        </main>
    </div>
    
</x-layout>
