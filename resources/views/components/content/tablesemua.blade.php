@props([
    'edit' => '',
    'url' => '',
    'headers' => [],
    'rows' => [],
])
<div class="tables-responsive overflow-y-auto mt-10">
    <table class="tables">
        <thead>
            <tr>
                @foreach ($headers as $header)
                    <th>{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $row)
                <tr>
                    @foreach ($row as $cell)
                        <td>{{ $cell }}</td>
                    @endforeach
                    <td>
                        @if ($row['status_patient'] == 'entry')
                            <a class="inline-flex items-center px-4 py-2 rounded-lg bg-theme-border-sidebar/20 text-theme-border-sidebar text-sm md:text-left font-medium" href="{{route('registration.patient-exit.create', ['medrec_number' => $row['medrec_number']]) }}">Keluar</a>
                            <a class="hidden inline-flex items-center px-4 py-2 rounded-lg bg-red-500 text-white text-sm md:text-left font-medium" href="">Sudah Keluar</a>
                        @elseif ($row['status_patient'] == 'exit')
                            <a class="hidden inline-flex items-center px-4 py-2 rounded-lg bg-theme-border-sidebar/20 text-theme-border-sidebar text-sm md:text-left font-medium" href="{{route('registration.patient-exit.create', ['medrec_number' => $row['medrec_number']]) }}">Keluar</a>
                            <a class="inline-flex items-center px-4 py-2 rounded-lg bg-red-500 text-white text-sm md:text-left font-medium" href="">Sudah Keluar</a>
                        @else
                            <!-- Tampilkan pesan atau logika khusus jika status tidak sesuai dengan 'entry' atau 'exit' -->
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
