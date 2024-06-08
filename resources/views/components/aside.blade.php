<aside class="flex w-[17rem] max-w-xs p-4 bg-gray-800 fixed top-0 left-0 bottom-0">
    <ul class="flex flex-col w-full justify-between">
        
        <div class="nav_container">
            <li class="my-px mb-10">
                <h1 class="font-bold text-center text-white text-2xl">Beauty Salon Platform</h1>
            </li>
            <div class="space-y-3">
                @if(auth()->user()->user_type == 'admin')
                    <li class="my-px">
                        <a href="{{route('admin.index')}}"
                            class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 bg-gray-100">
                            <span class="flex items-center justify-center text-lg text-gray-500">
                                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                    <path
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                            </span>
                            <span class="ml-3">Dashboard</span>
                            <span
                                class="flex items-center justify-center text-sm text-gray-500 font-semibold bg-gray-300 h-6 px-2 rounded-full ml-auto">3</span>
                        </a>
                    </li>
                    <li class="my-px">
                        <a href="#"
                            class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-500 hover:bg-gray-700">
                            <span class="flex items-center justify-center text-lg text-gray-500">
                                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                    <path
                                        d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4">
                                    </path>
                                </svg>
                            </span>
                            <span class="ml-3">Manager</span>
                        </a>
                    </li>
                    <li class="my-px">
                        <a href="#"
                            class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-500 hover:bg-gray-700">
                            <span class="flex items-center justify-center text-lg text-gray-500">
                                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                    <path
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                    </path>
                                </svg>
                            </span>
                            <span class="ml-3">Tasks</span>
                        </a>
                    </li>
                @endif
                @if(auth()->user()->user_type == 'business_admin')
                <li class="my-px">
                    <a href="{{route('admin.index')}}"
                        class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 bg-gray-100">
                        <span class="flex items-center justify-center text-lg text-gray-500">
                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                <path
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </span>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li class="my-px">
                    <a href="#"
                        class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-500 hover:bg-gray-700">
                        <span class="flex items-center justify-center text-lg text-gray-500">
                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                <path
                                    d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4">
                                </path>
                            </svg>
                        </span>
                        <span class="ml-3">Business</span>
                    </a>
                </li>
                <li class="my-px">
                    <a href="#"
                        class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-500 hover:bg-gray-700">
                        <span class="flex items-center justify-center text-lg text-gray-500">
                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                <path
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                </path>
                            </svg>
                        </span>
                        <span class="ml-3">Sales</span>
                    </a>
                </li>
            @endif
            </div>
        </div>
        <div>
            <li class="my-px">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="w-full">
                    @csrf
                    <button type="submit" class="flex flex-row items-center h-12 px-4 w-full rounded-lg text-gray-500 hover:bg-gray-700">
                        <span class="flex items-center justify-center text-lg text-red-400">
                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                <path
                                    d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z">
                                </path>
                            </svg>
                        </span>
                        <span class="ml-3">Logout</span>
                    </button>
                </form>
            </li>            
        </div>
    </ul>
</aside>