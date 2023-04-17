<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body onload="window.print();">
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h3>Daftar Pengajuaan Surat Keterangan Belum Menikahh</h3>
        <h3>Desa Tanjungkarang </h3>
    </center>

    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pengaju</th>
                <th scope="col">Nik</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Warganegara</th>
                <th scope="col">Agama</th>
                <th scope="col">Pekerjaan</th>
                <th scope="col">Warganegara</th>
                <th scope="col">Status Perkawinan</th>
                <th scope="col">Alamat Pengaju</th>
                <th scope="col">Kepentingan</th>
                <th scope="col">Tanggal Pengajuan</th>
        </thead>
        <tbody>
            @foreach ($surat_keterangan_belum_menikah as $skbm)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $skbm->data_penduduk->nama }}</td>
                    <td>{{ $skbm->data_penduduk->nik }}</td>
                    <td>{{ $skbm->data_penduduk->genders->jenis }}</td>
                    <td>{{ $skbm->data_penduduk->tanggal_lahir }}</td>
                    <td>{{ $skbm->data_penduduk->warganegara->setatus }}</td>
                    <td>{{ $skbm->data_penduduk->religions->agama }}</td>
                    <td>{{ $skbm->data_penduduk->professions->kelompok }}</td>
                    <td>{{ $skbm->data_penduduk->warganegara->setatus }}</td>
                    <td>{{ $skbm->data_penduduk->marriages->status }}</td>
                    <td>{{ $skbm->data_penduduk->alamat }}</td>
                    <td>{{ $skbm->prihal }}</td>
                    <td>{{ $skbm->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
