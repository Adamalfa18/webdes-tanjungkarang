<!DOCTYPE html>
<html>

<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
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
        <h3>Daftar Pengajuaan Surat Keterangan Tidak Mampu</h3>
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
                <th scope="col">Prihal</th>
                <th scope="col">Tanggal Pengajuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($surat_keterangan_tidak_mampu as $sktm)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $sktm->data_penduduk->nama }}</td>
                    <td>{{ $sktm->data_penduduk->nik }}</td>
                    <td>{{ $sktm->data_penduduk->genders->jenis }}</td>
                    <td>{{ $sktm->data_penduduk->tanggal_lahir }}</td>
                    <td>{{ $sktm->data_penduduk->warganegara->setatus }}</td>
                    <td>{{ $sktm->data_penduduk->religions->agama }}</td>
                    <td>{{ $sktm->data_penduduk->professions->kelompok }}</td>
                    <td>{{ $sktm->data_penduduk->warganegara->setatus }}</td>
                    <td>{{ $sktm->data_penduduk->marriages->status }}</td>
                    <td>{{ $sktm->data_penduduk->alamat }}</td>
                    <td>{{ $sktm->prihal }}</td>
                    <td>{{ $sktm->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>
