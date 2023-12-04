
<input type="hidden" name="entry_id" id="entry_id">
<div class="flex gap-5 w-full">
    <div class="p-5 lg:w-[50%] w-full">
        <div class="md:flex md:items-center mb-6 gap-2">
            <input type="hidden" name="medrec_number" id="medrec_number" value="">
            <x-forms.input id="rm" type="text" name="rm" label="No. RM" />
            <button type="button" class="bg-theme-border-sidebar text-white px-4 py-2 rounded-full" id="rm-button">
                <iconify-icon icon="mingcute:search-line" class="text-lg"></iconify-icon>
            </button>
        </div>
        <div class="md:flex md:items-center mb-6 gap-2">
            <x-forms.input id="fullname" type="text" label="Nama Pasien" />
        </div>
        <div class="md:flex md:items-center mb-6 gap-2">
            <x-forms.input id="birthdate" type="date" label="Tgl. Lahir" />
        </div>
        <div class="md:flex md:items-center mb-6 gap-2">
            <x-forms.select id="gender" type="text" label="Jenis Kelamin" placeholder="Pilih Jenis Kelamin" :options="['P' => 'P', 'L' => 'L']" />
        </div>
        <div class="md:flex md:items-center mb-6 gap-2">
            <x-forms.input id="address" type="text" label="Alamat" />
        </div>
        <div class="md:flex md:items-center mb-6 gap-2">
            <x-forms.select id="status" label="Status Pasien" placeholder="Pilih Status Pasien" :options="['Baru', 'Lama']" />
        </div>
        <div class="md:flex md:items-center mb-6 gap-2">
            <x-forms.input id="entry_date"  type="date" label="Tanggal Masuk" />
        </div>
    </div>
    <div class="p-5 lg:w-[50%] w-full">
        <div class="md:flex md:items-center mb-6 gap-2">
            <x-forms.select id="service_id"  label="Jenis Pelayanan" placeholder="Pilih Jenis Pelayanan" :options="$services" selected="OBGYN" />
        </div>
        <div class="md:flex md:items-center mb-6 gap-2">
            <x-forms.select id="nursing_class" label="Kelas Rawat" placeholder="Pilih Kelas Rawat" :options="[1 => 'Kelas I', 'Kelas II', 'Kelas III']" selected="1" />
        </div>
        <div class="md:flex md:items-center mb-6 gap-2">
            <x-forms.select id="payment_id" label="Pembayaran" placeholder="Pilih Pembayaran" :options="$payments" selected="1" />
        </div>
        <div class="md:flex md:items-center mb-6 gap-2">
            <x-forms.select id="room_id" label="Ruang Perawatan" placeholder="Pilih Ruang Perawatan" :options="$rooms" />
        </div>
        <div class="md:flex md:items-center mb-6 gap-2">
            <x-forms.input type="date" name="date" id="date" label="Tanggal Keluar" placeholder="Pilih Tanggal keluar" />
        </div>
        <div class="md:flex md:items-center mb-6 gap-2">
            <x-forms.input type="time" name="time" id="time" label="Tanggal Keluar" placeholder="Pilih Jam keluar" />
        </div>
        <div class="md:flex md:items-center mb-6 gap-2">
            <x-forms.input name="long_care" id="long_care" label="Lama Rawat"/>
        </div>
        <div class="md:flex md:items-center mb-6 gap-2">
            <x-forms.select name="way_out" id="way_out" label="Cara keluar" placeholder="Pilih Cara keluar" :options="['Atas Izin Dokter' => 'Atas Izin Dokter', 'Atas Izin Pasien' => 'Atas Izin Pasien']" />
        </div>
        <div class="md:flex md:items-center mb-6 gap-2">
            <x-forms.input name="dpjb" id="dpjb" label="DPJB"  type="text"  />
        </div>
    </div>
</div>
<div class="bg-white flex lg:justify-start justify-center gap-5 pb-20 ">
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-theme-border-sidebar hover:bg-gray-700 text-white text-sm md:text-left font-medium ">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
        </svg>
        Tambah
    </button>
    <a href="{{ route('registration.histori.index') }}" class="inline-flex items-center px-4 py-2 bg-theme-border-sidebar hover:bg-gray-700 text-white text-sm md:text-left font-medium">
        {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg> --}}
        Kembali
    </a>
    </div>
@push('script-injection')
<script>
    $('#rm-button').click(function() {
        const medrec = $('#rm').val();

        $.ajax({
            url: `/registrasi/patient-entry/${medrec}`,
            dataType: 'JSON',
            success(res) {
                const entryData = res.data;

                $('#entry_id').val(entryData.id);
                $('#fullname').val(entryData.patient.fullname);
                $('#birthdate').val(entryData.patient.birthdate);
                $('#gender').val(entryData.patient.gender);
                $('#address').val(entryData.patient.address);
                $('#status').val(entryData.new_patient);
                $('#entry_date').val(entryData.entry_date);
                $('#service_id').val(entryData.service.id);
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

    $("#date").change(function(e) {
        const startDate = new Date($('#entry_date').val());
        const endDate = new Date(this.value);

        const timeDifference = endDate.getTime() - startDate.getTime();
        const daysDifference = timeDifference / (1000 * 3600 * 24);

        $('#long_care').val(daysDifference + ' Hari');
    });
</script>
@endpush
