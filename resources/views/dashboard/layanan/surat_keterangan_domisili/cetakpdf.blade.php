<!DOCTYPE html>
<html>

<head>
    <title>PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 12pt;
        }
    </style>
    <center>
        <h3>Daftar Pengajuaan Surat Keterangan Domisili</h3>
        <h3>Desa Tanjungkarang </h3>
    </center>
    <table class="table table-bordered" border="0.5">
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
            </tr>
        </thead>
        <tbody>
            @foreach ($surat_keterangan_domisili as $skd)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $skd->data_penduduk->nama }}</td>
                    <td>{{ $skd->data_penduduk->nik }}</td>
                    <td>{{ $skd->data_penduduk->genders->jenis }}</td>
                    <td>{{ $skd->data_penduduk->tanggal_lahir }}</td>
                    <td>{{ $skd->data_penduduk->warganegara->setatus }}</td>
                    <td>{{ $skd->data_penduduk->religions->agama }}</td>
                    <td>{{ $skd->data_penduduk->professions->kelompok }}</td>
                    <td>{{ $skd->data_penduduk->warganegara->setatus }}</td>
                    <td>{{ $skd->data_penduduk->marriages->status }}</td>
                    <td>{{ $skd->data_penduduk->alamat }}</td>
                    <td>{{ $skd->prihal }}</td>
                    <td>{{ $skd->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>
