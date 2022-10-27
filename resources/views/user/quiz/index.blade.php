@extends('layouts.app')
@section('content')
<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    @include('components.user.sidebar')
    @include('components.user.sidebar_mobile')

    <div class="flex flex-col flex-1 w-full">
        <x-navbar></x-navbar>
        <main class="h-full overflow-y-auto">
            <div class="container grid px-6 mx-auto my-3 gap-y-4">
                <h2 class="w-full my-6 text-2xl font-semibold text-center text-gray-700 dark:text-gray-200">
                    QUIZ
                </h2>
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    @if (empty($answer))
                    <div class="flex justify-center w-full">
                        <a href="{{ route('user.quiz_session.create') }}" class="w-full px-4 py-3 mx-auto font-semibold text-center text-white transition-all bg-purple-600 rounded-md sm:w-1/2 hover:bg-purple-800">Mulai Quiz</a>
                    </div>
                    @elseif($answer->finish)
                    <div class="flex flex-col items-center justify-center w-full">
                        <span class="text-3xl font-bold">Skor Anda</span>
                        <div class="p-3 px-5 mt-12 text-3xl text-white bg-purple-600 rounded-full aspect-square">{{ $answer->hasil }}</div>
                    </div>
                    @elseif(!$answer->finish)
                    <form action="{{ route('user.quiz_session.store') }}" method="post" id="form-quiz">
                        @csrf
                        @foreach (json_decode($quiz->soal) as $key=>$data)
                        <div class="flex flex-col py-4 border-b-4 gap-y-3">
                            <span class="font-semibold">{{ $key+1 }}) {{ $data }}</span>
                            <label>
                                <input type="radio" name="pilihan{{ $key }}" value="A" class="hidden peer" required>
                                <div class="flex w-full font-semibold border-2 peer-checked:text-white peer-checked:bg-indigo-600 peer-checked:border-indigo-800">
                                    <span class="inline-block p-4 border-r-2">A</span>
                                    <span class="inline-block w-full p-4">{{ array_chunk(json_decode($quiz->opsi),4)[$key][0] }}</span>
                                </div>
                            </label>
                            <label>
                                <input type="radio" name="pilihan{{ $key }}" value="B" class="hidden peer" required>
                                <div class="flex w-full font-semibold border-2 peer-checked:text-white peer-checked:bg-indigo-600 peer-checked:border-indigo-800">
                                    <span class="inline-block p-4 border-r-2">B</span>
                                    <span class="inline-block w-full p-4">{{ array_chunk(json_decode($quiz->opsi),4)[$key][1] }}</span>
                                </div>
                            </label>
                            <label>
                                <input type="radio" name="pilihan{{ $key }}" value="C" class="hidden peer" required>
                                <div class="flex w-full font-semibold border-2 peer-checked:text-white peer-checked:bg-indigo-600 peer-checked:border-indigo-800">
                                    <span class="inline-block p-4 border-r-2">C</span>
                                    <span class="inline-block w-full p-4">{{ array_chunk(json_decode($quiz->opsi),4)[$key][2] }}</span>
                                </div>
                            </label>
                            <label>
                                <input type="radio" name="pilihan{{ $key }}" value="D" class="hidden peer" required>
                                <div class="flex w-full font-semibold border-2 peer-checked:text-white peer-checked:bg-indigo-600 peer-checked:border-indigo-800">
                                    <span class="inline-block p-4 border-r-2">D</span>
                                    <span class="inline-block w-full p-4">{{ array_chunk(json_decode($quiz->opsi),4)[$key][3] }}</span>
                                </div>
                            </label>
                        </div>
                        @endforeach
                        <button type="submit" id="btn-submit" class="w-full px-6 py-2 my-4 font-semibold text-white bg-indigo-800 rounded">Selesai</button>
                    </form>

                    @endif
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
