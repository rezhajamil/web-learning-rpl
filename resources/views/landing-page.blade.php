@extends('layouts.app')
@section('content')
<div class="grid w-full h-screen grid-cols-5 p-5 bg-gradient-to-br from-indigo-500 to-purple-900" x-data="{profile:false}">
    <div class="col-span-full sm:col-span-1"></div>
    <div class="flex flex-col items-center justify-center sm:col-span-3 col-span-full">
        <span class="text-3xl font-bold text-center text-white capitalize sm:text-6xl sm:mt-10 xyz-in" xyz="fade duration-20">Web Pembelajaran Learning Pemrograman Dasar XI RPL 1</span>
        <a href="{{ route('user.login.google') }}" class="flex items-center px-3 py-2 my-auto transition-all bg-white border-2 border-white rounded-lg gap-x-3 group hover:border-indigo-800 hover:bg-purple-900">
            <i class="px-2 text-xl font-bold text-indigo-800 transition-all border-r-2 border-indigo-800 bi bi-google group-hover:text-white group-hover:border-white"></i>
            <span class="text-lg font-bold text-indigo-800 capitalize transition-all group-hover:text-white">Masuk Dengan Google</span>
        </a>
    </div>
    <button class="fixed px-4 py-2 font-bold text-purple-900 transition-all bg-white rounded-lg hover:bg-gray-100 bottom-6 right-6" x-on:click="profile=true"><i class="mr-4 text-lg bi bi-person-square"></i>Profil Pengembang</button>

    <div class="fixed inset-0 z-30 flex items-center justify-center w-full h-full p-6 overflow-auto bg-black/80" x-transition x-show="profile">
        <div class="flex flex-col w-full px-8 py-4 bg-white rounded-lg md:w-1/2">
            <button class="mb-4 ml-auto text-3xl font-bold transition-all hover:text-purple-800" x-on:click="profile=false">X</button>
            <div class="mx-auto overflow-hidden rounded-md h-52 w-36">
                <img src="{{ asset('images/kartini.jpg') }}" alt="profil" class="w-full h-full">
            </div>
            <div class="grid grid-cols-2 gap-1 my-6">
                <div class="col-span-2 px-3 py-2 rounded shadow-md md:col-span-1">
                    <span class="block font-bold underline">Nama</span>
                    <span class="block font-base">Kartini Juita Nainggolan</span>
                </div>
                <div class="col-span-2 px-3 py-2 rounded shadow-md md:col-span-1">
                    <span class="block font-bold underline">NIM</span>
                    <span class="block font-base">5181151005</span>
                </div>
                <div class="col-span-2 px-3 py-2 rounded shadow-md md:col-span-1">
                    <span class="block font-bold underline">Tempat Tanggal Lahir</span>
                    <span class="block font-base">Indrapura, 21 April 2000</span>
                </div>
                <div class="col-span-2 px-3 py-2 rounded shadow-md md:col-span-1">
                    <span class="block font-bold underline">Email</span>
                    <span class="block font-base">kartininainggolan91@gmail.com</span>
                </div>
                <div class="col-span-2 px-3 py-2 rounded shadow-md md:col-span-1">
                    <span class="block font-bold underline">Prodi</span>
                    <span class="block font-base">Pendidikan Teknologi Informatika dan Komputer / Jurusan Pendidikan Teknik Elektro / Fakultas Teknik/ Unimed</span>
                </div>
                <div class="col-span-2 px-3 py-2 rounded shadow-md md:col-span-1">
                    <span class="block font-bold underline">Riwayat Pendidikan</span>
                    <ol>
                        <li class="font-base">1. SD Negeri 017976 Indrapura</li>
                        <li class="font-base">2. SMP Negeri 3 Air Putih</li>
                        <li class="font-base">3. SMA Negeri 1 Air Putih</li>
                    </ol>
                </div>
                <div class="col-span-2 px-3 py-2 rounded shadow-md ">
                    <span class="block font-bold underline">Ringkasan Media</span>
                    <span class="block font-base">Media ini dikembangkan sebagai media penulis dalam melakukan penelitian di SMK Sinar Husni Medan. Media ini diharapkan mampu membantu siswa dalam kegiatan belajar mengajar agar tujuan pembelajaran dapat terwujud.</span>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
