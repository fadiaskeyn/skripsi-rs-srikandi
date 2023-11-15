@extends('layouts.app')
@section('content')
    <div class="w-full">
        <div class="w-full bg-white">
            <div class="space-y-8 pb-8">
                <div class="head">
                    <h2 class="text-3xl font-bold">Data Pengguna</h2>
                </div>
                <div class="line h-2 rounded-full w-full bg-theme-border-sidebar/20">
                    <div class="line h-2 rounded-full w-2/4 bg-theme-border-sidebar"></div>
                </div>
            </div>
                {{-- form start --}}
                <form class="mt-5 w-full max-w-sm" action="{{ route('admin.pengguna.store') }}" method="POST" autocomplete="off">
                    @csrf

                    <div class="md:flex md:items-center mb-6 w-full gap-2">
                        <x-forms.input id="name" type="text" name="name" label="Nama Pengguna" />
                    </div>
                    <div class="md:flex md:items-center mb-6 gap-2">
                        <x-forms.input id="position" type="text" name="position" label="Jabatan" />
                    </div>
                    <div class="md:flex md:items-center mb-6 gap-2">
                        <x-forms.input id="employee_number" type="text" name="employee_number" label="No Pegawai" />
                    </div>
                    <div class="md:flex md:items-center mb-6 gap-2">
                        <x-forms.input id="email" type="email" name="email" label="Email" />
                    </div>
                    <div class="md:flex md:items-center mb-6 gap-2">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold mx-auto md:text-left mb-1 md:mb-0" for="inline-full-name">
                                Role Pengguna
                            </label>
                        </div>
                        <div class="md:w-2/3 relative">
                            <select name="role" id=""  class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-full w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white">
                                <option selected disabled value="0">Pilih akses</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <span class="absolute right-4 top-2"><iconify-icon icon="ep:arrow-down-bold"></iconify-icon></span>
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6 gap-2">
                        <x-forms.input id="username" type="text" name="username" label="Username" />
                    </div>
                    <div class="md:flex md:items-center mb-6 gap-2">
                        <x-forms.input id="password" type="password" name="password" label="Password" />
                    </div>
                    <div class="bg-white flex gap-5 ">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-theme-border-sidebar hover:bg-gray-700 text-white text-sm md:text-left font-medium ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                            </svg>
                            Tambah
                        </button>
                        <a href="{{ route('admin.pengguna.index') }}" class="inline-flex items-center px-4 py-2 bg-theme-border-sidebar hover:bg-gray-700 text-white text-sm md:text-left font-medium">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg> --}}
                            Kembali
                        </a>
                        </div>
                    </div>
                </form>
                {{-- form end --}}
            </div>
            </div>
        </div>
    </div>
@endsection
