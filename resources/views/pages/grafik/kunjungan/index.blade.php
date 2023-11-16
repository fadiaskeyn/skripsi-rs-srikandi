@extends('layouts.app')
@section('content')
    <div class="space-y-8">
        <div class="border rounded-md p-10 shadow-sm">
            <h2 class="text-2xl font-bold">Grafik Kujungan</h2>
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
                    <h2 class="font-bold text-2xl">Grafik Kunjungan</h2>
                    <div class="chart lg:w-2/4 w-full"></div>
                </div>
                <div class="lg:w-2/4 w-full">
                    <table class="tables mt-8">
                        <thead>
                            <tr>
                                <th class="bg-theme-secondary text-white">Perempuan</th>
                                <th class="bg-theme-secondary text-white">Laki - Laki</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>62%</td>
                                <td>37%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script-injection')
    <script>
    var options = {
            series: [25, 15],
            chart: {
            width: '100%',
            type: 'pie',
        },
        labels: ["Perempuan", "Laki - Laki"],
        theme: {
            monochrome: {
                enabled: true
            }
        },
        plotOptions: {
            pie: {
                dataLabels: {
                offset: -5
                }
            }
        },
        dataLabels: {
            formatter(val, opts) {
                const name = opts.w.globals.labels[opts.seriesIndex]
                return [name, val.toFixed(1) + '%']
            }
        },
            legend: {
            show: false
            }
        };

        var chart = new ApexCharts(document.querySelector(".chart"), options);
        chart.render();
    </script>
@endpush