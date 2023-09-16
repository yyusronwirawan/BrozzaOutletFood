<!DOCTYPE html>
<html>
<head>
    <title>Data Truk</title>
    @include('Export.styleCetak')
</head>
<body>
    <h2>Data Truk</h2>
    <table >
        <thead >
            <tr>
                <th >#</th>
                <th >Jenis Truk</th>
                <th >Nomor Plat</th>
                <th >Kapasitas </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($truk as $item)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $item->jenis_truk }}</td>
                    <td>{{ $item->plat_nomor }}</td>
                    <td>{{ $item->kapasitas }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
