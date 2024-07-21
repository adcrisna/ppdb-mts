<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pendaftar</title>
    <style>
        .logo {
            float: left;
        }

        .textHeader {
            text-align: center;
        }

        .tableLaporan {}

        table {
            border-collapse: collapse;
        }

        td {
            border: black 1x solid;
            padding: 5px;
            margin: 0px;
        }

        th {
            border: black 1x solid;
            padding: 5px;
            margin: 0px;
        }

        .ttd2 {
            float: right;
        }

        .ttd1 {
            float: left;
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
    <br>
    <div class="textHeader">
        <p><b>LAPORAN <br>
                DATA PENDAFTARAN <br> TAHUN AJARAN {{ $tahun }}/{{ $tahun + 1 }}</b></p>
    </div>
    <br>
    @if ($hasil == '[]')
        <div class="textHeader">
            <p><b>DATA TIDAK DITEMUKAN</b></p>
        </div>
    @else
        <div class="tableLaporan">
            <table>
                <thead>
                    <tr>
                        <th width="40">No</th>
                        <th width="100">Tanggal daftar</th>
                        <th width="110">No Pendaftaran</th>
                        <th width="80">NISN</th>
                        <th width="150">Nama Siswa</th>
                        <th width="150">Asal Sekolah</th>
                        <th width="70">Jalur Pendaftaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasil as $key => $value)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ date('d-m-Y', strtotime(@$value->created_at)) }}</td>
                            <td>{{ @$value->no_pendaftaran }}</td>
                            <td>{{ @$value->User->nisn }}</td>
                            <td>{{ @$value->User->name }}</td>
                            <td>{{ @$value->User->Sekolah->nama_sekolah }}</td>
                            <td>{{ @$value->User->Siswa->is_reguler == 1 ? 'Reguler' : 'Prestasi' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
    <br>
    <br>
    <br>
    <div class="ttd1">
        <table>
            <tbody>
                <tr>
                    <td style="border: white !important">Sleman, {{ date('d F ') }}{{ $tahun }},</td>
                </tr>
                <tr>
                    <td style="border: white !important">Panitia PSB,</td>
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
                    <td style="border: white !important">.....................................</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="ttd2">
        <table>
            <tbody>
                <tr>
                    <td style="border: white !important">Sleman, {{ date('d F ') }}{{ $tahun }},</td>
                </tr>
                <tr>
                    <td style="border: white !important">Kepala Madrasah,</td>
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
                    <td style="border: white !important">.....................................</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
