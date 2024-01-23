@extends('layouts.print')
@section('print')

@endsection



@push('style-injection')
<style>
    .container-print{
        max-width: 1480px;
        margin: 0 auto;
    }
    @media print {
        .table-print th {
            background: #785839;
            color: white;
            font-size: 14px !important;
        }
        body{
            -webkit-print-color-adjust:exact !important;
            print-color-adjust:exact !important;
        }
    }
</style>
@endpush
