@extends('layouts.app')
@section('content')
   <div class="space-y-8">
        <div class="border p-10 rounded-md shadow-sm">
            <div class="lg:flex justify-center w-full">
                <div class="w-full text-center lg:text-left p-5 space-y-8">
                <div class="mt-5 max-w-2xl space-y-5">
            <x-forms.select name="ruangan" :options="$rooms" id="ruangan" label="Ruangan" placeholder="Semua Ruangan" />
            <div class="flex gap-5 max-w-lg">
                <x-forms.input name="tanggal" type="date"  id="tanggal" label="Tanggal" />
                <x-forms.input name="tanggal" type="date"  id="tanggal" label="" />
            </div>
        </div>
        <div class="flex gap-5 max-w-lg"></div>
                    <h2 class="font-bold text-2xl">Grafik 10 Besar Penyakit Ruang Inap </h2>
                   {!! $chart->container() !!}
                </div>
                <div class="lg:w-2/4 w-full">
                    <x-content.diagnose-table-chart :diagnoses="$diagnoses"/>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script-injection')
    {!! $chart->script() !!}

@endpush
