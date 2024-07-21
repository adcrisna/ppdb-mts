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
                    <b>Data Pendaftaran</b> <br>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title"></h3>
                    </div>
                    @if (!empty($user->Siswa))
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div>
                                       <!-- <div class="box-header">
                                            <h3 class="box-title"></h3>
                                        </div>-->
                                        <div class="box-body">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td width="200px">
                                                            <h4><b><u>Nomor Pendaftaran </u></b></h4>
                                                        </td>
                                                        <td>: </td>
                                                        <td>
                                                            <h4>{{ @$user->Hasil->no_pendaftaran }}</h4>
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
                                    </div>
                                </div>
                                <div class="col sm-4">
                                   <img class="img-responsive" src="{{ asset('foto/' . @$user->Siswa->foto) }}"
                                        alt="Attachment Image" style="width: 150px; height: 200px; object-fit: cover; float: right; margin-right: 50px; border-radius: 8px; border: 2px solid #ddd;">
                             

                                    <!--<img class="img-responsive" src="{{ asset('foto/' . @$user->Siswa->foto) }}"
                                        alt="Attachment Image" style="width: 215px; float: right; margin-right: 50px;">-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="box box-success">
                                        <!--<div class="box-header">
                                            <h3 class="box-title"></h3>
                                        </div>-->
                                        <div class="box-body">
                                            <h4><u><b>DATA CALON SISWA</b></u></h4>
                                            <br>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td width="150px"><b>Nama Lengkap</b></td>
                                                        <td width="350px">: {{ @$user->name }}</td>
                                                        <td width="150px"><b>Email</b></td>
                                                        <td>: {{ @$user->email }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td width="150px"><b>NISN</b></td>
                                                        <td width="350px">: {{ @$user->nisn }}</td>
                                                        <td width="150px"><b>Tempat Lahir</b></td>
                                                        <td>: {{ @$user->Siswa->tempat_lahir }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td width="150px"><b>Tanggal Lahir</b></td>
                                                        <td width="350px">: {{ @$user->Siswa->tanggal_lahir }}</td>
                                                        <td width="150px"><b>Jenis Kelamin</b></td>
                                                        <td>: {{ @$user->Siswa->jenis_kelamin }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td width="150px"><b>Agama</b></td>
                                                        <td width="350px">: {{ @$user->Siswa->agama }}</td>
                                                        <td width="150px"><b>No Telepon/Whatsapp</b></td>
                                                        <td>: {{ @$user->Siswa->no_hp }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td width="150px"><b>Alamat</b></td>
                                                        <td width="350px">: {{ @$user->Siswa->alamat }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="box box-success">
                                        <!--<div class="box-header">
                                            <h3 class="box-title"></h3>
                                        </div>-->
                                        <div class="box-body">
                                            <h4><u><b>DATA ORANG TUA</b></u></h4>
                                            <br>
                                            <h4><u><b>A. AYAH</b></u></h4>
                                            <br>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td width="150px"><b>Nama Lengkap</b></td>
                                                        <td width="350px">: {{ @$user->OrangTua->nama_ayah }}</td>
                                                        <td width="150px"><b>Tempat Lahir</b></td>
                                                        <td>: {{ @$user->OrangTua->tempat_lahir_ayah }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td width="150px"><b>Tanggal Lahir</b></td>
                                                        <td width="350px">: {{ @$user->OrangTua->tanggal_lahir_ayah }}
                                                        </td>
                                                        <td width="150px"><b>Pendidikan Terakhir</b></td>
                                                        <td>: {{ @$user->OrangTua->pendidikan_terakhir_ayah }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td width="150px"><b>Pekerjaan</b></td>
                                                        <td width="350px">: {{ @$user->OrangTua->pekerjaan_ayah }}</td>
                                                        <td width="150px"><b>No Telepon/Whatsapp</b></td>
                                                        <td>: {{ @$user->OrangTua->no_hp_ayah }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td width="150px"><b>Alamat</b></td>
                                                        <td width="350px">: {{ @$user->OrangTua->alamat_ayah }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <h4><u><b>B. IBU</b></u></h4>
                                            <br>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td width="150px"><b>Nama Lengkap</b></td>
                                                        <td width="350px">: {{ @$user->OrangTua->nama_ibu }}</td>
                                                        <td width="150px"><b>Tempat Lahir</b></td>
                                                        <td>: {{ @$user->OrangTua->tempat_lahir_ibu }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td width="150px"><b>Tanggal Lahir</b></td>
                                                        <td width="350px">: {{ @$user->OrangTua->tanggal_lahir_ibu }}</td>
                                                        <td width="150px"><b>Pendidikan Terakhir</b></td>
                                                        <td>: {{ @$user->OrangTua->pendidikan_terakhir_ibu }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td width="150px"><b>Pekerjaan</b></td>
                                                        <td width="350px">: {{ @$user->OrangTua->pekerjaan_ibu }}</td>
                                                        <td width="150px"><b>No Telepon/Whatsapp</b></td>
                                                        <td>: {{ @$user->OrangTua->no_hp_ibu }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td width="150px"><b>Alamat</b></td>
                                                        <td width="350px">: {{ @$user->OrangTua->alamat_ibu }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            @if(
                                                @$user->OrangTua->nama_wali ||
                                                @$user->OrangTua->tempat_lahir_wali ||
                                                @$user->OrangTua->tanggal_lahir_wali ||
                                                @$user->OrangTua->pendidikan_terakhir_wali ||
                                                @$user->OrangTua->pekerjaan_wali ||
                                                @$user->OrangTua->no_hp_wali ||
                                                @$user->OrangTua->alamat_wali ||
                                                @$user->OrangTua->hubungan_wali
                                            )
                                            <h4><u><b>C. WALI</b></u></h4>
                                            <br>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td width="150px"><b>Nama Lengkap</b></td>
                                                        <td width="350px">: {{ @$user->OrangTua->nama_wali }}</td>
                                                        <td width="150px"><b>Tempat Lahir</b></td>
                                                        <td>: {{ @$user->OrangTua->tempat_lahir_wali }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td width="150px"><b>Tanggal Lahir</b></td>
                                                        <td width="350px">: {{ @$user->OrangTua->tanggal_lahir_wali }}
                                                        </td>
                                                        <td width="150px"><b>Pendidikan Terakhir</b></td>
                                                        <td>: {{ @$user->OrangTua->pendidikan_terakhir_wali }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td width="150px"><b>Pekerjaan</b></td>
                                                        <td width="350px">: {{ @$user->OrangTua->pekerjaan_wali }}</td>
                                                        <td width="150px"><b>No Telepon/Whatsapp</b></td>
                                                        <td>: {{ @$user->OrangTua->no_hp_wali }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td width="150px"><b>Alamat</b></td>
                                                        <td width="350px">: {{ @$user->OrangTua->alamat_wali }}</td>
                                                        <td width="150px"><b>No Telepon/Whatsapp</b></td>
                                                        <td>: {{ @$user->OrangTua->hubungan_wali }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="box box-success">
                                        <!--<div class="box-header">
                                            <h3 class="box-title"></h3>
                                        </div>-->
                                        <div class="box-body">
                                            <h4><u><b>DATA ASAL SEKOLAH</b></u></h4>
                                            <br>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td width="150px"><b>Nama Asal Sekolah</b></td>
                                                        <td width="350px">: {{ @$user->Sekolah->nama_sekolah }}</td>
                                                        <td width="150px"><b>Status Sekolah</b></td>
                                                        <td>: {{ @$user->Sekolah->status_sekolah }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td width="150px"><b>Tanggal Kelulusan</b></td>
                                                        <td width="350px">: {{ @$user->Sekolah->tanggal_lulus }}</td>
                                                        <td width="150px"><b>Alamat Asal Sekolah</b></td>
                                                        <td>: {{ @$user->Sekolah->alamat_sekolah }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="box box-success">
                                        <!--<div class="box-header">
                                            <h3 class="box-title"></h3>
                                        </div>-->
                                        <div class="box-body">
                                            <h4><u><b>DATA NILAI</b></u></h4>
                                            <br>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td width="240px"><b>Bahasa Indonesia Kelas IV Semester 1</b></td>
                                                        <td width="100px">: {{ @$user->Nilai->bi_iv_sm_1 }}</td>
                                                        <td width="150px"><b>IPA Kelas IV Semester 1</b></td>
                                                        <td width="100px">: {{ @$user->Nilai->ipa_iv_sm_1 }}</td>
                                                        <td width="200px"><b>Matematika Kelas IV Semester 1</b></td>
                                                        <td>: {{ @$user->Nilai->mt_iv_sm_1 }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <!-- <table>
                                                <tbody>
                                                    <tr>
                                                        <td><img src="{{ asset('foto/' . @$user->Berkas->rapor_4_sm_1) }}"
                                                                class="zoom">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table> -->
                                            <hr>
                                            <br>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td width="240px"><b>Bahasa Indonesia Kelas IV Semester 2</b></td>
                                                        <td width="100px">: {{ @$user->Nilai->bi_iv_sm_2 }}</td>
                                                        <td width="150px"><b>IPA Kelas IV Semester 2</b></td>
                                                        <td width="100px">: {{ @$user->Nilai->ipa_iv_sm_2 }}</td>
                                                        <td width="200px"><b>Matematika Kelas IV Semester 2</b></td>
                                                        <td>: {{ @$user->Nilai->mt_iv_sm_2 }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <!-- <table>
                                                <tbody>
                                                    <tr>
                                                        <td><img src="{{ asset('foto/' . @$user->Berkas->rapor_4_sm_2) }}"
                                                                class="zoom">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table> -->
                                            <hr>
                                            <br>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td width="240px"><b>Bahasa Indonesia Kelas V Semester 1</b></td>
                                                        <td width="100px">: {{ @$user->Nilai->bi_v_sm_1 }}</td>
                                                        <td width="150px"><b>IPA Kelas V Semester 1</b></td>
                                                        <td width="100px">: {{ @$user->Nilai->ipa_v_sm_1 }}</td>
                                                        <td width="200px"><b>Matematika Kelas V Semester 1</b></td>
                                                        <td>: {{ @$user->Nilai->mt_v_sm_1 }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <!-- <table>
                                                <tbody>
                                                    <tr>
                                                        <td><img src="{{ asset('foto/' . @$user->Berkas->rapor_5_sm_1) }}"
                                                                class="zoom">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table> -->
                                            <hr>
                                            <br>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td width="240px"><b>Bahasa Indonesia Kelas V Semester 2</b></td>
                                                        <td width="100px">: {{ @$user->Nilai->bi_v_sm_2 }}</td>
                                                        <td width="150px"><b>IPA Kelas V Semester 2</b></td>
                                                        <td width="100px">: {{ @$user->Nilai->ipa_v_sm_2 }}</td>
                                                        <td width="200px"><b>Matematika Kelas V Semester 2</b></td>
                                                        <td>: {{ @$user->Nilai->mt_v_sm_2 }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <!-- <table>
                                                <tbody>
                                                    <tr>
                                                        <td><img src="{{ asset('foto/' . @$user->Berkas->rapor_5_sm_2) }}"
                                                                class="zoom">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table> -->
                                            <hr>
                                            <br>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td width="240px"><b>Bahasa Indonesia Kelas VI Semester 1</b></td>
                                                        <td width="100px">: {{ @$user->Nilai->bi_vi_sm_1 }}</td>
                                                        <td width="150px"><b>IPA Kelas VI Semester 1</b></td>
                                                        <td width="100px">: {{ @$user->Nilai->ipa_vi_sm_1 }}</td>
                                                        <td width="200px"><b>Matematika Kelas VI Semester 1</b></td>
                                                        <td>: {{ @$user->Nilai->mt_vi_sm_1 }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <!-- <table>
                                                <tbody>
                                                    <tr>
                                                        <td><img src="{{ asset('foto/' . @$user->Berkas->rapor_6_sm_1) }}"
                                                                class="zoom">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table> -->
                                            <br>
                                            @if (@$user->Siswa->is_reguler == 1)
                                                <h4><u><b>NIILAI ASPD</b></u></h4>
                                                <hr>
                                                <br>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td width="120px"><b>Bahasa Indonesia</b></td>
                                                            <td width="200px">: {{ @$user->Nilai->bi_un }}</td>
                                                            <td width="40px"><b>IPA</b></td>
                                                            <td width="200px">: {{ @$user->Nilai->ipa_un }}</td>
                                                            <td width="90px"><b>Matematika</b></td>
                                                            <td>: {{ @$user->Nilai->mt_un }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <br>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td><img src="{{ asset('foto/' . @$user->Nilai->skhun) }}"
                                                                    class="zoom">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            @endif
                                            <br>
                                            <h4><u><b>DATA BERKAS</b></u></h4>
                                            <hr>
                                            <br>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td><img src="{{ asset('foto/' . @$user->User->Berkas->ijazah_skl) }}"
                                                                class="zoom">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="{{ asset('foto/' . @$user->User->Berkas->akta_kel) }}"
                                                                class="zoom">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>   
                                            <br>
                                            <h4><u><b>DATA PRESTASI</b></u></h4>
                                            <hr>
                                            <br>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td width="100px"><b>Jenis Prestasi</b></td>
                                                        <td width="200px">: {{ @$user->Nilai->jenis_prestasi }}</td>
                                                        <td width="100px"><b>Nama Prestasi</b></td>
                                                        <td>: {{ @$user->Nilai->nama_prestasi }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td><img src="{{ asset('foto/' . @$user->Nilai->bukti_prestasi) }}"
                                                                class="zoom">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <hr>
                                            <br>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td width="200px">
                                                            <h4><u><b>STATUS VERIF BERKAS</b></u></h4>
                                                        </td>
                                                        <td width="200px">: {{ @$user->Hasil->status }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td width="200px">
                                                            <h4><u><b>CATATAN BERKAS</b></u></h4>
                                                        </td>
                                                        <td width="200px">: {{ @$user->Hasil->catatan_berkas ?? '-' }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="box box-success">
                                        <!--<div class="box-header">
                                            <h3 class="box-title"></h3>
                                        </div>-->
                                        <div class="box-body">
                                            <center><a href="https://wa.me/+6285172116048" class="btn btn-default"><i
                                                        class="fa fa-whatsapp"> LINK
                                                        GROUP
                                                        WHATSAPP CALON SISWA BARU</i></a></center>

                                            <br>
                                            <center><a href="{{ route('pdfBuktiPendaftaran', $user->id) }}"
                                                    class="btn btn-success" target="_blink"><i class="fa fa-print"> LINK
                                                        CETAK BUKTI PENDAFTARAN</i></a></center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <center>
                            <h4 class="text-danger">Data tidak tersedia, silahkan melakukan pendaftaran terlebih dahulu!
                            </h4>
                            <br>
                            <br>
                        </center>
                    @endif
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
