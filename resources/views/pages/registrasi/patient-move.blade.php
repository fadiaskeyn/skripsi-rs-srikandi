@extends('layouts.app')
@section('content')
    <div class="w-full">
        <div class="w-full bg-white rounded">
            <div class="space-y-8 pb-8">
                <div class="head">
                    <h2 class="text-3xl font-bold">Form Register Pasien Pindah</h2>
                </div>
                <div class="line h-2 rounded-full w-full bg-theme-border-sidebar/20">
                    <div class="line h-2 rounded-full w-2/4 bg-theme-border-sidebar"></div>
                </div>
            </div>
                {{-- form start --}}
                <form class="mt-5 lg:w-3/4 w-full p-8" action="#" method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="medrec_number" id="medrec_number" value="">
                    <x-forms.input id="rm" type="text" name="rm" label="No. RM" />
                    <button type="button" class="bg-theme-border-sidebar text-white px-4 py-2 rounded-full" id="rm-button">
                        <iconify-icon icon="mingcute:search-line" class="text-lg"></iconify-icon>
                    </button>

                    <div class="md:flex md:items-center mb-6 gap-2">
                        <x-forms.input id="fullname" type="text" name="fullname" label="Nama Pasien" readonly />
                    </div>
                    <div class="md:flex md:items-center mb-6 gap-2">
                        <x-forms.input id="fullname" type="text" name="fullname" label="Nama Pasien" readonly />
                    </div>
                    <div class="md:flex md:items-center mb-6 gap-2">
                        <x-forms.input id="fullname" type="text" name="fullname" label="Nama Pasien" readonly />
                    </div>
                    <div class="md:flex md:items-center mb-6 gap-2">
                        <x-forms.input id="fullname" type="text" name="fullname" label="Nama Pasien" readonly />
                    </div>
                </form>
                {{-- form end --}}
                </div>
            </div>
        </div>
    </div>
@endsection
