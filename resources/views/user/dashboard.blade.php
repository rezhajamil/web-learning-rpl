@extends('layouts.app')
@section('content')
<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    @include('components.user.sidebar')
    @include('components.user.sidebar_mobile')
    
    <div class="flex flex-col flex-1 w-full">
        @include('components.navbar')
        <main class="h-full overflow-y-auto">
            <div class="container grid px-6 mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Dashboard
            </h2>
            <!-- Cards -->
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                <!-- Card -->
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
                            <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z"/>
                            <path d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Total Materi
                        </p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            6389
                        </p>
                    </div>
                </div>
                <!-- Card -->
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div class="p-3 mr-4 text-red-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-x-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zM6.854 5.146a.5.5 0 1 0-.708.708L7.293 7 6.146 8.146a.5.5 0 1 0 .708.708L8 7.707l1.146 1.147a.5.5 0 1 0 .708-.708L8.707 7l1.147-1.146a.5.5 0 0 0-.708-.708L8 6.293 6.854 5.146z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Total Tugas Belum Selesai
                        </p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            6389
                        </p>
                    </div>
                </div>
                <!-- Card -->
            </div>

            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                        <th class="px-4 py-3">Client</th>
                        <th class="px-4 py-3">Amount</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Date</th>
                    </tr>
                    </thead>
                    <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                    >
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->
                            <div
                            class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                            >
                            <img
                                class="object-cover w-full h-full rounded-full"
                                src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                alt=""
                                loading="lazy"
                            />
                            <div
                                class="absolute inset-0 rounded-full shadow-inner"
                                aria-hidden="true"
                            ></div>
                            </div>
                            <div>
                            <p class="font-semibold">Hans Burger</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                10x Developer
                            </p>
                            </div>
                        </div>
                        </td>
                        <td class="px-4 py-3 text-sm">$ 863.45</td>
                        <td class="px-4 py-3 text-xs">
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                        >
                            Approved
                        </span>
                        </td>
                        <td class="px-4 py-3 text-sm">6/10/2020</td>
                    </tr>

                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->
                            <div
                            class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                            >
                            <img
                                class="object-cover w-full h-full rounded-full"
                                
                                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&facepad=3&fit=facearea&s=707b9c33066bf8808c934c8ab394dff6"
                                alt=""
                                loading="lazy"
                            />
                            <div
                                class="absolute inset-0 rounded-full shadow-inner"
                                aria-hidden="true"
                            ></div>
                            </div>
                            <div>
                            <p class="font-semibold">Jolina Angelie</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                Unemployed
                            </p>
                            </div>
                        </div>
                        </td>
                        <td class="px-4 py-3 text-sm">$ 369.95</td>
                        <td class="px-4 py-3 text-xs">
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600"
                        >
                            Pending
                        </span>
                        </td>
                        <td class="px-4 py-3 text-sm">6/10/2020</td>
                    </tr>

                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->
                            <div
                            class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                            >
                            <img
                                class="object-cover w-full h-full rounded-full"
                                src="https://images.unsplash.com/photo-1551069613-1904dbdcda11?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                alt=""
                                loading="lazy"
                            />
                            <div
                                class="absolute inset-0 rounded-full shadow-inner"
                                aria-hidden="true"
                            ></div>
                            </div>
                            <div>
                            <p class="font-semibold">Sarah Curry</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                Designer
                            </p>
                            </div>
                        </div>
                        </td>
                        <td class="px-4 py-3 text-sm">$ 86.00</td>
                        <td class="px-4 py-3 text-xs">
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700"
                        >
                            Denied
                        </span>
                        </td>
                        <td class="px-4 py-3 text-sm">6/10/2020</td>
                    </tr>

                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->
                            <div
                            class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                            >
                            <img
                                class="object-cover w-full h-full rounded-full"
                                src="https://images.unsplash.com/photo-1551006917-3b4c078c47c9?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                alt=""
                                loading="lazy"
                            />
                            <div
                                class="absolute inset-0 rounded-full shadow-inner"
                                aria-hidden="true"
                            ></div>
                            </div>
                            <div>
                            <p class="font-semibold">Rulia Joberts</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                Actress
                            </p>
                            </div>
                        </div>
                        </td>
                        <td class="px-4 py-3 text-sm">$ 1276.45</td>
                        <td class="px-4 py-3 text-xs">
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                        >
                            Approved
                        </span>
                        </td>
                        <td class="px-4 py-3 text-sm">6/10/2020</td>
                    </tr>

                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->
                            <div
                            class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                            >
                            <img
                                class="object-cover w-full h-full rounded-full"
                                src="https://images.unsplash.com/photo-1546456073-6712f79251bb?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                alt=""
                                loading="lazy"
                            />
                            <div
                                class="absolute inset-0 rounded-full shadow-inner"
                                aria-hidden="true"
                            ></div>
                            </div>
                            <div>
                            <p class="font-semibold">Wenzel Dashington</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                Actor
                            </p>
                            </div>
                        </div>
                        </td>
                        <td class="px-4 py-3 text-sm">$ 863.45</td>
                        <td class="px-4 py-3 text-xs">
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700"
                        >
                            Expired
                        </span>
                        </td>
                        <td class="px-4 py-3 text-sm">6/10/2020</td>
                    </tr>

                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->
                            <div
                            class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                            >
                            <img
                                class="object-cover w-full h-full rounded-full"
                                src="https://images.unsplash.com/photo-1502720705749-871143f0e671?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=b8377ca9f985d80264279f277f3a67f5"
                                alt=""
                                loading="lazy"
                            />
                            <div
                                class="absolute inset-0 rounded-full shadow-inner"
                                aria-hidden="true"
                            ></div>
                            </div>
                            <div>
                            <p class="font-semibold">Dave Li</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                Influencer
                            </p>
                            </div>
                        </div>
                        </td>
                        <td class="px-4 py-3 text-sm">$ 863.45</td>
                        <td class="px-4 py-3 text-xs">
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                        >
                            Approved
                        </span>
                        </td>
                        <td class="px-4 py-3 text-sm">6/10/2020</td>
                    </tr>

                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->
                            <div
                            class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                            >
                            <img
                                class="object-cover w-full h-full rounded-full"
                                src="https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                alt=""
                                loading="lazy"
                            />
                            <div
                                class="absolute inset-0 rounded-full shadow-inner"
                                aria-hidden="true"
                            ></div>
                            </div>
                            <div>
                            <p class="font-semibold">Maria Ramovic</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                Runner
                            </p>
                            </div>
                        </div>
                        </td>
                        <td class="px-4 py-3 text-sm">$ 863.45</td>
                        <td class="px-4 py-3 text-xs">
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                        >
                            Approved
                        </span>
                        </td>
                        <td class="px-4 py-3 text-sm">6/10/2020</td>
                    </tr>

                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->
                            <div
                            class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                            >
                            <img
                                class="object-cover w-full h-full rounded-full"
                                src="https://images.unsplash.com/photo-1566411520896-01e7ca4726af?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                alt=""
                                loading="lazy"
                            />
                            <div
                                class="absolute inset-0 rounded-full shadow-inner"
                                aria-hidden="true"
                            ></div>
                            </div>
                            <div>
                            <p class="font-semibold">Hitney Wouston</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                Singer
                            </p>
                            </div>
                        </div>
                        </td>
                        <td class="px-4 py-3 text-sm">$ 863.45</td>
                        <td class="px-4 py-3 text-xs">
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                        >
                            Approved
                        </span>
                        </td>
                        <td class="px-4 py-3 text-sm">6/10/2020</td>
                    </tr>

                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->
                            <div
                            class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                            >
                            <img
                                class="object-cover w-full h-full rounded-full"
                                src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                alt=""
                                loading="lazy"
                            />
                            <div
                                class="absolute inset-0 rounded-full shadow-inner"
                                aria-hidden="true"
                            ></div>
                            </div>
                            <div>
                            <p class="font-semibold">Hans Burger</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                10x Developer
                            </p>
                            </div>
                        </div>
                        </td>
                        <td class="px-4 py-3 text-sm">$ 863.45</td>
                        <td class="px-4 py-3 text-xs">
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                        >
                            Approved
                        </span>
                        </td>
                        <td class="px-4 py-3 text-sm">6/10/2020</td>
                    </tr>
                    </tbody>
                </table>
                </div>
                <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
                >
                <span class="flex items-center col-span-3">
                    Showing 21-30 of 100
                </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                    <nav aria-label="Table navigation">
                    <ul class="inline-flex items-center">
                        <li>
                        <button
                            class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                            aria-label="Previous"
                        >
                            <svg
                            aria-hidden="true"
                            class="w-4 h-4 fill-current"
                            viewBox="0 0 20 20"
                            >
                            <path
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd"
                                fill-rule="evenodd"
                            ></path>
                            </svg>
                        </button>
                        </li>
                        <li>
                        <button
                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                            1
                        </button>
                        </li>
                        <li>
                        <button
                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                            2
                        </button>
                        </li>
                        <li>
                        <button
                            class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                            3
                        </button>
                        </li>
                        <li>
                        <button
                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                            4
                        </button>
                        </li>
                        <li>
                        <span class="px-3 py-1">...</span>
                        </li>
                        <li>
                        <button
                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                            8
                        </button>
                        </li>
                        <li>
                        <button
                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                            9
                        </button>
                        </li>
                        <li>
                        <button
                            class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                            aria-label="Next"
                        >
                            <svg
                            class="w-4 h-4 fill-current"
                            aria-hidden="true"
                            viewBox="0 0 20 20"
                            >
                            <path
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"
                                fill-rule="evenodd"
                            ></path>
                            </svg>
                        </button>
                        </li>
                    </ul>
                    </nav>
                </span>
                </div>
            </div>

            <!-- Charts -->
            <h2
                class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
                Charts
            </h2>
            <div class="grid gap-6 mb-8 md:grid-cols-2">
                <div
                class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
                >
                <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                    Revenue
                </h4>
                <canvas id="pie"></canvas>
                <div
                    class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400"
                >
                    <!-- Chart legend -->
                    <div class="flex items-center">
                    <span
                        class="inline-block w-3 h-3 mr-1 bg-blue-500 rounded-full"
                    ></span>
                    <span>Shirts</span>
                    </div>
                    <div class="flex items-center">
                    <span
                        class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"
                    ></span>
                    <span>Shoes</span>
                    </div>
                    <div class="flex items-center">
                    <span
                        class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"
                    ></span>
                    <span>Bags</span>
                    </div>
                </div>
                </div>
                <div
                class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
                >
                <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                    Traffic
                </h4>
                <canvas id="line"></canvas>
                <div
                    class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400"
                >
                    <!-- Chart legend -->
                    <div class="flex items-center">
                    <span
                        class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"
                    ></span>
                    <span>Organic</span>
                    </div>
                    <div class="flex items-center">
                    <span
                        class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"
                    ></span>
                    <span>Paid</span>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </main>
    </div>
</div>
@endsection