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
        <h3>Daftar Pengajuaan Surat Keterangan Meninggal</h3>
        <h3>Desa Tanjungkarang </h3>
    </center>
    <table class="table table-bordered" border="0.5">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pengaju</th>
                <th scope="col">Nik</th>
                <th scope="col">No Hp</th>
                <th scope="col">Nama Alm</th>
                <th scope="col">Nik </th>
                <th scope="col">Jenis </th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Warga Negara</th>
                <th scope="col">Agama</th>
                <th scope="col">Status Pernikahan</th>
                <th scope="col">Pekerjaan</th>
                <th scope="col">Alamat</th>
                <th scope="col">Tanggal Meninggal</th>
                <th scope="col">Tempat Meninggal</th>
                <th scope="col">Sebab Meninggal</th>
                <th scope="col">Jam Meninggal</th>
                <th scope="col">Tanggal Pengajuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($surat_keterangan_meninggal as $skm)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $skm->data_penduduk->nama }}</td>
                    <td>{{ $skm->data_penduduk->nik }}</td>
                    <td>{{ $skm->data_penduduk->no_hp }}</td>
                    <td>{{ $skm->nama_alm }}</td>
                    <td>{{ $skm->nik_alm }}</td>
                    <td>{{ $skm->jenis_kelamin_alm }}</td>
                    <td>{{ $skm->tanggal_lahir_alm }}</td>
                    <td>{{ $skm->warganegara_alm }}</td>
                    <td>{{ $skm->agama_alm }}</td>
                    <td>{{ $skm->status_pernikahan_alm }}</td>
                    <td>{{ $skm->pekerjaan_alm }}</td>
                    <td>{{ $skm->alamat_alm }}</td>
                    <td>{{ $skm->tanggal_meninggal }}</td>
                    <td>{{ $skm->tempat_meninggal }}</td>
                    <td>{{ $skm->sebab_meninggal }}</td>
                    <td>{{ $skm->jam_meninggal }}</td>
                    <td>{{ $skm->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>
