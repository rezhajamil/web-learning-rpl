@extends('layouts.app')
@section('content')
    
<div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
    <div
    class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800"
    >
    <div class="flex flex-col overflow-y-auto md:flex-row">
        <div class="hidden h-32 md:h-auto md:w-1/2 sm:block">
            <img
                aria-hidden="true"
                class="object-cover w-full h-full dark:hidden"
                src="/images/create-account-office.jpeg"
                alt="Office"
            />
            <img
                aria-hidden="true"
                class="hidden object-cover w-full h-full dark:block"
                src="/images/create-account-office-dark.jpeg"
                alt="Office"
            />
        </div>
        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <form class="w-full" action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <h1 class="mb-4 text-xl font-semibold text-center text-gray-700 sm:text-left dark:text-gray-200">
                    Daftar Akun
                </h1>
                <label class="flex justify-center">
                    <div class="relative group">
                        <img src="{{ $data['avatar'] }}" alt="avatar" class="object-cover rounded-full h-36 w-36 avatar-img">
                        <input type="hidden" name="google_avatar" value="{{ $data['avatar'] }}">
                        <div class="absolute inset-0 flex-col items-center justify-center hidden w-full h-full transition bg-purple-600 rounded-full group-hover:flex flex-nowrap">
                            <label for="avatar" class="my-auto font-semibold text-white">Ganti Foto</label>
                            <input type="file" class="opacity-0 -z-10" name="form_avatar" id="avatar" accept="image/*" onchange="previewImage()">
                        </div>
                    </div>
                    @error('form_avatar')
                        <span class="text-red-500 dark:text-red-500">{{ $message }}</span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-200">Nama Lengkap</span>
                    <input
                    class="block w-full mt-1 text-sm capitalize dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    type="text"
                    placeholder="Nama Lengkap"
                    name="name"
                    value="{{ ucwords(strtolower($data['name'])) }}"
                    required
                    />
                    @error('name')
                        <span class="text-red-500 dark:text-red-500">{{ $message }}</span>
                    @enderror
                </label>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Email</span>
                    <input
                        class="block w-full mt-1 text-sm text-white bg-purple-600 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Email"
                        type="text"
                        name="email"
                        value="{{ $data['email'] }}"
                        readonly="readonly"
                    />
                    @error('email')
                        <span class="text-red-500 dark:text-red-500">{{ $message }}</span>
                    @enderror
                </label>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">No Telepon</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="No Telepon"
                        name="phone"
                        type="number"
                        required
                    />
                    @error('phone')
                        <span class="text-red-500 dark:text-red-500">{{ $message }}</span>
                    @enderror
                </label>
                <div class="mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                    Jenis Kelamin
                    </span>
                    <div class="mt-2">
                    <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                        <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="gender" value="Pria" checked>
                        <span class="ml-2">Pria</span>
                    </label>
                    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                        <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="gender" value="Wanita">
                        <span class="ml-2">Wanita</span>
                    </label>
                    </div>
                    @error('gender')
                        <span class="text-red-500 dark:text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <input type="hidden" name="email_verified_at" value="{{ $data['email_verified_at'] }}">
                @error('email_verified_at')
                        <span class="text-red-500 dark:text-red-500">{{ $message }}</span>
                @enderror

                <button type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Daftar Akun
                </button>
            </form>
        </div>
    </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        function previewImage() {
            const input = document.querySelector('input[name=form_avatar]');
            const preview = document.querySelector('.avatar-img');
            const file = input.files[0];
            const reader = new FileReader();

            reader.addEventListener('load', function() {
                preview.src = reader.result;
            });

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection