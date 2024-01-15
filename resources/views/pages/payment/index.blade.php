@extends('layouts.app')
@section('content')
<div class="w-full bg-white">
    <div class="space-y-8">
        <div class="head">
            <h2 class="text-3xl font-bold">Data Jenis Pembayaran</h2>
        </div>
        <div class="line h-2 rounded-full w-full bg-theme-border-sidebar/20">
            <div class="line h-2 rounded-full w-2/4 bg-theme-border-sidebar"></div>
        </div>
    </div>
    <div class="shadow border p-5 mt-20 bg-white">
        <div class="p-2 lg:flex grid space-y-5 grid-cols-1 justify-between">
            <div class="mt-3">
                <h2 class="text-2xl font-bold">Table Jenis Pembayaran</h2>
            </div>
            <div>
                <a href="{{ route('admin.payment.create') }}" class="px-7 py-3 text-white rounded-lg bg-theme-border-sidebar">Tambah Data<span class="ml-4 mt-4"><iconify-icon icon="octicon:plus-16" class="text-sm"></iconify-icon></span></a>
            </div>
        </div>

        {{-- Table --}}
        <x-content.table :headers="['No','Nama Pembayaran','Action']" :rows="$data" edit="admin.payment.edit" url="/admin/payment/"/>

    </div>
</div>
@endsection
@push('script-injection')
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Batal',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if(!result.isConfirmed) return;

            const formElement = `<form action="{{ route('admin.payment.index') }}/${id}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>`;

            $(formElement).appendTo('body').submit();
        });
    }
</script>
@endpush
