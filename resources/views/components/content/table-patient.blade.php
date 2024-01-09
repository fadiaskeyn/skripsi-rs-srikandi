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
                        <a class="inline-flex items-center px-4 py-2 rounded-lg bg-theme-border-sidebar/20 text-theme-border-sidebar text-sm md:text-left font-medium" href="{{route('registration.patient-entry.create', ['medrec_number' => $row['medrec_number']]) }}">Registrasi</a>

                        <a class="inline-flex items-center px-4 py-2 rounded-lg bg-theme-border-sidebar/20 text-theme-border-sidebar text-sm md:text-left font-medium" href="{{ route('registration.registration.patient-entry.historipatient', ['medrec_number' => $row['medrec_number']]) }}">Histori</a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
