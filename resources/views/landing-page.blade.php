@extends('layouts.app')
@section('content')    
  <div class="grid w-full h-screen grid-cols-5 p-5 bg-gradient-to-br from-indigo-500 to-purple-900">
    <div class="col-span-full sm:col-span-1"></div>
    <div class="flex flex-col items-center justify-center sm:col-span-3 col-span-full">
      <span class="text-3xl font-bold text-center text-white capitalize sm:text-6xl sm:mt-10 xyz-in" xyz="fade duration-20">Web Pembelajaran Learning Pemrograman Dasar XI RPL 1</span>
      <a href="{{ route('user.login.google') }}" class="flex items-center px-3 py-2 my-auto transition-all bg-white border-2 border-white rounded-lg gap-x-3 group hover:border-indigo-800 hover:bg-purple-900">
        <i class="px-2 text-xl font-bold text-indigo-800 transition-all border-r-2 border-indigo-800 bi bi-google group-hover:text-white group-hover:border-white"></i>
        <span class="text-lg font-bold text-indigo-800 capitalize transition-all group-hover:text-white">Masuk Dengan Google</span>
      </a>
    </div>
  </div>
@endsection