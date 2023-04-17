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
            <font size=4><b>SURAT KETERANGAN MENINGGAL</b></font> <br>
            <font>no/{{ $skm->id }}/skm/{{ \Carbon\Carbon::parse($skm->created_at)->format('Y') }}</font>
            <br><br>
        </div>
        <font>Yang bertanda tangan di bawah ini Kepala Desa Tanjung, Kecamatan Cigalontang, Kabupaten Tasikmalaya,
            Provinsi
            Jawa Barat menerangkan dengan sebenarnya bahwa :</font>
        <table width="100%">
            <tr>
                <td style="width: 30%;">Nama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $skm->nama_alm }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">NIK</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $skm->nik_alm }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Jenis Kelamin</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $skm->jenis_kelamin_alm }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">tanggal lahir</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $skm->tanggal_lahir_alm }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Warganegara/Agama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $skm->warganegara_alm }}/{{ $skm->agama_alm }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Status Pernikahan</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $skm->status_pernikahan_alm }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Pekerjaan</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $skm->pekerjaan_alm }}</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;">Alamat</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;">{{ $skm->alamat_alm }}</td>
            </tr>
        </table>
        <font>Telah meninggal dunia pada:
        </font>
        <table width="100%">
            <tr>
                <td style="width: 30%;">Tanggal Meninggal
                </td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $skm->tanggal_meninggal }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Jam Meninggal</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $skm->jam_meninggal }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Tempat Meninggal</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $skm->tempat_meninggal }}</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;">Sebab Meninggal</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;">{{ $skm->sebab_meninggal }} </td>
            </tr>
        </table>
        <font>Berdasarkan pernyataan dari:
        </font>
        <table width="100%">
            <tr>
                <td style="width: 30%;">Nama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $skm->data_penduduk->nama }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">NIK</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $skm->data_penduduk->nik }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Tanggal Lahir</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $skm->data_penduduk->tanggal_lahir }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Pekerjaan</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $skm->data_penduduk->professions->kelompok }}</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;">Alamat</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;">{{ $skm->data_penduduk->alamat }}</td>
            </tr>
        </table>

        <font>Surat Keterangan ini dibuat untuk keamanan. <br>
            Demikian surat keterangan ini dibuat, atas perhatian dan kerjasamanya kami ucapkan terima kasih</font>
        <br>
        <table style="float: right;">
            <tr>
                <td style="text-align:center;">Tasikmalaya,
                    {{ Carbon\Carbon::parse($skm->created_at)->format('d/m/Y') }}
                </td>
            </tr>
            <tr>
                <td>KEPALA DESA TANJUNGKARANG</td>
            </tr>
            <tr>
                <td height="50px"></td>
            </tr>
            <tr>
                <td style="text-align:center;">Lalan Jaelani</td>
            </tr>
        </table>

    </div>
</body>

</html>
