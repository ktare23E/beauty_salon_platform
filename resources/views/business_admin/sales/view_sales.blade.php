<x-layout>
    <div class="w-full h-full grid grid-cols-[15%,1fr] gap-2 bg-[#f6f6f9]">
        <div class=" flex h-screen rounded-tr-md">
            <aside class="flex w-[12rem] max-w-xs p-4 bg-gray-800 fixed top-0 left-0 bottom-0">
                <ul class="flex flex-col w-full justify-between">

                    <div class="nav_container">
                        <li class="my-px mb-10">
                            <h1 class="font-bold text-center text-white text-xl">Beauty Salon Platform</h1>
                        </li>
                        <div class="space-y-3">
                            @if (auth()->user()->user_type == 'business_admin')
                                <li class="my-px">
                                    <x-nav-link :href="route('business_admin.index')" :active="request()->routeIs('business_admin.index')">
                                        <span class="flex items-center justify-center text-lg text-gray-500">
                                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"
                                                class="h-6 w-6">
                                                <path
                                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                                </path>
                                            </svg>
                                        </span>
                                        <span class="ml-3">Dashboard</span>
                                    </x-nav-link>
                                </li>
                                <li class="my-px">
                                    <x-nav-link :href="route('business_admin.salon')" :active="request()->routeIs('business_admin.salon')">
                                        <span class="flex items-center justify-center text-lg text-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                                            </svg>
                                        </span>
                                        <span class="ml-3">Salon</span>
                                    </x-nav-link>
                                </li>
                                <li class="my-px">
                                    <x-nav-link :href="route('show_service', $businessData->id)" :active="request()->routeIs('show_service', $businessData->id)">
                                        <span class="flex items-center justify-center text-lg text-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                                            </svg>
                                        </span>
                                        <span class="ml-3">Service</span>
                                    </x-nav-link>
                                </li>
                                <li class="my-px">
                                    <x-nav-link :href="route('package_index', $businessData->id)" :active="request()->routeIs('package_index', $businessData->id)">
                                        <span class="flex items-center justify-center text-lg text-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                                            </svg>
                                        </span>
                                        <span class="ml-3">Package</span>
                                    </x-nav-link>
                                </li>
                                <li class="my-px">
                                    <x-nav-link :href="route('client_list', $businessData->id)" :active="request()->routeIs('client_list', $businessData->id)">
                                        <span class="flex items-center justify-center text-lg text-gray-500">
                                            <svg xmlns="http://www.w3.org/2s000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                                            </svg>
                                        </span>
                                        <span class="ml-3">Client</span>
                                    </x-nav-link>
                                </li>
                                <li class="my-px">
                                    <x-nav-link :href="route('booking_list', $businessData->id)" :active="request()->routeIs('booking_list', $businessData->id)">
                                        <span class="flex items-center justify-center text-lg text-gray-500">
                                            <svg xmlns="http://www.w3.org/2s000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                                            </svg>
                                        </span>
                                        <span class="ml-3">Bookings</span>
                                    </x-nav-link>
                                </li>
                                <li class="my-px">
                                    <x-nav-link :href="route('certain_sales', $businessData->id)" :active="request()->routeIs('certain_sales', $businessData->id)">
                                        <span class="flex items-center justify-center text-lg text-gray-500">
                                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"
                                                class="h-6 w-6">
                                                <path
                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                                </path>
                                            </svg>
                                        </span>
                                        <span class="ml-3">Sales</span>
                                    </x-nav-link>
                                </li>
                            @endif
                        </div>
                    </div>
                    <div>
                        <li class="my-px">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="w-full">
                                @csrf
                                <button type="submit"
                                    class="flex flex-row items-center h-12 px-4 w-full rounded-lg text-gray-500 hover:bg-gray-700">
                                    <span class="flex items-center justify-center text-lg text-red-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                                        </svg>
                                    </span>
                                    <span class="ml-3">Logout</span>
                                </button>
                            </form>
                        </li>
                    </div>
                </ul>
            </aside>
        </div>
        <main class="w-full">
            <h1 class="text-2xl font-semibold mt-3"> {{ $businessData->business_name }} Sales</h1>
            <div class="analytics mt-12 w-[90%] mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div class="bg-white p-4 rounded-md shadow-md">
                        <h2 class="text-xl font-semibold">Total Daily Sales</h2>
                        @if (empty($totalToadySales))
                            <p class="">No sales for this day yet.</p>
                        @else
                            <div class="w-full flex justify-between">
                                <p>Total Sales: ₱{{number_format($totalToadySales,2)}}</p>
                            </div>
                        @endif
                    </div>
                    <div class="bg-white p-4 rounded-md shadow-md">
                        <h2 class="text-xl font-semibold">Total Weekly Sales</h2>
                        @if (empty($totalWeeklySales))
                            <p class="">No sales for this week yet.</p>
                        @else
                            <div class="w-full flex justify-between">
                                <p>Total Sales: ₱{{number_format($totalWeeklySales,2)}}</p>
                            </div>
                        @endif
                    </div>
                    <div class="bg-white p-4 rounded-md shadow-md">
                        <h2 class="text-xl font-semibold">Total Monthly Sales</h2>
                        @if (empty($totalMonthlySales))
                            <p class="">No sales for this month yet.</p>
                        @else
                            <div class="w-full flex justify-between">
                                <p>Total Sales: ₱{{number_format($totalMonthlySales,2)}}</p>
                            </div>
                        @endif
                    </div>
                    <div class="bg-white p-4 rounded-md shadow-md">
                        <h2 class="text-xl font-semibold">Total Year {{date('Y')}} Sales</h2>
                        @if (empty($totalYearSales))
                            <p class="">No sales for this year yet.</p>
                        @else
                            <div class="w-full flex justify-between">
                                <p>Total Sales: ₱{{number_format($totalYearSales,2)}}</p>
                            </div>
                        @endif
                    </div>
                    <div class="bg-white p-4 rounded-md shadow-md">
                        <h2 class="text-xl font-semibold">Highest Service Sales</h2>
                        @if ($highestServiceVariantSales['item'] == null)
                            <p class="">No service sales yet.</p>
                        @else
                            <div class="w-full flex justify-between">
                                <p class="font-semibold">{{$highestServiceVariantSales['item']->name}}</p>
                                <p>Total Sales: ₱{{number_format($highestServiceVariantSales['amount'],2)}}</p>
                            </div>
                        @endif
                    </div>
                    <div class="bg-white p-4 rounded-md shadow-md">
                        <h2 class="text-xl font-semibold">Total Package Sales</h2>
                        @if ($highestPackageSales['item'] == null)
                            <p class="">No package sales yet.</p>
                        @else
                            <div class="w-full flex justify-between">
                                <p class="font-semibold">{{$highestPackageSales['item']->package_name}}</p>
                                <p>Total Sales: ₱{{number_format($highestPackageSales['amount'],2)}}</p>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="w-[50%] mt-12 bg-white px-4">
                    <canvas id="salesChart" width="400" height="200"></canvas>
                </div>
            </div>
    

            <script>
                const salesData = {
                    daily: [100, 150, 120, 170, 200, 180, 130],
                    weekly: [700, 800, 750, 900, 850, 870, 920],
                    monthly: [3000, 3200, 3100, 3300, 3400, 3500, 3600]
                };

                const labels = {
                    daily: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    weekly: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', 'Week 6', 'Week 7'],
                    monthly: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul']
                };

                const ctx = document.getElementById('salesChart').getContext('2d');
                const salesChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels.daily,
                        datasets: [{
                            label: 'Daily Sales',
                            data: salesData.daily,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            fill: true
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                function updateChart(period) {
                    salesChart.data.labels = labels[period];
                    salesChart.data.datasets[0].data = salesData[period];
                    salesChart.data.datasets[0].label = `${period.charAt(0).toUpperCase() + period.slice(1)} Sales`;
                    salesChart.update();
                }
            </script>

        </main>
    </div>

</x-layout>
