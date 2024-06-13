<x-layout>
    <div class="w-full h-full grid grid-cols-[15%,1fr] gap-2 bg-[#f6f6f9]">
        <div class=" flex  h-screen rounded-tr-md">
            <x-aside>

            </x-aside>
        </div>
        <main class="w-full">
            <div class="pb-[500px] mt-20">
                <h1 class="text-2xl font-semibold text-center">{{$package->package_name}} Information</h1>
                <div class="bg-[#fff] p-[2rem] border w-[50%] rounded-md hover:shadow-xl transition-all mt-3 mx-auto">
                    <div class="table_container">
                        <div class="max-w-md mx-auto">
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" name="package_name" id="package_name" value="{{$package->package_name}}"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required disabled />
                                <label for="floating_email"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Package
                                    Name</label>
                                <x-forms.error></x-forms.error>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <div class="w-full">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="grid-password">
                                        Package Description
                                    </label>
                                    <textarea disabled rows="3" name="description" id="description" placeholder="Write something here"
                                        class="appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">{{$package->description}}</textarea>
                                </div>
                                <x-forms.error></x-forms.error>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="number" name="price" id="price" value="{{$package->price}}" disabled
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder="" required />
                                <label for="floating_email"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Price</label>
                                <x-forms.error></x-forms.error>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <h1 class="font-bold">Package Services</h1>
                            </div>
                            <div class="relative z-0 w-full mb-5 group space-y-3">
                                @foreach ($package->serviceVariants as $service_variant)
                                    <div>
                                        <div class="border rounded-md p-4 w-full mx-auto max-w-2xl ">
                                            <h1>{{$service_variant->service->service_name}}</h1>
                                            <h4 class="text-xl lg:text-2xl font-semibold">
                                                {{$service_variant->name}}
                                            </h4>
                                        </div>
                                    </div>
                                @endforeach
                                
                            </div>
                            <x-table.button-action href="{{route('edit_package',$package->id)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</x-table.button-action>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
</x-layout>