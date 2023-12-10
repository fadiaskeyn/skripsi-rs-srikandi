@extends('layouts.app')
@section('content')
    <div class="w-full">
        <div class="w-full bg-white rounded">
            <div class="space-y-8 pb-8">
                <div class="head">
                    <h2 class="text-3xl font-bold">Form Register Pasien Pindah</h2>
                </div>
                <div class="line h-2 rounded-full w-full bg-theme-border-sidebar/20">
                    <div class="line h-2 rounded-full w-2/4 bg-theme-border-sidebar"></div>
                </div>
            </div>
                {{-- form start --}}
                <div class="lg:flex grid grid-cols-1 w-full gap-5">
                    <div class="w-full">
                        <form id="move-form" class="mt-5 lg:w-3/4 w-full p-8" action="{{ route('registration.patient-move.store') }}" method="POST" autocomplete="off">
                            @csrf
                            <div class="md:flex md:items-center mb-6 gap-2">
                                <input type="hidden" name="medrec_number" id="medrec_number" value="{{ old('medrec_number') }}">
                                <input type="hidden" name="entry_id" id="entry_id" value="{{ old('entry_id') }}">
                                <x-forms.input id="rm" type="text" name="rm" label="No. RM" />
                                <button type="button" class="bg-theme-border-sidebar text-white px-4 py-2 rounded-full" id="rm-button">
                                    <iconify-icon icon="mingcute:search-line" class="text-lg"></iconify-icon>
                                </button>
                            </div>
                            <div class="md:flex md:items-center mb-6 gap-2">
                                <x-forms.input id="fullname" type="text" name="fullname" label="Nama Pasien" />
                            </div>
                            <div class="md:flex md:items-center mb-6 gap-2">
                                <x-forms.select id="initial_room" type="text" name="initial_room" label="Ruang Awal" :options="$rooms"  />
                            </div>
                            <div class="md:flex md:items-center mb-6 gap-2">
                                <x-forms.select id="moving_room" name="moving_room" label="Ruang Tujuan" :options="$rooms" />
                            </div>
                            <div class="md:flex md:items-center mb-6 gap-2">
                                <x-forms.select id="nursing_class" name="nursing_class" label="Kelas Rawat" :options="[1 => 'Kelas I', 'Kelas II', 'Kelas III']"  />
                            </div>
                            <div class="md:flex md:items-center mb-6 gap-2">
                                <x-forms.select id="payment_id" type="text" name="payment_id" label="Jenis Pembayaran" :options="$payments" />
                            </div>
                            <div class="md:flex md:items-center mb-6 gap-2">
                                <x-forms.input id="date" type="date" name="date" label="Tgl Pindah" :value="date('Y-m-d')"  />
                            </div>
                        </form>
                    </div>
                    <div class="w-full mt-5 pb-20">
                        <table class="table-pasien w-full border-collapse border mt-8">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No.RM</th>
                                    <th>Nama Pasien</th>
                                    <th>Ruangan Awal</th>
                                    <th>Kelas</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Ruang Tujuan</th>
                                    <th>Tanggal Pindah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($movingPatients as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->patient->medrec_number }}</td>
                                    <td>{{ $data->patient->fullname }}</td>
                                    <td>{{ $data->initialRoom->name }}</td>
                                    <td>{{ $data->moving_nursing_class }}</td>
                                    <td>{{ $data->entry->date->format('d-m-Y') }}</td>
                                    <td>{{ $data->movingRoom->name }}</td>
                                    <td>{{ $data->date->format('d-m-Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="flex gap-5 justify-start pb-8">
                    <button id="move-btn" class="bg-theme-secondary px-8 py-2 text-white">Simpan</button>
                    <button class="bg-theme-secondary px-8 py-2 text-white">Cancel</button>
                </div>
                {{-- form end --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script-injection')
<script>
    $('#move-btn').click(() => $('#move-form').trigger('submit'));

    $('#rm-button').click(function() {
        const medrec = $('#rm').val();

        $.ajax({
            url: `/registrasi/patient-entry/${medrec}`,
            dataType: 'JSON',
            success(res) {
                const entryData = res.data;

                $('#entry_id').val(entryData.id);
                $('#fullname').val(entryData.patient.fullname);
                $('#initial_room').val(entryData.room.id);
                $('#nursing_class').val(entryData.nursing_class);
                $('#payment_id').val(entryData.payment.id);
                $('#room_id').val(entryData.room.id);
            },
            error() {
                $('form').trigger('reset');
                $('#entry_id').val('');

                Swal.fire({
                    icon: 'error',
                    title: 'Pasien tidak ditemukan',
                    timer: 1300,
                });
            },
        });
    });
</script>
@endpush
