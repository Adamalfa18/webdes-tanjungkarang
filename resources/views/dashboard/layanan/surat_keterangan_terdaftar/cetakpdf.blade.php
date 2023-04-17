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
            font-size: 9pt;
        }
    </style>
    <center>
        <h3>Daptar Pengajuaan Surat Keterangan Terdaftar</h3>
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
                <th scope="col">Alamat Pengaju</th>
                <th scope="col">Kepentingan</th>
                <th scope="col">Letak Tanah</th>
                <th scope="col">Luas Tanah</th>
                <th scope="col">Status Tanah</th>
                <th scope="col">Batas Utara</th>
                <th scope="col">Batas Selatan</th>
                <th scope="col">Batas Timur</th>
                <th scope="col">Batas Barat</th>
                <th scope="col">Tanggal Pengajuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($surat_keterangan_terdaftar as $skt)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $skt->data_penduduk->nama }}</td>
                    <td>{{ $skt->data_penduduk->nik }}</td>
                    <td>{{ $skt->data_penduduk->genders->jenis }}</td>
                    <td>{{ $skt->data_penduduk->tanggal_lahir }}</td>
                    <td>{{ $skt->data_penduduk->warganegara->setatus }}</td>
                    <td>{{ $skt->data_penduduk->religions->agama }}</td>
                    <td>{{ $skt->data_penduduk->professions->kelompok }}</td>
                    <td>{{ $skt->data_penduduk->alamat }}</td>
                    <td>{{ $skt->kepentingan }}</td>
                    <td>{{ $skt->letak_tanah }}</td>
                    <td>{{ $skt->luas_tanah }}</td>
                    <td>{{ $skt->status_tanah }}</td>
                    <td>{{ $skt->batas_utara }}</td>
                    <td>{{ $skt->batas_selatan }}</td>
                    <td>{{ $skt->batas_timur }}</td>
                    <td>{{ $skt->batas_barat }}</td>
                    <td>{{ $skt->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>
