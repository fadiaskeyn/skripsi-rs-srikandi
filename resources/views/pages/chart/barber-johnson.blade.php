@extends('layouts.app')
@section('content')

   <div class="space-y-8">
        <div class="border rounded-md p-10 shadow-sm">
            <h2 class="text-2xl font-bold">Grafik Barber Jhonson</h2>
            <div class="lg:flex justify-between">
                <div class="w-full">
                    <div class="mt-8 grid grid-cols-1 gap-5 lg:max-w-lg max-w-full">
                        <div class="flex gap-5">
                            <label for="" class="mt-3">Bulan</label>
                            <select name="" class="bg-gray-100 rounded-full p-3 w-full" id="date">
                                @forelse ($periods as $period)
                                <option value="{{ "{$period->month}-{$period->year}" }}">{{ "{$period->month}-{$period->year}" }}</option>
                                @empty
                                <option value="">--Pilih Bulan--</option>
                                @endforelse
                            </select>
                        </div>
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
    series: [],
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

function updateTable(data) {
    $('#bor-1').html((100 - data.bor).toFixed(3))
    $('#bor-2').html(data.bor.toFixed(3))

    $('#los-1').html(data.toi.toFixed(3))
    $('.los-2').each((i, el) => el.innerHTML = data.alos.toFixed(3))

    $('.toi-1').each((i, el) => el.innerHTML = data.toi.toFixed(3));
    $('#toi-2').html(data.alos.toFixed(3))

    $('.bto').each((i, el) => el.innerHTML = (data.days / data.bto).toFixed(3))

    $('#titik-1').html(data.toi.toFixed(3))
    $('#titik-2').html(data.alos.toFixed(3))
}

function updateChart() {
    const datevalue = $('#date').val();
    const [month, year] = datevalue.split('-');

    $.ajax({
        url: '{{ route('admin.chart.barber-johnson.json') }}',
        data: {
            month,
            year,
        },
        success(res) {
            updateTable(res.data);

            const data = res.data;
            const series = [{
                    name: 'BOR',
                    color: '#3c85e6',
                    data: [{ x: 0, y: 0 }, { x: (100 - data.bor).toFixed(3), y:data.bor.toFixed(3) }],
                }, {
                    name: 'LOS',
                    color: '#e83838',
                    data: [{ x: 0, y: data.toi.toFixed(3) }, { x: data.alos.toFixed(3), y: data.alos.toFixed(3) }],
                }, {
                    name: 'TOI',
                    color: '#20d42c',
                    data: [{ x: data.toi.toFixed(3), y: 0 }, { x: data.toi.toFixed(3), y: data.alos.toFixed(3) }],
                }, {
                    name: 'BTO',
                    color: '#941e8e',
                    data: [{ x: (data.days / data.bto).toFixed(3), y: 0 }, { x: 0, y: (data.days / data.bto).toFixed(3) }],
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
                }];

            chart.updateOptions({series});
        },
        error(res) {
            console.log(res);
        },
    });
}

$('#date').change((e) => updateChart());

updateChart();
</script>
@endpush
