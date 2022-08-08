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
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <div class="flex items-center justify-between">
                        <h4 class="mb-3 text-lg font-semibold text-purple-600 dark:text-gray-300">
                            Materi
                        </h4>
                        @if ($subject->lesson_id)
                        <div class="flex mr-2 gap-x-2">
                            <a href="{{ route('admin.lesson.edit',$subject->lesson_id) }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                            </a>
                            <form action="{{ route('admin.lesson.destroy',$subject->lesson_id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg cursor-pointer dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="mb-6 text-gray-600 dark:text-gray-400">
                        {!! $subject->lesson->desc !!}
                    </div>
                    <a href="{{ asset('storage/'.$subject->lesson->file) }}" class="flex flex-col w-1/2 px-3 py-2 mt-auto transition-all border rounded-md md:w-1/6 group hover:bg-indigo-600 border-slate-600">
                        <span class="text-base font-bold truncate transition-all text-slate-600 group-hover:text-white">{{ $subject->lesson->file_name }}</span>
                        <span class="block mb-2 text-sm transition-all md:mb-4 font-base text-slate-600 group-hover:text-white">{{ $subject->lesson->file_extension }}</span>
                        <span class="text-sm font-semibold transition-all text-slate-600 group-hover:text-white">Open<i class="ml-1 font-semibold bi bi-arrow-bar-right"></i></span>
                    </a>
                    @else
                </div>
                <a href="{{route('admin.lesson.create',['subject_id'=>$subject->id])}}" class="px-3 py-2 font-semibold text-center text-white transition bg-purple-600 rounded sm:w-1/6 hover:bg-purple-800"></i>+ Tambah Materi</a>
                @endif
            </div>
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <h4 class="mb-3 text-lg font-semibold text-purple-600 dark:text-gray-300">
                        Contoh
                    </h4>
                    @if ($subject->example_id)
                    <div class="flex mr-2 gap-x-2">
                        <a href="{{ route('admin.example.edit',$subject->example_id) }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg>
                        </a>
                        <form action="{{ route('admin.example.destroy',$subject->example_id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg cursor-pointer dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="mb-6 text-gray-600 dark:text-gray-400">
                    {!! $subject->example->desc !!}
                </div>
                <a href="{{ asset('storage/'.$subject->example->file) }}" class="flex flex-col w-1/2 px-3 py-2 mt-auto transition-all border rounded-md md:w-1/6 group hover:bg-indigo-600 border-slate-600">
                    <span class="text-base font-bold truncate transition-all text-slate-600 group-hover:text-white">{{ $subject->example->file_name }}</span>
                    <span class="block mb-2 text-sm transition-all md:mb-4 font-base text-slate-600 group-hover:text-white">{{ $subject->example->file_extension }}</span>
                    <span class="text-sm font-semibold transition-all text-slate-600 group-hover:text-white">Open<i class="ml-1 font-semibold bi bi-arrow-bar-right"></i></span>
                </a>
                @else
            </div>
            <a href="{{route('admin.example.create',['subject_id'=>$subject->id])}}" class="px-3 py-2 font-semibold text-center text-white transition bg-purple-600 rounded sm:w-1/6 hover:bg-purple-800"></i>+ Tambah Contoh</a>
            @endif
    </div>
    <div class="min-w-0 p-4 bg-purple-600 rounded-lg shadow-lg dark:bg-gray-800">
        <div class="flex items-center justify-between">
            <h4 class="mb-3 text-lg font-semibold text-white dark:text-gray-300">
                Tugas
            </h4>
            @if ($subject->quiz_id)
            <div class="flex mr-2 gap-x-2">
                <a href="{{ route('admin.quiz.edit',$subject->quiz_id) }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>
                </a>
                <form action="{{ route('admin.quiz.destroy',$subject->quiz_id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white rounded-lg cursor-pointer dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
        <div class="mb-6 text-white dark:text-gray-400">
            {!! $subject->quiz->desc !!}
        </div>
        <div class="flex items-end justify-between">
            <a href="{{ asset('storage/'.$subject->quiz->file) }}" class="flex flex-col w-1/2 px-3 py-2 mt-auto transition-all bg-white border rounded-md md:w-1/6 group hover:bg-slate-600 border-slate-600">
                <span class="text-base font-bold truncate transition-all text-slate-600 group-hover:text-white">{{{ $subject->quiz->file_name }}}</span>
                <span class="block mb-2 text-sm transition-all md:mb-4 font-base text-slate-600 group-hover:text-white">{{ $subject->quiz->file_extension }}</span>
                <span class="text-sm font-semibold transition-all text-slate-600 group-hover:text-white">Open<i class="ml-1 font-semibold bi bi-arrow-bar-right"></i></span>
            </a>
            <div class="flex flex-col w-1/2 px-3 gap-y-2 md:w-1/6">
                <span class="block mt-auto text-sm font-bold text-white md:text-base"><i class="mr-2 bi bi-bell-fill"></i>{{ $subject->quiz->deadline->format('d/m/y H:i') }}</span>
            </div>
        </div>
        @else
    </div>
    <a href="{{route('admin.quiz.create',['subject_id'=>$subject->id])}}" class="px-3 py-2 font-semibold text-center text-purple-600 transition bg-white rounded sm:w-1/6 hover:bg-slate-200"></i>+ Tambah Tugas</a>
    @endif
</div>
<div class="min-w-0 p-4 bg-white rounded-lg shadow-lg dark:bg-gray-800">
    <div class="flex items-center justify-between">
        <h4 class="mb-3 text-lg font-semibold text-purple-600 dark:text-gray-300">
            Lainnya
        </h4>
        @if ($subject->other_id)
        <div class="flex mr-2 gap-x-2">
            <a href="{{ route('admin.other.edit',$subject->other_id) }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                </svg>
            </a>
            <form action="{{ route('admin.other.destroy',$subject->other_id) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg cursor-pointer dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
    <div class="mb-6 text-gray-600 dark:text-gray-400">
        {!! $subject->other->desc !!}
    </div>
    <a href="{{ asset('storage/'.$subject->other->file) }}" class="flex flex-col w-1/2 px-3 py-2 mt-auto transition-all border rounded-md md:w-1/6 group hover:bg-indigo-600 border-slate-600">
        <span class="text-base font-bold truncate transition-all text-slate-600 group-hover:text-white">{{ $subject->other->file_name }}</span>
        <span class="block mb-2 text-sm transition-all md:mb-4 font-base text-slate-600 group-hover:text-white">{{ $subject->other->file_extension }}</span>
        <span class="text-sm font-semibold transition-all text-slate-600 group-hover:text-white">Open<i class="ml-1 font-semibold bi bi-arrow-bar-right"></i></span>
    </a>
    @else
</div>
<a href="{{route('admin.other.create',['subject_id'=>$subject->id])}}" class="px-3 py-2 font-semibold text-center text-white transition bg-purple-600 rounded sm:w-1/6 hover:bg-purple-800"></i>+ Tambah Lainnya</a>

@endif
</div>
</div>
</main>
</div>
</div>
@endsection
