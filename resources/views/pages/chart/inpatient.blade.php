@extends('layouts.app')
@section('content')
    <div class="space-y-8">
        <div class="border p-10 rounded-md shadow-sm">
            <div class="lg:flex justify-center w-full">
                <div class="w-full text-center lg:text-left p-5 space-y-8">
                    <h2 class="font-bold text-2xl">Grafik Barber Jhonson</h2>
                   {!! $chart->container() !!}
                </div>
                <div class="lg:w-2/4 w-full">
                    <x-content.table-chart/>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script-injection')
    {!! $chart->script() !!}
    
@endpush
