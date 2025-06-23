@extends('auth.layouts.main')

@section('container')
<div class="bg-gray-100 font-[sans-serif]">
    <div class="min-h-screen flex flex-col items-center justify-center py-6">
        <div class="max-w-md w-full">
            <div class="text-center mb-8">
                <img src="{{ asset('img/logo.png') }}" alt="logo" class='w-20 mx-auto mb-4' />
                <h1 class="text-gray-800 text-2xl font-bold">
                    E-Jahit
                </h1>
                <p class="text-gray-600 mt-2">Daftar akun baru</p>
            </div>

            <div class="p-8 rounded-2xl bg-white shadow">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <form class="space-y-4" action="{{ route('register.post') }}" method="POST">
                    @csrf
                    <div>
                        <label class="text-gray-800 text-sm mb-2 block">Nama Lengkap</label>
                        <div class="relative flex items-center">
                            <input name="nama" type="text" required value="{{ old('nama') }}"
                                   class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-amber-600"
                                   placeholder="Masukkan Nama Lengkap" />
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-4 h-4 absolute right-4" viewBox="0 0 24 24">
                                <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                                <path d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z" data-original="#000000"></path>
                            </svg>
                        </div>
                        @error('nama')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-800 text-sm mb-2 block">Email</label>
                        <div class="relative flex items-center">
                            <input name="email" type="email" required value="{{ old('email') }}"
                                   class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-amber-600"
                                   placeholder="Masukkan Email" />
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-4 h-4 absolute right-4" viewBox="0 0 24 24">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                        </div>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-800 text-sm mb-2 block">Password</label>
                        <div class="relative flex items-center">
                            <input name="password" type="password" required
                                   class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-amber-600"
                                   placeholder="Masukkan Password (min. 8 karakter)" />
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-4 h-4 absolute right-4 cursor-pointer" viewBox="0 0 128 128">
                                <path d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z" data-original="#000000"></path>
                            </svg>
                        </div>
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="!mt-8">
                        <button type="submit" class="w-full py-3 px-4 text-sm tracking-wide rounded-lg text-white bg-amber-600 hover:bg-amber-700 focus:outline-none transition-colors">
                            Daftar Akun
                        </button>
                    </div>
                </form>

                <p class="text-gray-800 text-sm !mt-8 text-center">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-amber-600 hover:underline ml-1 whitespace-nowrap font-semibold">
                        Masuk disini
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
