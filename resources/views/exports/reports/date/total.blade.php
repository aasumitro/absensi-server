<table>
    <thead>
    {{-- [START] HEADER --}}
    <tr style="text-align: center;">
        <th colspan="8" rowspan="3" style="border: 2px solid black;">Laporan Pegawai format Total</th>
    </tr>
    <tr><th colspan="8"></th></tr>
    <tr><th colspan="8"></th></tr>
    <tr>
        <th colspan="8" rowspan="4" style="border: 2px solid black;">
            SKPD: {{$reports['department']->name}} <br>
            ZONA WAKTU: [{{$reports['department']->timezone->title}}] {{$reports['department']->timezone->locale}} <br>
            RENTANG WAKTU:
            {{\Illuminate\Support\Carbon::parse($reports['from_date'])->format('d-m-Y')}}
            sampai
            {{\Illuminate\Support\Carbon::parse($reports['to_date'])->format('d-m-Y')}} <br>
            TOTAL PEGAWAI: {{$reports['department']->members_count}}
        </th>
    </tr>
    <tr><th colspan="8"></th></tr>
    <tr><th colspan="8"></th></tr>
    <tr><th colspan="8"></th></tr>
    <tr><th colspan="8"></th></tr>
    {{-- [END] HEADER --}}

    <tr>
        <th style="border: 2px solid black;text-align: center;" rowspan="2">Nomor</th>
        <th style="border: 2px solid black;text-align: center;" rowspan="2">Nama</th>
        <th style="border: 2px solid black;text-align: center;" colspan="2">HADIR</th>
        <th style="border: 2px solid black;text-align: center;" colspan="4">TIDAK HADIR</th>
    </tr>
    <tr>
        <th style="border: 2px solid black;text-align: center;">TOTAL</th>
        <th style="border: 2px solid black;text-align: center;">TERLAMBAT</th>
        {{-- <th style="border: 2px solid black;">LEMBUR</th>--}}

        <th style="border: 2px solid black;text-align: center;">TOTAL</th>
        <th style="border: 2px solid black;text-align: center;">SAKIT (SK)</th>
        <th style="border: 2px solid black;text-align: center;">CUTI (CT)</th>
        <th style="border: 2px solid black;text-align: center;">TANPA KETERANGAN (TK)</th>
    </tr>
    </thead>
    <tbody>
    @foreach($reports['attendances'] as $data)
        <tr >
            <td style="border: 2px solid black;">{{ $loop->iteration }}</td>
            <td style="border: 2px solid black;">{{ $data['user']['name'] }}</td>
            <td style="border: 2px solid black;">{{ $data['user']['attend_count'] }}</td>
            <td style="border: 2px solid black;">{{ $data['user']['attend_overdue_count'] }}</td>
            {{--<td style="border: 2px solid black;">{{ $data['user']['attend_overtime_count'] }}</td>--}}
            <td style="border: 2px solid black;">{{ $data['user']['absent_count'] }}</td>
            <td style="border: 2px solid black;">{{ $data['user']['absent_sick_count'] }}</td>
            <td style="border: 2px solid black;">{{ $data['user']['absent_leave_count'] }}</td>
            <td style="border: 2px solid black;">{{ $data['user']['absent_missing_count'] }}</td>
        </tr>
    @endforeach
</table>
