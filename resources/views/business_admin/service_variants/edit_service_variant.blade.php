<x-layout>
    <div class="w-full h-full grid grid-cols-[15%,1fr] gap-2 bg-[#f6f6f9]">
        <div class=" flex  h-screen rounded-tr-md">
            <x-aside>

            </x-aside>
        </div>
        <main class="ml-17rem w-full">
            <div>
                <h1 class="text-2xl font-semibold mt-24 text-center">Edit {{$serviceVariant->name}}</h1>
                <div>
                    
                </div>
                <div class="bg-[#fff] p-[2rem] border w-[50%] rounded-md hover:shadow-xl transition-all mt-3 mx-auto">
                    <div class="table_container">
                        <form class="max-w-md mx-auto" method="POST" action="{{route('store_service_variant',$serviceVariant->id)}}">
                            @csrf
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" name="name" id="name" value="{{$serviceVariant->name}}"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label for="floating_email"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Service Variant Name</label>
                                    <x-forms.error></x-forms.error>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <div class="w-full">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                                        Service Variant Description
                                    </label>
                                    <textarea rows="3" name="description" id="description" placeholder="Write something here" value="{{$serviceVariant->description}}"
                                        class="appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"></textarea>
                                </div>
                                    <x-forms.error></x-forms.error>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="number" name="price" id="price"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$serviceVariant->price}}"
                                    placeholder="" required />
                                <label for="floating_email"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Price</label>
                                <x-forms.error></x-forms.error>
                            </div>
                            {{-- <div class="relative z-0 w-full mb-5 group">
                                <div class="max-w-xs">
                                    <label for="example1" class="mb-1 block text-sm font-medium text-gray-700">Upload 5 Image for this service</label>
                                    <input type="file" id="images[]" name="images[]" multiple accept="image/jpeg,image/png,image/jpg" class="mt-2 block w-full text-sm file:mr-4 file:rounded-sm file:border-0 file:bg-teal-500 file:py-1 file:px-2 file:text-sm file:font-normal file:text-white hover:file:bg-teal-700 focus:outline-none disabled:pointer-events-none disabled:opacity-60" />
                                    <x-forms.error></x-forms.error>
                                </div>
                            </div> --}}
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
</x-layout>
