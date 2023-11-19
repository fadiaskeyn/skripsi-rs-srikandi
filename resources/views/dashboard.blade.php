@extends('layouts.app')
@section('content')
    <div class="w-full space-y-8">
        <div class="lg:flex grid grid-cols-1 gap-5 w-full justify-center">
            <div class="w-full space-y-5">
                <div class="grid lg:grid-cols-3 grid-cols-1 gap-4 justify-center w-full">
                    <div class="card bg-white border border-gray-200 p-5 w-full rounded-md">     
                        <div class="flex gap-5">
                            <div class="w-full"><iconify-icon icon="solar:calendar-linear" class="text-4xl"></iconify-icon></div>
                            <div class="w-full text-right">
                                <h2 class="font-bold text-lg">Selasa</h2>
                                <p class="text-sm">17 Mar 2023</p>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-white border border-gray-200 p-5 w-full rounded-md">
                        <div class="flex gap-5 w-full">
                            <div class="w-full">
                                <iconify-icon icon="mdi:clock-outline" class="text-4xl"></iconify-icon>
                            </div>
                            <div class="text-right w-full">
                                <h2 class="font-bold text-2xl">8:16 PM</h2>
                                <p class="text-sm">Jam</p>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-white border border-gray-200 p-5 w-full rounded-md">
                        <div class="flex justify-center gap-5 w-full">
                            <div class="w-full"><iconify-icon icon="mdi:bedroom-outline" class="text-5xl"></iconify-icon></div>
                            <div class="text-right w-full">
                                <h2 class="font-bold text-lg text-right">Jumlah Tempat Tidur</h2>
                                <p>50</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full flex gap-4">
                    <div class="card bg-white border border-gray-200 p-5 w-full rounded-md">
                        <div class="flex justify-center gap-5 w-full">
                            <div class="w-full"><iconify-icon icon="mdi:bedroom-outline" class="text-5xl"></iconify-icon></div>
                            <div class="text-right w-full">
                                <h2 class="font-bold text-lg text-right">Tempat Tidur Tersedia</h2>
                                <p>20/50</p>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-white border border-gray-200 p-5 w-full rounded-md">
                        <h2 class="font-bold text-lg text-left">Indikator Pelayanan RS Bulan Ini:</h2>
                        <table class="border-collapse border w-full mt-8">
                            <tbody>
                                <tr>
                                    <td><b>BOR</b></td>
                                    <td>65.10%</td>
                                </tr>
                                <tr>
                                    <td><b>ALOS</b></td>
                                    <td>2.13 hari</td>
                                </tr>
                                <tr>
                                    <td><b>TOI</b></td>
                                    <td>1.61 hari</td>
                                </tr>
                                <tr>
                                    <td><b>BTO</b></td>
                                    <td>6.74 kali</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="card h-auto bg-white border border-gray-200 p-5 w-full rounded-md">     
                    <div class="head text-center">
                        <h2 class="text-2xl font-bold">Grafik Kunjungan</h2>
                    </div>
                    <div class="flex justify-center w-full">
                        <div id="chart"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-white border border-gray-200 p-5 w-full rounded-md">
            <h2 class="font-bold text-lg">Pasien Masuk Hari Ini</h2>     
            <table class="table-pasien w-full border-collapse border mt-8">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>No.RM</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Usia</th>
                        <th>Ruang RI</th>
                        <th>Kelas</th>
                        <th>Cara Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('script-injection')
    <script>
        
      
        var options = {
          series: [25, 15, 44, 55, 41, 17],
          chart: {
          width: '100%',
          type: 'pie',
        },
        labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
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

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
@endpush