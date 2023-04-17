<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h3>Data Yang Menhajukan Pengaduan</h3>
        <h3>Desa Tanjungkarang </h3>
    </center>

    <table class="table table-bordered" border="0.5">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pengadu</th>
                <th scope="col">Perihal</th>
                <th scope="col">Alamat</th>
                <th scope="col">Pengaduan</th>
                <th scope="col">Tanggal Pengaduan</th>

        </thead>
        <tbody>
            @foreach ($pengaduan as $Pengaduan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $Pengaduan->nama }}</td>
                    <td>{{ $Pengaduan->prihal }}</td>
                    <td>{{ $Pengaduan->alamat }}</td>
                    <td>{{ $Pengaduan->pesan }}</td>
                    <td>{{ $Pengaduan->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
