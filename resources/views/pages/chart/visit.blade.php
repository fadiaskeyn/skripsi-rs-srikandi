@extends('layouts.app')
@section('content')
   <div class="space-y-8">
        <div class="border p-10 rounded-md shadow-sm">
            <div class="lg:flex justify-center w-full">
                <div class="w-full text-center lg:text-left p-5 space-y-8">
                    <h2 class="font-bold text-2xl">Grafik Kunjungan </h2>
                        <div class="mt-5 max-w-2xl space-y-5">


                            {{-- yang dicoment ini dipake tapi aku dah gakuat T_T --}}
                            {{-- <x-forms.select name="ruangan" id="ruangan" label="Ruangan" placeholder="Semua Ruangan" /> --}}

                            <div class="flex gap-5 max-w-lg">
                                <x-forms.input name="tanggal_start" type="date" id="tanggal_start" label="Tanggal Awal" />
                                <x-forms.input name="tanggal_end" type="date" id="tanggal_end" label="Tanggal Akhir" />
                            </div>
                            <button id="filterBtn" class="bg-orange-950 text-white px-4 py-2 rounded-md" type="submit">Filter</button>
                        </div>
                    <div class="shadow">
                        {!! $chart->container() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script-injection')
    {!! $chart->script() !!}
@endpush
