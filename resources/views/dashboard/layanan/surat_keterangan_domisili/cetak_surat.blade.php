<html>

<head>
    <meta>
    <style>
        #judul {
            text-align: center;
        }

        #halaman {
            align-content: center;
            width: auto;
            height: auto;
            position: absolute;
            padding-top: 30px;
            padding-left: 30px;
            padding-right: 30px;
            padding-bottom: 80px;
        }

        .surat {
            font-family: 'Times New Roman', Times, serif;
        }

        .logo {
            width: 70px;
            height: 80px;
        }
    </style>

</head>

<body onload="window.print();">
    <div id=halaman class="surat">

        <center>
            <table>
                <tr>
                    <td style="width: 10%;">
                        <img class="logo" src="{{ asset('/images/logo/logo.png') }}" alt="Logo">
                    </td>
                    <td style="width: 90%;">
                        <center>
                            <font size="4">PEMERINTAH KABUPATEN TASIKMALAYA</font> <br>
                            <font size="4">KECAMATAN CIGALONTANG</font><br>
                            <font size=4><b>DESA TANJUNGKARANG</b></font><br>
                            <font><i>
                                    Jl. Garut Tasikmalaya - Jawa Barat Email: desatanjungkarang@mail.com Kode Pos:
                                    46463
                                </i></font>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <hr>
                    </td>
            </table>
        </center>
        <div id=judul>
            <font size=4><b>SURAT KETERANGAN DOMISILI</b></font> <br>
            <font>no/{{ $skd->id }}/skd/{{ \Carbon\Carbon::parse($skd->created_at)->format('Y') }}</font>
            <br><br>
        </div>
        <font>Yang bertanda tangan di bawah ini Kepala Desa Tanjung, Kecamatan Cigalontang, Kabupaten Tasikmalaya,
            Provinsi
            Jawa Barat menerangkan dengan sebenarnya bahwa :</font>
        <table>
            <tr>
                <td style="width: 30%;">Nama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $skd->data_penduduk->nama }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">NIK</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $skd->data_penduduk->nik }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Jenis Kelamin</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $skd->data_penduduk->genders->jenis }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">tanggal lahir</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $skd->data_penduduk->tanggal_lahir }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Warganegara</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $skd->data_penduduk->warganegara->setatus }}}}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Agama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $skd->data_penduduk->religions->agama }}</td>
            </tr>

            <tr>
                <td style="width: 30%;">Pekerjaan</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $skd->data_penduduk->professions->kelompok }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Status Pernikahan</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $skd->data_penduduk->marriages->status }}</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;">Alamat</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;">{{ $skd->data_penduduk->alamat }}</td>
            </tr>
        </table><br>
        <font>Dengan ini menerangkan bahwa benar yang bersangkutan berdomisili di desa Tanjungkarang. <br>
            Surat Keterangan ini dibuat untuk {{ $skd->prihal }}. <br>
            Demikian surat keterangan ini dibuat, atas perhatian dan kerjasamanya kami ucapkan terimakasih..</font>
        <br><br><br>
        <table style="float: right;">
            <tr>
                <td style="text-align:center;">Tasikmalaya,
                    {{ Carbon\Carbon::parse($skd->created_at)->format('d/m/Y') }}
                </td>
            </tr>
            <tr>
                <td>KEPALA DESA TANJUNGKARANG</td>
            </tr>
            <tr>
                <td height="90px"></td>
            </tr>
            <tr>
                <td style="text-align:center;">Lalan Jaelani</td>
            </tr>
        </table>

    </div>
</body>

</html>
