<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti Pendaftaran</title>
    <style>
        .titleLaporan {
            margin-left: 385px;
        }

        .tableLaporan {
            margin-left: 70px;
            margin-top: 50px;
        }

        table {
            border-collapse: collapse;
        }

        .logo {
            float: left;
        }

        .textHeader {
            text-align: center;
        }

        .boxText {
            width: 500px;
            margin-left: 115px;
            border: 1 black solid;
        }

        .textContent {
            margin-left: 150px;
        }

        .passFoto {
            margin-left: 250px;
        }

        .ttd {
            float: right;
        }
    </style>
</head>

<body>
    <div class="logo">
        <img src="{{ public_path() . '/logo-mts.png' }}" alt="logo" width="90px">
    </div>
    <div class="textHeader">
        <p>KEMENTRIAN AGAMA REPUBLIK INDONESIA <br>
            <b>PANITIA PENERIMAAN SISWA BARU (PSB)</b><br>
            <b>MADRASAH TSANAWIYAH NEGERI 2 SLEMAN</b> <br>
            <span style="font-size: 9">Jalan Magelang Km. 17 Margorejo, Tempel Sleman, Daerah Istimewa
                Yogyakarta.</span>
        </p>
    </div>
    <hr>
    <div style="text-align: center">
        <p>KARTU PENDAFTARAN <br>
            CALON SISWA BARU <br>
            TAHUN AJARAN 2024/2025</p>
    </div>
    <div class="boxText">
        <table style="margin:5%">
            <tbody>
                <tr>
                    <td width="200px"><u>Nomor Pendaftaran</u></td>
                    <td width="100%">: {{ $user->Hasil->no_pendaftaran }}</td>
                </tr>
                <tr>
                    <td width="200px"><u>NISN</u></td>
                    <td width="100%">: {{ $user->nisn }}</td>
                </tr>
                <tr>
                    <td width="200px"><u>Jalur Pendaftaran</u></td>
                    <td width="100%">: {{ $user->Siswa->is_reguler == 1 ? 'Reguler' : 'Prestasi' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <br>
    <div class="textContent">
        <table>
            <tbody>
                <tr>
                    <td width="200px">Nama Lengkap</td>
                    <td>: </td>
                    <td>{{ @$user->name }}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <table>
            <tbody>
                <tr>
                    <td width="200px">Tempat Tanggal Lahir</td>
                    <td>: </td>
                    <td>{{ @$user->Siswa->tempat_lahir }}, {{ @$user->Siswa->tanggal_lahir }}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <table>
            <tbody>
                <tr>
                    <td width="200px">Jenis Kelamin</td>
                    <td>: </td>
                    <td>{{ @$user->Siswa->jenis_kelamin }}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <table>
            <tbody>
                <tr>
                    <td width="200px">Asal Sekolah</td>
                    <td>: </td>
                    <td>{{ @$user->Sekolah->nama_sekolah }}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <table>
            <tbody>
                <tr>
                    <td width="200px">Alamat</td>
                    <td>: </td>
                    <td>{{ @$user->Siswa->alamat }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="ttd">
        <table>
            <tbody>
                <tr>
                    <td>Sleman, {{ date('d F Y') }},</td>
                </tr>
                <tr>
                    <td>Panitia PSB,</td>
                </tr>
            </tbody>
        </table>
        <br>
        <br>
        <br>
        <br>
        <br>
        <table>
            <tbody>
                <tr>
                    <td>.....................................</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="passFoto">
        <img src="{{ public_path() . '/foto/' . $user->Siswa->foto }}" alt="logo" width="200px" height="150px">
    </div>
</body>

</html>
