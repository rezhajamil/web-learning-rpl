@extends('layouts.app')
@section('content')
<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    @include('components.user.sidebar')
    @include('components.user.sidebar_mobile')

    <div class="flex flex-col flex-1 w-full">
        <x-navbar></x-navbar>
        <main class="h-full overflow-y-auto">
            <div class="w-full px-4 py-2 m-auto mt-6 bg-white rounded-lg shadow-xl md:w-1/2">
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

        </main>
    </div>
</div>
@endsection
