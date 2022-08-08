@extends('layouts.app')
@section('content')
<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    @include('components.user.sidebar')
    @include('components.user.sidebar_mobile')

    <div class="flex flex-col flex-1 w-full">
        <x-navbar></x-navbar>
        <main class="h-full px-6 overflow-y-auto">
            <div class="w-full my-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Profile</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Telepon</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y">
                            @foreach ($students as $key=>$data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm gap-x-4">
                                        <!-- Avatar with inset shadow -->
                                        <div class="relative block w-8 h-8 mr-3 rounded-full">
                                            <img class="object-cover w-full h-full rounded-full" @if ($data->avatar)
                                            src="{{ asset('storage/' . $data->avatar) }}"
                                            onerror="this.onerror=null; this.src='{{ $data->avatar }}'"
                                            @else
                                            src="{{ asset('images/profile.png') }}"
                                            @endif
                                            alt="" loading="lazy" />
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                        </div>
                                        <div>
                                            <p class="font-semibold whitespace-nowrap">{{ $data->name }}</p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                                {{ $data->gender }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $data->email }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $data->phone }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
