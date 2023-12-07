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
        name: 'BOR',
        color: '#3c85e6',
        data: [{ x: 0, y: 0 }, { x: 35.48, y: 64.52 }],
    }, {
        name: 'LOS',
        color: '#e83838',
        data: [{ x: 0, y: 5.85 }, { x: 3.05, y: 5.85 }],
    }, {
        name: 'TOI',
        color: '#20d42c',
        data: [{ x: 3.05, y: 0 }, { x: 3.05, y: 5.85 }],
    }, {
        name: 'BTO',
        color: '#941e8e',
        data: [{ x: 8.58, y: 0 }, { x: 0, y: 8.58 }],
    }, {
        name: 'Turun',
        color: '#eb872a',
        data: [{ x: 1, y: 12 }, { x: 1, y: 3 }],
        show: false,
    }, {
        name: 'Miring',
        color: '#220b96',
        data: [{ x: 1, y: 3 }, { x: 3, y: 9 }],
        show: false,
    }, {
        name: 'Naik',
        color: '#471507',
        data: [{ x: 3, y: 9 }, { x: 3, y: 12 }],
        show: false,
    }, {
        name: 'Datar',
        color: '#074712',
        data: [{ x: 3, y: 12 }, { x: 1, y: 12 }],
        show: false,
    }],
    chart: {
        height: 350,
        type: 'line',
    },
    markers: {
        size: 6,
    },
    stroke: {
        width: 2,
    },
    xaxis: {
        type: 'numeric',
        title: {
            text: 'TOI (HARI)'
        }
    },
    yaxis: {
        type: 'numeric',
        title: {
            text: 'AvLOS (HARI)'
        }
    },
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();

</script>


@endpush
