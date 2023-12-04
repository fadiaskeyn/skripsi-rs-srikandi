@extends('layouts.app')
@section('content')
    <div class="w-full">
        <div class="w-full bg-white rounded">
            <div class="space-y-8 pb-8">
                <div class="head">
                    <h2 class="text-3xl font-bold">Form Register Pasien Keluar</h2>
                </div>
                <div class="line h-2 rounded-full w-full bg-theme-border-sidebar/20">
                    <div class="line h-2 rounded-full w-2/4 bg-theme-border-sidebar"></div>
                </div>
            </div>
                {{-- form start --}}
                <form class="mt-5 lg:w-3/4 w-full p-8 " action="{{ route('registration.histori.store') }}" method="POST" autocomplete="off">
                    @csrf
                    @include('pages.registrasi.partials.form-control-out')
                </form>
                {{-- form end --}}
                </div>
            </div>  
        </div>
    </div>
@endsection
