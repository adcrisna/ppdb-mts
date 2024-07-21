@extends('layouts.user')
@section('css')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/morris/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.min.css') }}">
    <style>
        img.zoom {
            width: 230px;
            height: 200px;
            -webkit-transition: all .2s ease-in-out;
            -moz-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
            -ms-transition: all .2s ease-in-out;
        }

        .transisi {
            -webkit-transform: scale(1.8);
            -moz-transform: scale(1.8);
            -o-transform: scale(1.8);
            transform: scale(1.8);
        }
    </style>
@endsection

@section('content')
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="{{ route('user.index') }}"><i class="fa fa-home"></i> Beranda</a></li>
        </ol>
    </section>
    <br>
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <br />
                <div class="login-logo">
                    <b><u>HASIL SELEKSI</u></b> <br>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title"></h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-3">
                            </div>
                            <div class="col-sm-6">
                                <div class="box box-success">
                                    <div class="box-header">
                                        <h3 class="box-title"></h3>
                                    </div>
                                    @if (!empty($user->Siswa))
                                        <div class="box-body">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td width="250px">
                                                            <h4><b><u>Nomor Pendaftaran </u></b></h4>
                                                        </td>
                                                        <td width="20">: </td>
                                                        <td>
                                                            <h4>{{ @$user->Hasil->no_pendaftaran }}</h4>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h4><b><u>NISN </u></b></h4>
                                                        </td>
                                                        <td>: </td>
                                                        <td>
                                                            <h4>{{ @$user->nisn }}
                                                            </h4>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h4><b><u>Nama Lengkap </u></b></h4>
                                                        </td>
                                                        <td>: </td>
                                                        <td>
                                                            <h4>{{ @$user->name }}
                                                            </h4>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h4><b><u>Jalur Pendaftaran </u></b></h4>
                                                        </td>
                                                        <td>: </td>
                                                        <td>
                                                            <h4>
                                                                @if (!empty(@$user->Siswa))
                                                                    {{ @$user->Siswa->is_reguler == 1 ? 'Reguler' : 'Prestasi' }}
                                                                @endif
                                                            </h4>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <center>
                                            <h4 class="text-danger">Hasil seleksi belum tersedia!
                                            </h4>
                                            <br>
                                            <br>
                                        </center>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <br>
                        @if (!empty($user->Siswa))
                            <div class="row text-center">
                                @if (!empty(@$user->Hasil->keterangan))
                                    @if (@$user->Hasil->keterangan == 'DITERIMA')
                                            <h4 class="text-primary"><b>DITERIMA</b></h4>
                                    @elseif (@$user->Hasil->keterangan == 'TIDAK DITERIMA')
                                            <h4 class="text-danger"><b>TIDAK DITERIMA</b></h4>
                                    @else
                                            <h4 class="text-warning"><b>PROSES SELEKSI</b></h4>
                                    @endif
                                @endif
                            </div>
                            <div class="row text-center">
                                @if (@$user->Hasil->keterangan == 'DITERIMA')
                                    <p>Silahkan melakukan Pendaftaran Ulang pada tanggal :</p>
                                    <p><u>20 Mei 2024 - 30 Mei 2024</u></p>
                                    <br>
                                    <p><b>BERKAS YANG HARUS DIKUMPULKAN :</b></p>
                                    <p>1. Cetak Bukti Diterima, <a href="{{ route('pdfBuktiHasilSeleksi', $user->id) }}">Klik Disini</a></p>
                                    <p>2. Pass Foto Hitam Putih Terbaru Ukuran 3x4 (4 Lembar)</p>
                                    <p>3. Foto Copy Kartu Keluarga (2 Lembar)</p>
                                    <p>4. Foto Copy Akta Kelahiran (2 Lembar)</p>
                                    <p>5. Foto Copy Kartu NISN</p>
                                    <p>6. Foto Copy Ijazah</p>
                                    <p>7. Foto Copy SKHUN</p>
                                    <p>8. Foto Copy Rapor Kelas IV, V, VI Semester 1</p>
                                    <p>9. Foto Copy Piagam Prestasi (Wajib Bagi Jalur Prestasi)</p>
                                    <p>10. Foto Copy Kartu Jaminan Sosial (Jika Ada)</p>
                                    <br>
                                    <p>Edaran Rincian Pembayaran Daftar Ulang Dapat dilihat, <a href="#">Disini</a>
                                    </p>
                                    <br>
                                    <p><b>Catatan Penting!</b></p>
                                    <p>1. Pengumpulan Persyaratan Pendaftaran Ulang dilayani pada tanggal 20-27 Juni 2024,
                                        Mulai
                                        Pukul 08:00 - 11:30 WIB dengan cara datang langsung ke MTS Negeri 2 Sleman</p>
                                    <p>2. Pembayaran Pendaftaran Ulang di ruang komite MTS Negeri 2 Sleman, dilayani mulai
                                        tanggal 20-27 Juni 2024, Pukul 08:00-11:30 WIB</p>
                                    <p>3. PASTIKAN SELURUH BERKAS LENGKAP DAN BENAR</p>
                                @else
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </div>
        <br>
        <br>
    </section>
@endsection

@section('javascript')
    <script src="{{ asset('adminlte/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/raphael/raphael-min.js') }}"></script>
    <script type="text/javascript">
        var table = $('#data-product').DataTable();
        $(document).ready(function() {
            $('.zoom').hover(function() {
                $(this).addClass('transisi');
            }, function() {
                $(this).removeClass('transisi');
            });
        });
    </script>
@endsection
