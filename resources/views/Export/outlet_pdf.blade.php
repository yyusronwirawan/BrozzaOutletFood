<!DOCTYPE html>
<html>
<head>
    <title>Data Outlet</title>
    @include('Export.styleCetak')
</head>
<body>
    <h2>Data Outlet</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Email</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
            </tr>
        </thead>
        <tbody>
            @foreach($outlet as $index => $data)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $data->user->username }}</td>
                    <td>{{ $data->user->email }}</td>
                    <td>{{ $data->user->nama_pengguna }}</td>
                    <td>{{ $data->user->alamat }}</td>
                    <td>{{ $data->user->tlp }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
