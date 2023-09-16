<!DOCTYPE html>
<html>

<head>
    @include('Export.styleCetak')
</head>

<body>
    <h2>Data Jadwal Pengiriman</h2>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Tujuan</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwalpengiriman as $jadwal)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $jadwal->Tujuan }}</td>
                    <td>{{ $jadwal->Tanggal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
