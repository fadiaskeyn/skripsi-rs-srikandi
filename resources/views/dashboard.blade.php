@extends('layouts.app')
@section('content')
    <div class="w-full space-y-8">
        <div class="lg:flex grid grid-cols-1 gap-5 w-full justify-center">
            <div class="w-full space-y-5">
                <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4 justify-center w-full">
                    <div class="card bg-white border border-gray-200 p-5 w-full rounded-md">
                        <div class="flex flex-col gap-2">
                            <div class="w-full"><iconify-icon icon="solar:calendar-linear" class="text-3xl"></iconify-icon></div>
                            <div class="w-full">
                                <h2 class="font-bold text-sm">Selasa</h2>
                                <p class="text-sm">17 Mar 2023</p>
                        <div class="flex gap-5">
                            <div class="w-full"><iconify-icon icon="solar:calendar-linear" class="text-4xl"></iconify-icon></div>
                            <div class="w-full text-right">
                                <h2 class="font-bold text-lg" id="day"></h2>
                                <p class="text-sm" id="date"></p>
                            </div>


                        </div>
                    </div>
                    <div class="card bg-white border border-gray-200 p-5 w-full rounded-md">
                        <div class="flex flex-col gap-2 w-full">
                            <div class="w-full">
                                <iconify-icon icon="mdi:clock-outline" class="text-3xl"></iconify-icon>
                            </div>
                            <div class="w-full">
                                <h2 class="font-bold text-sm">8:16 PM</h2>
                                <p class="text-sm">Jam</p>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-white border border-gray-200 p-5 w-full rounded-md">
                        <div class="flex flex-col justify-center gap-2 w-full">
                            <div class="w-full"><iconify-icon icon="mdi:bedroom-outline" class="text-3xl"></iconify-icon></div>
                            <div class=" w-full">
                                <h2 class="font-bold text-sm">Jumlah Tempat Tidur</h2>
                                <p>50</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full flex gap-4">
                    <div class="card bg-white border border-gray-200 p-5 w-full rounded-md">
                        <div class="flex flex-col justify-center gap-2 w-full">
                            <div class="w-full"><iconify-icon icon="mdi:bedroom-outline" class="text-5xl"></iconify-icon></div>
                            <div class="text-left w-full">
                                <h2 class="font-bold text-sm text-left">Tempat Tidur Tersedia</h2>
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
        {{-- <div class="card bg-white border border-gray-200 p-5 w-full rounded-md">
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
                        @for($i = 0; $i < 9; $i++)
                            <td></td>
                        @endfor
                    </tr>
                </tbody>
            </table>
        </div> --}}
    </div>
@endsection

@push('script-injection')

    {{-- Birthday --}}
    <script>
        const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

        const currentDate = new Date();
        const day = days[currentDate.getDay()];
        const date = currentDate.getDate();
        const month = months[currentDate.getMonth()];
        const year = currentDate.getFullYear();

        document.getElementById('day').innerHTML = day;
        document.getElementById('date').innerHTML = `${date} ${month} ${year}`;
    </script>

    {{-- Time --}}
    <script>
        // Get the current time
        const currentTime = new Date();
        const hours = currentTime.getHours();
        const minutes = currentTime.getMinutes();

        // Format the time
        let formattedTime = `${hours}:${minutes}`;
        formattedTime += hours >= 12 ? " PM" : " AM";

        // Update the time element
        const timeElement = document.getElementById("time");
        if (timeElement) {
            timeElement.textContent = formattedTime;
        }
    </script>
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
