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
                @if ($subject->lesson_id)
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <h4 class="mb-3 text-lg font-semibold text-purple-600 dark:text-gray-300">
                        Materi
                    </h4>
                    <div class="mb-6 text-gray-600 dark:text-gray-400">
                        {!!$subject->lesson->desc !!}
                    </div>
                </div>
                @endif
                @if ($subject->example_id)
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <h4 class="mb-3 text-lg font-semibold text-purple-600 dark:text-gray-300">
                        Contoh
                    </h4>
                    <div class="mb-6 text-gray-600 dark:text-gray-400">
                        {!!$subject->example->desc !!}
                    </div>
                    <a href="{{ asset('storage/'.$subject->example->file) }}" class="flex flex-col w-1/2 px-3 py-2 mt-auto transition-all border rounded-md md:w-1/6 group hover:bg-indigo-600 border-slate-600">
                        <span class="text-base font-bold truncate transition-all text-slate-600 group-hover:text-white">{{ $subject->example->file_name }}</span>
                        <span class="block mb-2 text-sm transition-all md:mb-4 font-base text-slate-600 group-hover:text-white">{{ $subject->example->file_extension }}</span>
                        <span class="text-sm font-semibold transition-all text-slate-600 group-hover:text-white">Open<i class="ml-1 font-semibold bi bi-arrow-bar-right"></i></span>
                    </a>
                </div>
                @endif
                @if ($subject->quiz_id)
                <div class="min-w-0 p-4 bg-purple-600 rounded-lg shadow-lg dark:bg-gray-800">
                    <h4 class="mb-3 text-lg font-semibold text-white dark:text-gray-300">
                        Tugas
                    </h4>
                    <div class="mb-6 text-white dark:text-gray-400">
                        {!!$subject->quiz->desc !!}
                    </div>
                    <div class="flex items-end justify-between">
                        <a href="{{ asset('storage/'.$subject->quiz->file) }}" class="flex flex-col w-1/2 px-3 py-2 mt-auto transition-all bg-white border rounded-md md:w-1/6 group hover:bg-slate-600 border-slate-600">
                            <span class="text-base font-bold truncate transition-all text-slate-600 group-hover:text-white">{{{ $subject->quiz->file_name }}}</span>
                            <span class="block mb-2 text-sm transition-all md:mb-4 font-base text-slate-600 group-hover:text-white">{{ $subject->quiz->file_extension }}</span>
                            <span class="text-sm font-semibold transition-all text-slate-600 group-hover:text-white">Open<i class="ml-1 font-semibold bi bi-arrow-bar-right"></i></span>
                        </a>
                        <div class="flex flex-col w-1/2 px-3 gap-y-2 md:w-1/6">
                            <span class="block mt-auto text-sm font-bold text-white md:text-base"><i class="mr-2 bi bi-bell-fill"></i>{{ date('d/m/Y H:i',strtotime($subject->quiz->deadline)) }}</span>
                            @if (!$answer)
                            <a href="{{ route('user.quiz_answer.create',['quiz_id'=>$subject->quiz_id]) }}" class="p-2 font-semibold text-center text-purple-800 transition bg-white rounded-lg hover:bg-slate-600 hover:text-white">Kumpul Tugas</a>
                            @endif
                        </div>
                    </div>
                    @if ($answer)
                    <hr class="my-3">
                    <h4 class="mb-3 text-lg font-semibold text-white dark:text-gray-300">
                        Jawaban
                        <a href="{{ route('user.quiz_answer.edit',$answer->id) }}">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <span class="block text-sm text-white">{{ $answer->updated_at->format('d/m/y H:i') }}</span>
                    </h4>
                    <div class="mb-6 text-white dark:text-gray-400">
                        {!! $answer->desc !!}
                    </div>
                    <div class="flex items-end justify-between">
                        <a href="{{ asset('storage/'.$answer->file) }}" class="flex flex-col w-1/2 px-3 py-2 mt-auto transition-all bg-white border rounded-md md:w-1/6 group hover:bg-slate-600 border-slate-600">
                            <span class="text-base font-bold truncate transition-all text-slate-600 group-hover:text-white">{{ $answer->file_name }}</span>
                            <span class="block mb-2 text-sm transition-all md:mb-4 font-base text-slate-600 group-hover:text-white">{{ $answer->file_extension }}</span>
                            <span class="text-sm font-semibold transition-all text-slate-600 group-hover:text-white">Open<i class="ml-1 font-semibold bi bi-arrow-bar-right"></i></span>
                        </a>
                        <span class="inline-block mr-5 text-xl font-bold text-white">Nilai : {{ $answer->point }}</span>
                    </div>
                    @endif
                </div>
                @endif
                @if ($subject->other_id)
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <h4 class="mb-3 text-lg font-semibold text-purple-600 dark:text-gray-300">
                        Lainnya
                    </h4>
                    <div class="mb-6 text-gray-600 dark:text-gray-400">
                        {!!$subject->other->desc !!}
                        </p>
                        <a href="{{ asset('storage/'.$subject->other->file) }}" class="flex flex-col w-1/2 px-3 py-2 mt-auto transition-all border rounded-md md:w-1/6 group hover:bg-indigo-600 border-slate-600">
                            <span class="text-base font-bold truncate transition-all text-slate-600 group-hover:text-white">{{ $subject->other->file_name }}</span>
                            <span class="block mb-2 text-sm transition-all md:mb-4 font-base text-slate-600 group-hover:text-white">{{ $subject->other->file_extension }}</span>
                            <span class="text-sm font-semibold transition-all text-slate-600 group-hover:text-white">Open<i class="ml-1 font-semibold bi bi-arrow-bar-right"></i></span>
                        </a>
                    </div>
                    @endif
                </div>
        </main>
    </div>
</div>
@endsection
