@extends('layouts.app')
@section('content')
<div class="flex h-screen bg-gray-50 dark:bg-gray-900">
    @include('components.user.sidebar')
    @include('components.user.sidebar_mobile')

    <div class="flex flex-col flex-1 w-full">
        <x-navbar></x-navbar>
        <main class="h-full overflow-y-auto">
            <div class="container grid px-6 mx-auto">
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    {{ $title }}
                </h2>
                <!-- Cards -->
                <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                    <!-- Card -->
                    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
                                <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z" />
                                <path d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z" />
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Total Materi
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                {{ $subjects->count() }}
                            </p>
                        </div>
                    </div>
                    <!-- Card -->
                    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <div class="p-3 mr-4 text-red-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-x-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zM6.854 5.146a.5.5 0 1 0-.708.708L7.293 7 6.146 8.146a.5.5 0 1 0 .708.708L8 7.707l1.146 1.147a.5.5 0 1 0 .708-.708L8.707 7l1.147-1.146a.5.5 0 0 0-.708-.708L8 6.293 6.854 5.146z" />
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Total Tugas Belum Selesai
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                @php
                                $count = 0;
                                foreach ($quizzes as $quiz) {
                                foreach ($quiz_answers as $answer) {
                                if ($answer->quiz_id == $quiz->id) {
                                $count++;
                                }
                                }
                                }
                                @endphp
                                {{ $quizzes->count() - $count }}
                            </p>
                        </div>
                    </div>
                    <!-- Card -->
                </div>

                <!-- New Table -->
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        @if ($subjects->count() <= 0) <table class="w-full whitespace-no-wrap">
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center justify-center text-lg group">
                                            <span class="font-bold text-center">Tidak Ada Materi</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            </table>
                            @else
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">Materi</th>
                                        <th class="px-4 py-3">Tugas</th>
                                        <th class="px-4 py-3">Tanggal</th>
                                        <th class="px-4 py-3"></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    @foreach ($subjects as $subject)
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3">
                                            <div class="flex items-center text-sm group">
                                                <a href="{{ route('user.subject.show',$subject->id) }}">
                                                    <div>
                                                        <p class="text-base font-semibold group-hover:text-purple-600">{{ $subject->name }}</p>
                                                        <p class="text-xs text-gray-600 dark:text-gray-400 group-hover:text-purple-600">
                                                            Pemrograman Dasar
                                                        </p>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-xs">
                                            @if ($subject->quiz_id)
                                            @php
                                            $now = new DateTime();
                                            $deadline = new DateTime($subject->quiz->deadline);
                                            @endphp
                                            @if (count($quiz_answers)>0)
                                            @foreach ($quiz_answers as $answer)

                                            @if ($subject->quiz_id==$answer->quiz_id)
                                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                Selesai
                                            </span>
                                            @break
                                            @else
                                            @if ($now>$deadline)
                                            <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                                                Belum Selesai
                                            </span>
                                            @else
                                            <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                                Terlambat
                                            </span>
                                            @endif
                                            @endif
                                            @endforeach
                                            @else
                                            @if ($now>$deadline)
                                            <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full whitespace-nowrap dark:text-white dark:bg-orange-600">
                                                Belum Selesai
                                            </span>
                                            @else
                                            <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full whitespace-nowrap dark:text-red-100 dark:bg-red-700">
                                                Terlambat
                                            </span>
                                            @endif
                                            @endif
                                            @else
                                            <span class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full whitespace-nowrap dark:text-gray-100 dark:bg-gray-700">
                                                Tidak Ada Tugas
                                            </span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-sm">{{ $subject->created_at->format('d/M/Y') }}</td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center space-x-4 text-sm">
                                                <a href="{{ route('user.subject.show',$subject->id) }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-folder2-open" viewBox="0 0 16 16">
                                                        <path d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v.64c.57.265.94.876.856 1.546l-.64 5.124A2.5 2.5 0 0 1 12.733 15H3.266a2.5 2.5 0 0 1-2.481-2.19l-.64-5.124A1.5 1.5 0 0 1 1 6.14V3.5zM2 6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3H2.5a.5.5 0 0 0-.5.5V6zm-.367 1a.5.5 0 0 0-.496.562l.64 5.124A1.5 1.5 0 0 0 3.266 14h9.468a1.5 1.5 0 0 0 1.489-1.314l.64-5.124A.5.5 0 0 0 14.367 7H1.633z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
                    </div>
                </div>
            </div>
        </main>

        <button class="fixed px-3 py-1 transition-all bg-white rounded-full shadow-lg hover:animate-bounce right-4 bottom-4" id="btn-help">
            <i class="text-3xl text-purple-600 bi bi-question-circle"></i>
        </button>

        <div class="fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-black/70" id="help" style="display: none">
            <div class="w-1/2 px-4 py-2 bg-white rounded-lg">
                <i class="inline-block w-full my-1 text-2xl text-right text-purple-600 cursor-pointer bi bi-x-lg" id="close"></i>
                <i class="inline-block w-full my-3 text-5xl text-center text-purple-600 bi bi-question-circle"></i>
                <div class="flex flex-col my-4">
                    <span class="text-lg font-bold text-purple-600 underline">Deskripsi </span>
                    <span class="text-slate-800">Web learning rpl adalah web pembelajaran yang digunakan dalam sistem pembelajaran di SMK Sinar Husni Medan Kelas XI RPL. Tujuannya adalah sebagai media dalam meningkatkan efisiensi pembelajaran di sekolah yang diharapkan dapat meningkatkan efisiensi dalam pembelajaran</span>
                </div>
                <div class="flex flex-col my-4">
                    <span class="text-lg font-bold text-purple-600 underline">Panduan penggunaan</span>
                    <span class="text-slate-800">Untuk kelas XI RPL 1 agar dapat mengakses web learning diharapkan untuk login terlebih dahulu menggunakan email atau dengan cara mengisi data diri.
                        Materi, contoh, tugas, dan link video pembelajaran yang di upload harap dipelajari untuk menambah pengetahuan selain dari pembelajaran tatap muka di kelas
                        Untuk tugas harap dikerjakan sebelum dateline
                        Terimakasih</span>
                </div>
                <div class="flex flex-col my-4">
                    <span class="text-lg font-bold text-purple-600 underline">Bantuan</span>
                    <span class="text-slate-800">Jika terdapat masalah atau ada pertanyaan lebih lanjut hubungi
                        <br />0822-2557-7858
                        <br />+62 853-6081-7899
                        <br />Atau
                        Instagram: kartinijuitaa</span>

                </div>
            </div>
        </div>

    </div>

</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $("#btn-help").click(() => {
            $("#help").show();
        })

        $("#close").click(() => {
            $("#help").hide();
        })

    })

</script>
@endsection
