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
                        <a href="">Register</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
