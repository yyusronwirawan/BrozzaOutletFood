<!DOCTYPE html>
<html>
<head>
    <title>Data Pegawai</title>
    @include('Export.styleCetak')
</head>
<body>
    <h2>Data Pegawai</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Pegawai</th>
                <th>Username</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Telepon</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengguna as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_pengguna }}</td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->tlp }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
