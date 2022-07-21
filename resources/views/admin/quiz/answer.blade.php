@extends('layouts.app')
@section('content')
<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    @include('components.user.sidebar')
    @include('components.user.sidebar_mobile')

    <div class="flex flex-col flex-1 w-full">
        <x-navbar></x-navbar>
        <main class="h-full overflow-y-auto">
            <div class="container grid px-6 mx-auto my-3 gap-y-4">
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    {{ $title }}
                </h2>

                @foreach ($answers as $answer)
                <!-- Cards -->
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <div class="flex justify-between">
                        <div class="mb-4">
                            <h4 class="mb-1 text-lg font-semibold text-purple-600 dark:text-gray-300">
                                {{ $answer->user->name }}
                            </h4>
                            <p class="text-sm text-gray-600">{{ $answer->user->email }}</p>
                        </div>
                        <div class="flex gap-x-2">
                            @if ($answer->updated_at<$answer->quiz->deadline)
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full h-fit dark:bg-green-700 dark:text-green-100">
                                    Tepat Waktu
                                </span>
                                @else
                                <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full h-fit dark:text-red-100 dark:bg-red-700">
                                    Terlambat
                                </span>
                                @endif
                                <span class="font-semibold text-slate-800">{{ $answer->updated_at->format('d/m/Y H:i') }}</span>
                        </div>
                    </div>
                    <div class="mb-6 text-gray-600 dark:text-gray-400">
                        {!!$answer->desc !!}
                    </div>
                    <div class="flex items-end justify-between">
                        <a href="{{ asset('storage/'.$answer->file) }}" class="flex flex-col w-1/2 px-3 py-2 mt-auto transition-all border rounded-md md:w-1/6 group hover:bg-indigo-600 border-slate-600">
                            <span class="text-base font-bold truncate transition-all text-slate-600 group-hover:text-white">{{ $answer->file_name }}</span>
                            <span class="block mb-2 text-sm transition-all md:mb-4 font-base text-slate-600 group-hover:text-white">{{ $answer->file_extension }}</span>
                            <span class="text-sm font-semibold transition-all text-slate-600 group-hover:text-white">Open<i class="ml-1 font-semibold bi bi-arrow-bar-right"></i></span>
                        </a>
                        <form action="{{ route('admin.point',$answer->id) }}" method="post" class="flex gap-x-3">
                            @csrf
                            @method('post')
                            <input type="number" class="w-1/2 form-input" name="point" id="point" placeholder="Beri Nilai" required value="{{ old('point',$answer->point) }}">

                            @error('point')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                            @enderror
                            <button type="submit" class="inline-block px-6 py-2 font-bold text-white transition-all bg-purple-600 rounded hover:bg-purple-800">Simpan Nilai</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </main>
    </div>
</div>
@endsection
