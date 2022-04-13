@extends('layouts.app')
@section('content')
<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    @include('components.user.sidebar')
    @include('components.user.sidebar_mobile')
    
    <div class="flex flex-col flex-1 w-full">
        <x-navbar></x-navbar>
        <main class="h-full overflow-y-auto">
            <div class="container grid px-6 mx-auto my-3 gap-y-4">
                <a href="{{ url()->previous() }}" class="px-3 py-2 font-semibold text-white bg-indigo-600 rounded w-fit"><i class="bi bi-arrow-left"></i> Kembali</a>
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    {{ $title }}
                </h2>
                <form method="post" action="{{ route('admin.quiz.store') }}" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="subject_id" value="{{ $subject }}">
                    <label class="block text-sm">
                        <span class="block mb-3 font-semibold text-gray-700 dark:text-gray-400">
                            Deskripsi
                        </span>
                    </label>
                    <input id="desc" type="hidden" name="desc">
                    <trix-editor input="desc">{!! old('desc') !!}</trix-editor>
                    @error('desc')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                    <label class="block mt-3 mb-2 text-sm" for="file">
                        <span class="block mb-3 font-semibold text-gray-700 dark:text-gray-400">
                            File*
                        </span>
                        <span class="px-3 py-2 font-semibold text-white transition bg-purple-600 hover:bg-purple-800"><i class="mr-2 bi bi-cloud-arrow-up-fill"></i>Upload File</span>
                    </label>
                    <span class="text-neutral-900 file-preview"></span>
                    @error('file')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                    <input type="file" class="absolute block opacity-0 -z-10" name="file" id="file" required onchange="previewFile()">
                    <label class="block mt-5 mb-2 text-sm" for="file">
                        <span class="block mb-3 font-semibold text-gray-700 dark:text-gray-400">
                            Deadline*
                        </span>
                    </label>
                    <input type="datetime-local" class="form-input" name="deadline" id="deadline" value="{{ old('datetime') }}" required>
                    @error('deadline')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                    <button type="submit" class="block px-3 py-2 my-3 font-semibold text-white transition bg-indigo-600 rounded hover:bg-indigo-800">Kirim</button>
                </form>
            </div>
        </main>
    </div>
</div>
    
@endsection

@section('scripts')
    <script>
        function previewFile() {
            const input = document.querySelector('input[name=file]');
            const preview = document.querySelector('.file-preview');
            const file = input.files[0];

            preview.innerHTML = `File Chosen: ${file.name}`;
        }
    </script>
@endsection