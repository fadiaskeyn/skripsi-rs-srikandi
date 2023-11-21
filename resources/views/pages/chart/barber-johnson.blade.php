@extends('layouts.app')
@section('content')

   <div class="space-y-8">
        <div class="border rounded-md p-10 shadow-sm">
            <h2 class="text-2xl font-bold">Grafik Barber Jhonson</h2>
            <div class="lg:flex justify-between">
                <div class="w-full">
                    <div class="mt-8 grid grid-cols-1 gap-5 lg:max-w-lg max-w-full">
                        <div class="flex gap-5">
                            <label for="" class="mt-3">Periode</label>
                            <select name="" class="bg-gray-100 rounded-full p-3 w-full" id="">
                                <option value="">-- Pilih Periode --</option>
                            </select>
                        </div>
                        <div class="flex gap-5">
                            <label for="" class="mt-3">Tanggal</label>
                            <div class="lg:flex lg:space-y-0 space-y-5 gap-5 w-full">
                                <input class="bg-gray-100 rounded-full p-3 w-full" type="date" name="" id="">
                                <input class="bg-gray-100 rounded-full p-3 w-full" type="date" name="" id="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 flex justify-center">
                    <div>
                        <button class="bg-theme-secondary px-8 rounded-md py-2 font-bold text-white">Filter</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="border p-10 rounded-md shadow-sm">
            <div class="lg:flex justify-center w-full">
                <div class="w-full text-center lg:text-left p-5 space-y-8">
                    <h2 class="font-bold text-2xl">Grafik Barber Jhonson</h2>
                    <div id="chart"></div>
                </div>
                <div class="lg:w-2/4 w-full">
                    <x-content.table-chart/>
                </div>
            </div>
        </div>
    </div>

   
@endsection

@push('script-injection')
    <script>
var options = {
    series: [{
        name: 'Points',
        type: 'scatter',
        data: [{
            x: 1,
            y: 2.14
        }, {
            x: 1.2,
            y: 2.19
        }, {
            x: 1.8,
            y: 2.43
        }, {
            x: 2.3,
            y: 3.8
        }, {
            x: 2.6,
            y: 4.14
        }, {
            x: 2.9,
            y: 5.4
        }, {
            x: 3.2,
            y: 5.8
        }, {
            x: 3.8,
            y: 6.04
        }, {
            x: 4.55,
            y: 6.77
        }, {
            x: 4.9,
            y: 8.1
        }, {
            x: 5.1,
            y: 9.4
        }, {
            x: 7.1,
            y: 7.14
        },{
            x: 9.18,
            y: 8.4
        }]
    }, {
        name: 'Line',
        type: 'line',
        data: [{
            x: 1,
            y: 2
        }, {
            x: 2,
            y: 3
        }, {
            x: 3,
            y: 4
        }, {
            x: 4,
            y: 5
        }, {
            x: 5,
            y: 6
        }, {
            x: 6,
            y: 7
        }, {
            x: 7,
            y: 8
        }, {
            x: 8,
            y: 9
        }, {
            x: 9,
            y: 10
        }, {
            x: 10,
            y: 11
        }]
    }],
    chart: {
        height: 350,
        type: 'line',
    },
    fill: {
        type:'solid',
    },
    markers: {
        size: [6, 0]
    },
    tooltip: {
        shared: false,
        intersect: true,
    },
    legend: {
        show: false
    },
    xaxis: {
        type: 'numeric',
        min: 0,
        max: 12,
        tickAmount: 12
    }
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();

    </script>
@endpush
