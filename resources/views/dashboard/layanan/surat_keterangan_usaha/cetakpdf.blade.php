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
            font-size: 10pt;
        }
    </style>
    <center>
        <h3>Daftar Pengajuaan Surat Keterangan Usaha</h3>
        <h3>Desa Tanjungkarang </h3>
    </center>
    <center>

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
                    <th scope="col">Nama Usaha</th>
                    <th scope="col">Jenis Usaha</th>
                    <th scope="col">Alamat Usaha</th>
                    <th scope="col">Tanggal Pengajuan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($surat_keterangan_usaha as $sku)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $sku->data_penduduk->nama }}</td>
                        <td>{{ $sku->data_penduduk->nik }}</td>
                        <td>{{ $sku->data_penduduk->genders->jenis }}</td>
                        <td>{{ $sku->data_penduduk->tanggal_lahir }}</td>
                        <td>{{ $sku->data_penduduk->warganegara->setatus }}</td>
                        <td>{{ $sku->data_penduduk->religions->agama }}</td>
                        <td>{{ $sku->data_penduduk->professions->kelompok }}</td>
                        <td>{{ $sku->data_penduduk->alamat }}</td>
                        <td>{{ $sku->nama_usaha }}</td>
                        <td>{{ $sku->jenis_usaha }}</td>
                        <td>{{ $sku->alamat_usaha }}</td>
                        <td>{{ $sku->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </center>


</body>

</html>
