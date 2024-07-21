@extends('layouts.admin')
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
            <li><a href="{{ route('admin.index') }}"><i class="fa fa-home"></i> Beranda</a></li>
        </ol>
    </section>
    <br>
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <br />
                <div class="login-logo">
                    <b>Detail Verifikasi</b> <br>
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
                            <div class="col-sm-6">
                                <div class="box box-success">
                                    <!--<div class="box-header">
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
                                                        <h4>{{ @$user->no_pendaftaran }}</h4>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h4><b><u>Jalur Pendaftaran </u></b></h4>
                                                    </td>
                                                    <td>: </td>
                                                    <td>
                                                        <h4>
                                                            @if (!empty(@$user->User->Siswa))
                                                                {{ @$user->User->Siswa->is_reguler == 0 ? 'Prestasi' : 'Reguler' }}
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
                                <img class="img-responsive" src="{{ asset('foto/' . @$user->User->Siswa->foto) }}"
                                    alt="Attachment Image" style="width: 215px; float: right; margin-right: 50px;">
                            </div>
                        </div>
                        <form action="{{ route('admin.verifikasi') }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="is_reguler" class="form-control" value="{{@$user->User->Siswa->is_reguler}}">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="box box-success">
                                        <!--<div class="box-header">
                                            <h3 class="box-title"></h3>
                                        </div>-->
                                        <div class="box-body">
                                            <h4><u><b>DATA CALON SISWA</b></u></h4>
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Nama Lengkap:</label>
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ $user->User->name }}" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>NISN:</label>
                                                    <input type="text" class="form-control" name="nisn"
                                                        value="{{ $user->User->nisn }}" required>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Email:</label>
                                                    <input type="text" class="form-control" name="email"
                                                        value="{{ $user->User->email }}" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Alamat:</label>
                                                    <textarea name="alamat" class="form-control" cols="3" rows="3" required>{{ $user->User->Siswa->alamat }}</textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Tempat Lahir:</label>
                                                    <input type="text" class="form-control" name="tempat_lahir"
                                                        value="{{ $user->User->Siswa->tempat_lahir }}" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Tanggal Lahir:</label>
                                                    <input type="date" class="form-control" name="tanggal_lahir"
                                                        value="{{ $user->User->Siswa->tanggal_lahir }}" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Jenis Kelamin:</label>
                                                    <select name="jenis_kelamin" class="form-control" required>
                                                        <option value="">Pilih</option>
                                                        <option value="Laki-Laki"
                                                            {{ $user->User->Siswa->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>
                                                            Laki-Laki</option>
                                                        <option value="Perempuan"
                                                            {{ $user->User->Siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                                            Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Agama:</label>
                                                    <select name="agama" class="form-control" required>
                                                        <option value="">Pilih</option>
                                                        <option value="Islam"
                                                            {{ $user->User->Siswa->agama == 'Islam' ? 'selected' : '' }}>
                                                            Islam</option>
                                                        <!-- <option value="Kristen"
                                                            {{ $user->User->Siswa->agama == 'Kristen' ? 'selected' : '' }}>
                                                            Kristen</option>
                                                        <option value="Buddha"
                                                            {{ $user->User->Siswa->agama == 'Buddha' ? 'selected' : '' }}>
                                                            Buddha</option>
                                                        <option value="Hindu"
                                                            {{ $user->User->Siswa->agama == 'Hindu' ? 'selected' : '' }}>
                                                            Hindu</option>
                                                        <option value="Katolik"
                                                            {{ $user->User->Siswa->agama == 'Katolik' ? 'selected' : '' }}>
                                                            Katolik</option>
                                                        <option value="Khonghucu"
                                                            {{ $user->User->Siswa->agama == 'Khonghucu' ? 'selected' : '' }}>
                                                            Khonghucu</option> -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>No Telepon/Whatsapp:</label>
                                                    <input type="number" class="form-control" name="no_hp"
                                                        value="{{ $user->User->Siswa->no_hp }}" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Pass Foto 3x4(latar belakang merah) Baru:</label>
                                                    <input type="file" class="form-control" name="foto">
                                                </div>
                                            </div>
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
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Nama Lengkap:</label>
                                                    <input type="text" class="form-control" name="nama_ayah"
                                                        value="{{ @$user->User->OrangTua->nama_ayah }}" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Tempat Lahir:</label>
                                                    <input type="text" class="form-control" name="tempat_lahir_ayah"
                                                        value="{{ @$user->User->OrangTua->tempat_lahir_ayah }}" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Tanggal Lahir:</label>
                                                    <input type="date" class="form-control" name="tanggal_lahir_ayah"
                                                        value="{{ @$user->User->OrangTua->tanggal_lahir_ayah }}" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Pendidikan Terakhir:</label>
                                                    <input type="text" class="form-control"
                                                        name="pendidikan_terakhir_ayah"
                                                        value="{{ @$user->User->OrangTua->pendidikan_terakhir_ayah }}"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Pekerjaan:</label>
                                                    <input type="text" class="form-control" name="pekerjaan_ayah"
                                                        value="{{ @$user->User->OrangTua->pekerjaan_ayah }}" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>No HP/Whatsapp:</label>
                                                    <input type="text" class="form-control" name="no_hp_ayah"
                                                        value="{{ @$user->User->OrangTua->no_hp_ayah }}" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label>Alamat:</label>
                                                    <textarea name="alamat_ayah" class="form-control" cols="3" rows="3" required>{{ @$user->User->OrangTua->alamat_ayah }}</textarea>
                                                </div>
                                            </div>
                                            <br>
                                            <h4><u><b>B. IBU</b></u></h4>
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Nama Lengkap:</label>
                                                    <input type="text" class="form-control" name="nama_ibu"
                                                        value="{{ @$user->User->OrangTua->nama_ibu }}" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Tempat Lahir:</label>
                                                    <input type="text" class="form-control" name="tempat_lahir_ibu"
                                                        value="{{ @$user->User->OrangTua->tempat_lahir_ibu }}" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Tanggal Lahir:</label>
                                                    <input type="date" class="form-control" name="tanggal_lahir_ibu"
                                                        value="{{ @$user->User->OrangTua->tanggal_lahir_ibu }}" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Pendidikan Terakhir:</label>
                                                    <input type="text" class="form-control"
                                                        name="pendidikan_terakhir_ibu"
                                                        value="{{ @$user->User->OrangTua->pendidikan_terakhir_ibu }}"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Pekerjaan:</label>
                                                    <input type="text" class="form-control" name="pekerjaan_ibu"
                                                        value="{{ @$user->User->OrangTua->pekerjaan_ibu }}" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>No HP/Whatsapp:</label>
                                                    <input type="text" class="form-control" name="no_hp_ibu"
                                                        value="{{ @$user->User->OrangTua->no_hp_ibu }}" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label>Alamat:</label>
                                                    <textarea name="alamat_ibu" class="form-control" cols="3" rows="3" required>{{ @$user->User->OrangTua->alamat_ibu }}</textarea>
                                                </div>
                                            </div>
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
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Nama Lengkap:</label>
                                                    <input type="text" class="form-control" name="nama_wali"
                                                        value="{{ @$user->User->OrangTua->nama_wali }}">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Tempat Lahir:</label>
                                                    <input type="text" class="form-control" name="tempat_lahir_wali"
                                                        value="{{ @$user->User->OrangTua->tempat_lahir_wali }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Tanggal Lahir:</label>
                                                    <input type="date" class="form-control" name="tanggal_lahir_wali"
                                                        value="{{ @$user->User->OrangTua->tanggal_lahir_wali }}">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Pendidikan Terakhir:</label>
                                                    <input type="text" class="form-control"
                                                        name="pendidikan_terakhir_wali"
                                                        value="{{ @$user->User->OrangTua->pendidikan_terakhir_wali }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Pekerjaan:</label>
                                                    <input type="text" class="form-control" name="pekerjaan_wali"
                                                        value="{{ @$user->User->OrangTua->pekerjaan_wali }}">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>No HP/Whatsapp:</label>
                                                    <input type="text" class="form-control" name="no_hp_wali"
                                                        value="{{ @$user->User->OrangTua->no_hp_wali }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Alamat:</label>
                                                    <textarea name="alamat_wali" class="form-control" cols="3" rows="3">{{ @$user->User->OrangTua->alamat_wali }}</textarea>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Hubungan Wali:</label>
                                                    <input type="text" class="form-control" name="hubungan_wali"
                                                        value="{{ @$user->User->OrangTua->hubungan_wali }}">
                                                </div>
                                            </div>
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
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Nama Asal Sekolah:</label>
                                                    <input type="text" class="form-control" name="nama_sekolah"
                                                        value="{{ $user->User->Sekolah->nama_sekolah }}" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Status Sekolah:</label>
                                                    <select name="status_sekolah" class="form-control" required>
                                                        <option value="">Pilih</option>
                                                        <option value="Negeri"
                                                            {{ $user->User->Sekolah->status_sekolah == 'Negeri' ? 'selected' : '' }}>
                                                            Negeri</option>
                                                        <option value="Swasta"
                                                            {{ $user->User->Sekolah->status_sekolah == 'Swasta' ? 'selected' : '' }}>
                                                            Swasta</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Tanggal Lulus:</label>
                                                    <input type="date" class="form-control" name="tanggal_lulus"
                                                        value="{{ $user->User->Sekolah->tanggal_lulus }}" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Alamat Sekolah:</label>
                                                    <textarea name="alamat_sekolah" class="form-control" cols="3" rows="3" required>{{ $user->User->Sekolah->alamat_sekolah }}</textarea>
                                                </div>
                                            </div>
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
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>Bahasa Indonesia Kelas IV Semester 1:</label>
                                                    <input type="number" class="form-control" step="0.01" name="bi_iv_sm_1"
                                                        value="{{ @$user->User->Nilai->bi_iv_sm_1 }}" required>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>IPA Kelas IV Semester 1:</label>
                                                    <input type="number" class="form-control" step="0.01" name="ipa_iv_sm_1"
                                                        value="{{ @$user->User->Nilai->ipa_iv_sm_1 }}" required>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>Matematika Kelas IV Semester 1:</label>
                                                    <input type="number" class="form-control" step="0.01" name="mt_iv_sm_1"
                                                        value="{{ @$user->User->Nilai->mt_iv_sm_1 }}" required>
                                                </div>
                                            </div>
                                            <br>
                                            <!-- <table>
                                                <tbody>
                                                    <tr>
                                                        <td><img src="{{ asset('foto/' . @$user->User->Berkas->rapor_4_sm_1) }}"
                                                                class="zoom">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Rapor Kelas 4 Semester 1 New:</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="file" class="form-control"
                                                                name="rapor_4_sm_1">
                                                        </td>
                                                    </tr>
                                                </tbody> -->
                                            </table>
                                            <hr>
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>Bahasa Indonesia Kelas IV Semester 2:</label>
                                                    <input type="number" class="form-control" step="0.01" name="bi_iv_sm_2"
                                                        value="{{ @$user->User->Nilai->bi_iv_sm_2 }}" required>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>IPA Kelas IV Semester 2:</label>
                                                    <input type="number" class="form-control" step="0.01" name="ipa_iv_sm_2"
                                                        value="{{ @$user->User->Nilai->ipa_iv_sm_2 }}" required>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>Matematika Kelas IV Semester 2:</label>
                                                    <input type="number" class="form-control" step="0.01" name="mt_iv_sm_2"
                                                        value="{{ @$user->User->Nilai->mt_iv_sm_2 }}" required>
                                                </div>
                                            </div>
                                            <br>
                                            <!-- <table>
                                                <tbody>
                                                    <tr>
                                                        <td><img src="{{ asset('foto/' . @$user->User->Berkas->rapor_4_sm_2) }}"
                                                                class="zoom">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Rapor Kelas 4 Semester 2 New:</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="file" class="form-control"
                                                                name="rapor_4_sm_2">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table> -->
                                            <hr>
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>Bahasa Indonesia Kelas V Semester 1:</label>
                                                    <input type="number" class="form-control" step="0.01" name="bi_v_sm_1"
                                                        value="{{ @$user->User->Nilai->bi_v_sm_1 }}" required>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>IPA Kelas V Semester 1:</label>
                                                    <input type="number" class="form-control" step="0.01" name="ipa_v_sm_1"
                                                        value="{{ @$user->User->Nilai->ipa_v_sm_1 }}" required>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>Matematika Kelas V Semester 1:</label>
                                                    <input type="number" class="form-control" step="0.01" name="mt_v_sm_1"
                                                        value="{{ @$user->User->Nilai->mt_v_sm_1 }}" required>
                                                </div>
                                            </div>
                                            <br>
                                            <!-- <table>
                                                <tbody>
                                                    <tr>
                                                        <td><img src="{{ asset('foto/' . @$user->User->Berkas->rapor_5_sm_1) }}"
                                                                class="zoom">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Rapor Kelas 5 Semester 1 New:</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="file" class="form-control"
                                                                name="rapor_5_sm_1">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table> -->
                                            <hr>
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>Bahasa Indonesia Kelas V Semester 2:</label>
                                                    <input type="number" class="form-control" step="0.01" name="bi_v_sm_2"
                                                        value="{{ @$user->User->Nilai->bi_v_sm_2 }}" required>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>IPA Kelas V Semester 2:</label>
                                                    <input type="number" class="form-control" step="0.01" name="ipa_v_sm_2"
                                                        value="{{ @$user->User->Nilai->ipa_v_sm_2 }}"required>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>Matematika Kelas V Semester 2:</label>
                                                    <input type="number" class="form-control" step="0.01" name="mt_v_sm_2"
                                                        value="{{ @$user->User->Nilai->mt_v_sm_2 }}" required>
                                                </div>
                                            </div>
                                            <br>
                                            <!-- <table>
                                                <tbody>
                                                    <tr>
                                                        <td><img src="{{ asset('foto/' . @$user->User->Berkas->rapor_5_sm_2) }}"
                                                                class="zoom">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Rapor Kelas 5 Semester 2 New:</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="file" class="form-control"
                                                                name="rapor_5_sm_2">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table> -->
                                            <hr>
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>Bahasa Indonesia Kelas VI Semester 1:</label>
                                                    <input type="number" class="form-control" step="0.01" name="bi_vi_sm_1"
                                                        value="{{ @$user->User->Nilai->bi_vi_sm_1 }}" required>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>IPA Kelas VI Semester 1:</label>
                                                    <input type="number" class="form-control" step="0.01" name="ipa_vi_sm_1"
                                                        value="{{ @$user->User->Nilai->ipa_vi_sm_1 }}" required>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>Matematika Kelas VI Semester 1:</label>
                                                    <input type="number" class="form-control" step="0.01" name="mt_vi_sm_1"
                                                        value="{{ @$user->User->Nilai->mt_vi_sm_1 }}" required>
                                                </div>
                                            </div>
                                            <br>
                                            <!-- <table>
                                                <tbody>
                                                    <tr>
                                                        <td><img src="{{ asset('foto/' . @$user->User->Berkas->rapor_6_sm_1) }}"
                                                                class="zoom">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Rapor Kelas 6 Semester 1 New:</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="file" class="form-control"
                                                                name="rapor_6_sm_1">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table> -->
                                            <br>
                                            @if (@$user->User->Siswa->is_reguler == 1)
                                                <h4><u><b>UJIAN NASIONAL</b></u></h4>
                                                <hr>
                                                <br>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <label>Bahasa Indonesia:</label>
                                                        <input type="number" class="form-control"  step="0.01" name="bi_un" 
                                                            value="{{ @$user->User->Nilai->bi_un }}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label>IPA:</label>
                                                        <input type="number" class="form-control" step="0.01" name="ipa_un"
                                                            value="{{ @$user->User->Nilai->ipa_un }}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label>Matematika:</label>
                                                        <input type="number" class="form-control" step="0.01" name="mt_un"
                                                            value="{{ @$user->User->Nilai->mt_un }}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label>Total Nilai ASPD:</label>
                                                        <input type="number" class="form-control" name="total_nilai"
                                                            value="{{ @$user->User->Hasil->total_nilai }}">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label>Unggah Lembar Hasil ASPD:</label>
                                                        <input type="file" class="form-control" name="skhun"
                                                            value="{{ @$user->User->Nilai->skhun }}">
                                                    </div>
                                                </div>
                                                <br>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td><img src="{{ asset('foto/' . @$user->User->Nilai->skhun) }}"
                                                                    class="zoom">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            @endif
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td><img src="{{ asset('foto/' . @$user->User->Berkas->kartu_keluarga) }}"
                                                                class="zoom">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Foto Copy Kartu Keluarga(KK):</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="file" class="form-control"
                                                                name="kartu_keluarga">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td><img src="{{ asset('foto/' . @$user->User->Berkas->akta_kel) }}"
                                                                class="zoom">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Foto Copy Akta Kelahiran:</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="file" class="form-control"
                                                                name="akta_kel">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td><img src="{{ asset('foto/' . @$user->User->Berkas->ijazah_skl) }}"
                                                                class="zoom">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Ijazah / SKL:</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="file" class="form-control"
                                                                name="ijazah_skl">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <h4><u><b>DATA PRESTASI</b></u></h4>
                                            <hr>
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label>Jenis Prestasi:</label>
                                                    <input type="text" class="form-control" name="jenis_prestasi"
                                                        value="{{ @$user->User->Nilai->jenis_prestasi }}">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>Nama Prestasi:</label>
                                                    <input type="text" class="form-control" name="nama_prestasi"
                                                        value="{{ @$user->User->Nilai->nama_prestasi }}">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>Nilai Prestasi:</label>
                                                    <input type="number" class="form-control" name="poin_prestasi"
                                                        value="{{ @$user->User->Nilai->poin_prestasi }}">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>Bukti Prestasi New:</label>
                                                    <input type="file" class="form-control" name="bukti_prestasi"
                                                        value="{{ @$user->User->Nilai->bukti_prestasi }}">
                                                </div>
                                            </div>
                                            <br>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td><img src="{{ asset('foto/' . @$user->User->Nilai->bukti_prestasi) }}"
                                                                class="zoom">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <hr>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="box box-success">
                                        <div class="box-header">
                                            <h3 class="box-title">Verifikasi Berkas</h3>
                                        </div>
                                        <div class="box-body">
                                            <form action="{{ route('admin.verifikasi') }}" method="post"
                                                enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" class="form-control"
                                                    value="{{ $user->id }}">
                                                <div class="form-group has-feedback">
                                                    <label>STATUS VERIFIKASI :</label>
                                                    <select name="status" class="form-control" required>
                                                        <option value="">Pilih</option>
                                                        <option value="BERKAS DITERIMA"
                                                            {{ @$user->status == 'BERKAS DITERIMA' ? 'selected' : '' }}>
                                                            BERKAS DITERIMA</option>
                                                        <option value="BERKAS DITOLAK"
                                                            {{ @$user->status == 'BERKAS DITOLAK' ? 'selected' : '' }}>
                                                            BERKAS DITOLAK</option>
                                                    </select>
                                                </div>
                                                <div class="form-group has-feedback">
                                                    <label>Catatan Berkas :</label>
                                                    <textarea name="catatan_berkas" class="form-control" cols="3" rows="3">{{ @$user->catatan_berkas }}</textarea>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-4 col-xs-offset-4">
                                                        <button type="submit"
                                                            class="btn btn-success btn-block btn-flat">Simpan</button>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
