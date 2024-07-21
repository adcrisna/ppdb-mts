@extends('layouts.index')
@section('css')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/morris/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.min.css') }}">
@endsection

@section('content')
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-home"></i> Beranda</a></li>
        </ol>
    </section>
    <br>
    <section class="content">
        <div class="row">
            <!--<img class="img-responsive pad" src="{{ asset('adminlte/dist/img/photo2.png') }}" alt="Photo"
                style="height: 450px; width:100%;">-->
        </div>
        <div class="row">
            <div class="col-sm-12">
                @if (\Session::has('msg_success'))
                    <h5>
                        <div class="alert alert-info">
                            {{ \Session::get('msg_success') }}
                        </div>
                    </h5>
                @endif
                @if (\Session::has('msg_error'))
                    <h5>
                        <div class="alert alert-danger">
                            {{ \Session::get('msg_error') }}
                        </div>
                    </h5>
                @endif
                <br />
                <div class="login-logo">
                    <b>JALUR PENDAFTARAN</b> <br>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-4">
                <div class="box box-success text-center">
                    <div class="box-header">
                        <h3 class="box-title text text-bold">PRESTASI AKADEMIK/NON AKADEMIK</h3>
                    </div>
                    <div class="box-body table-responsive">
                        <img src="{{ asset('adminlte/dist/img/prestasi.png') }}" alt="Prestasi">
                        <br>
                        <br>
                        <p>Selamat datang Calon Peserta Didik Baru di PPDB MTsN 2 Sleman Jalur Prestasi! <br>
                            Terdapat 3 jalur Prestasi yakni : <br>
                            1. Prestasi Akademik (hasil nilai raport dan atau juara kompetisi) <br>
                            2. Prestasi non Akademik (Juara kompetisi non akademik)<br>
                            3. Prestasi Tahfidz (memiliki hafalan Al-Quran minimal juz 30)<br>
                            </p>
                        <br>
                        <button type="button" class="btn btn-success btn-md" data-toggle="modal"
                            data-target="#modal-prestasi"><i class="fa fa-eye"> DETAIL
                            </i></button>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="box box-success text-center">
                    <div class="box-header">
                        <h3 class="box-title text text-bold">REGULER</h3>
                    </div>
                    <div class="box-body table-responsive">
                        <img src="{{ asset('adminlte/dist/img/reguler.png') }}" alt="Prestasi">
                        <br>
                        <br>
                        <p>Selamat datang Calon Peserta Didik Baru di PPDB MTsN 2 Sleman Jalur Reguler!<br>
                            Syarat Umum : <br>
                            1. Lulusan SD/MI pada tahun pelajaran 2023/2024 atau satu tahun sebelumnya. <br>
                            2. Usia Maksimal 15 tahun pada Juli 2024.<br>
                            3. Tidak Bertato dan Bertindik. <br>
                            4. Calon siswa yang berasal dari luar DIY wajib mengikuti tes CBT di Madrasah<br></p>
                        <br>
                        <button type="button" class="btn btn-success btn-md" data-toggle="modal"
                            data-target="#modal-reguler"><i class="fa fa-eye"> DETAIL
                            </i></button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
    </section>
    <div class="modal fade" id="modal-prestasi" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center>
                        <h4 class="modal-title">Jalur Prestasi Akademik / Non Akademik</h4>
                    </center>
                </div>
                <div class="modal-body">
                <p>Selamat datang Calon Peserta Didik Baru di PPDB MTsN 2 Sleman Jalur Prestasi!<br>
                            Terdapat 3 jalur Prestasi yakni : <br>
                            1. Prestasi Akademik (hasil nilai raport dan atau juara kompetisi)<br>
                            2. Prestasi non Akademik (Juara kompetisi non akademik)<br>
                            3. Prestasi Tahfidz (memiliki hafalan minimal juz 30)<br>
                            <br>
                            Persiapkan data dokumen yang akan diinputkan dalam formulir, meliputi :<br>
                            1. NISN (Nomor Induk Siswa Nasional)<br>
                            2. Nilai raport kelas 4-6<br>
                            3. Pass poto 3x4<br>
                            4. Prestasi yang pernah diraih baik akademik maupun non akademik (jika ada)<br><br>
                            Cermati petunjuk pengisian yang terdapat pada halamam formulir. <br>
                            Pada bagian akhir setelah pengiriman data, akan muncul link grup WA bagi calon siswa, klik link tersebut untuk bergabung dan unduh bukti pendaftaran sebagai berkas pelengkap pada saat pengumpulan berkas dan tes seleksi. <br><br>
                            TIMELINE PPDB Jalur Prestasi :<br>
                            Pendaftaran dan pengumpulan berkas : 13-22 Mei 2024<br>
                            Tes Seleksi : 27 Mei 2024<br>
                            Pengumuman : 28 Mei 2024<br>
                            Daftar Ulang : 28-29 Mei 2024</p>
                </div>
                <div class="modal-footer">
                    @if ($dateNow >= $setting->start_prestasi && $dateNow <= $setting->end_prestasi)
                        @if (!empty($user->Siswa->id))
                            <p class="text-danger text-center">Anda Sudah Melakukan Pendaftaran</p>
                        @else
                            <center>
                                <a href="{{ route('login') }}" class="btn btn-success"> DAFTAR JALUR
                                    PRESTASI</a>
                            </center>
                        @endif
                    @else
                        <p class="text-danger text-center">Pendaftaran Prestasi Dimulai Tanggal :
                            {{ date('d F Y', strtotime($setting->start_prestasi)) }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-reguler" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center>
                        <h4 class="modal-title">Jalur Reguler</h4>
                    </center>
                </div>
                <div class="modal-body">
                <p>Selamat datang Calon Peserta Didik Baru di PPDB MTsN 2 Sleman Jalur Reguler!<br>
                        Syarat Umum :<br>
                        1. Lulusan SD/MI pada tahun pelajaran 2023/2024 atau satu tahun sebelumnya.<br>
                        2. Usia Maksimal 15 tahun pada Juli 2024.<br>
                        3. Tidak Bertato dan Bertindik.<br><br>
                        Persiapkan Scan data dokumen yang akan diinputkan dalam formulir (Dokumen harus bertipe PNG/JPG/JPEG maks 2 mb), meliputi :<br>
                        1. NISN (Nomor Induk Siswa Nasional)<br>
                        2. Nilai raport kelas 4-6<br>
                        3. Ijazah atau surat kelulusan asli <br>
                        4. Lembar hasil ASPD Fc/Asli<br>
                        5. Pass foto 3x4 background merah<br>
                        6. Surat keterangan ketercapaian Tahfidz dari kepala sekolah (jika ada)<br>
                        7. Prestasi yang pernah diraih baik akademik maupun non akademik (jika ada)<br><br>
                        Cermati petunjuk pengisian yang terdapat pada setiap pertanyaan.
                        Pada bagian akhir setelah pengiriman data, akan muncul link grup WA bagi calon siswa, klik link tersebut untuk bergabung. <br><br>
                        <span style="color:red;">PENTING!</span> Bagi calon siswa yang berasal dari luar DIY diwajibkan untuk mengikuti tes CBT di madrasah. Info lebih lanjut akan diumumkan di grup WhatsApp<br><br>
                        TIMELINE PPDB Jalur Reguler:<br>
                        Pendaftaran : 1-3 Juli 2024<br>
                        Pengumuman : 4 Juli 2024<br>
                        Daftar Ulang : 4-5 Juli 2024</p>
                </div>
                <div class="modal-footer">
                    @if ($dateNow >= $setting->start_reguler && $dateNow <= $setting->end_reguler)
                        @if (!empty($user->Siswa->id))
                            <p class="text-danger text-center">Anda Sudah Melakukan Pendaftaran</p>
                        @else
                            <center>
                                <a href="{{ route('login') }}" class="btn btn-success"> DAFTAR JALUR
                                    REGULER</a>
                            </center>
                        @endif
                    @else
                        <p class="text-danger text-center">Pendaftaran Reguler Dimulai Tanggal :
                            {{ date('d F Y', strtotime($setting->start_reguler)) }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('adminlte/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/raphael/raphael-min.js') }}"></script>
    <script type="text/javascript">
        var table = $('#data-product').DataTable();
    </script>
@endsection
