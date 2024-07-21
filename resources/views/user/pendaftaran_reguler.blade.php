@extends('layouts.user')
@section('css')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/morris/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.min.css') }}">
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
                    <b>Formulir Pendaftaran Jalur Reguler</b> <br>
                </div>
            </div>
        </div>
        <div class="row" id="dataSiswa">
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
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">REGULER</h3>
                    </div>
                    <form action="{{ route('user.addPendaftaran') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li id="liSiswa" class="active"><a href="#tab_siswa" data-toggle="tab">1. Data Siswa</a>
                                </li>
                                <li id="liOrtu"><a href="#tab_orangtua" data-toggle="tab">2. Data Orang Tua</a></li>
                                <li id="liSekolah"><a href="#tab_sekolah" data-toggle="tab">3. Data Asal Sekolah</a></li>
                                <li id="liNilai"><a href="#tab_nilai" data-toggle="tab">4. Data Nilai</a></li>
                                <li id="liBerkas"><a href="#tab_berkas" data-toggle="tab">5. Unggah Berkas</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_siswa">
                                    <h4><u><b>1. DATA CALON SISWA</b></u></h4>
                                    <br>
                                    <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}"
                                        readonly>
                                    <input type="hidden" class="form-control" name="is_reguler" value="1" readonly>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Nama Lengkap:</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ Auth::user()->name }}" readonly>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>NISN:</label>
                                            <input type="text" class="form-control" name="nisn"
                                                value="{{ Auth::user()->nisn }}" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Email:</label>
                                            <input type="text" class="form-control" name="email"
                                                value="{{ Auth::user()->email }}" readonly>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Alamat:</label>
                                            <textarea name="alamat" class="form-control" cols="3" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Tempat Lahir:</label>
                                            <input type="text" class="form-control" name="tempat_lahir" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Tanggal Lahir:</label>
                                            <input type="date" class="form-control" name="tanggal_lahir" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Jenis Kelamin:</label>
                                            <select name="jenis_kelamin" class="form-control" required>
                                                <option value="">Pilih</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Agama:</label>
                                            <select name="agama" class="form-control" required>
                                                <option value="">Pilih</option>
                                                <option value="Islam">Islam</option>
                                                <!-- <option value="Kristen">Kristen</option>
                                                        <option value="Buddha">Buddha</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Katolik">Katolik</option>
                                                        <option value="Khonghucu">Khonghucu</option> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>No Telepon/Whatsapp:</label>
                                            <input type="number" class="form-control" name="no_hp" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Pass Foto 3x4(latar belakang merah):</label>
                                            <input type="file" class="form-control" name="foto" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-6">

                                        </div>
                                        <div class="col-sm-6">
                                            <a href="#tab_orangtua" class="btn btn-success" id="selanjutnyaSiswa"
                                                data-toggle="tab" style="float: right">Selanjutnya</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_orangtua">
                                    <h4><u><b>2. DATA ORANG TUA</b></u></h4>
                                    <br>
                                    <h4><u><b>A. AYAH</b></u></h4>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Nama Lengkap:</label>
                                            <input type="text" class="form-control" name="nama_ayah" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Tempat Lahir:</label>
                                            <input type="text" class="form-control" name="tempat_lahir_ayah" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Tanggal Lahir:</label>
                                            <input type="date" class="form-control" name="tanggal_lahir_ayah"
                                                required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Pendidikan Terakhir:</label>
                                            <input type="text" class="form-control" name="pendidikan_terakhir_ayah"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Pekerjaan:</label>
                                            <input type="text" class="form-control" name="pekerjaan_ayah" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>No HP/Whatsapp:</label>
                                            <input type="text" class="form-control" name="no_hp_ayah" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>Alamat:</label>
                                            <textarea name="alamat_ayah" class="form-control" cols="3" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <h4><u><b>B. IBU</b></u></h4>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Nama Lengkap:</label>
                                            <input type="text" class="form-control" name="nama_ibu" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Tempat Lahir:</label>
                                            <input type="text" class="form-control" name="tempat_lahir_ibu" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Tanggal Lahir:</label>
                                            <input type="date" class="form-control" name="tanggal_lahir_ibu" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Pendidikan Terakhir:</label>
                                            <input type="text" class="form-control" name="pendidikan_terakhir_ibu"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Pekerjaan:</label>
                                            <input type="text" class="form-control" name="pekerjaan_ibu" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>No HP/Whatsapp:</label>
                                            <input type="number" class="form-control" name="no_hp_ibu" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>Alamat:</label>
                                            <textarea name="alamat_ibu" class="form-control" cols="3" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <h4><u><b>C. WALI</b></u></h4>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Nama Lengkap:</label>
                                            <input type="text" class="form-control" name="nama_wali">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Tempat Lahir:</label>
                                            <input type="text" class="form-control" name="tempat_lahir_wali">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Tanggal Lahir:</label>
                                            <input type="date" class="form-control" name="tanggal_lahir_wali">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Pendidikan Terakhir:</label>
                                            <input type="text" class="form-control" name="pendidikan_terakhir_wali">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Pekerjaan:</label>
                                            <input type="text" class="form-control" name="pekerjaan_wali">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>No HP/Whatsapp:</label>
                                            <input type="number" class="form-control" name="no_hp_wali">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Alamat:</label>
                                            <textarea name="alamat_wali" class="form-control" cols="3" rows="3"></textarea>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Hubungan Wali:</label>
                                            <input type="text" class="form-control" name="hubungan_wali">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="#tab_siswa" class="btn btn-success" id="kembaliOrtu"
                                                data-toggle="tab" style="float: left">Kembali</a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="#tab_sekolah" class="btn btn-success" id="selanjutnyaOrtu"
                                                data-toggle="tab" style="float: right">Selanjutnya</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_sekolah">
                                    <h4><u><b>3. DATA ASAL SEKOLAH</b></u></h4>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Nama Asal Sekolah:</label>
                                            <input type="text" class="form-control" name="nama_sekolah" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Status Sekolah:</label>
                                            <select name="status_sekolah" class="form-control" required>
                                                <option value="">Pilih</option>
                                                <option value="Negeri">Negeri</option>
                                                <option value="Swasta">Swasta</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Tanggal Lulus:</label>
                                            <input type="date" class="form-control" name="tanggal_lulus" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Alamat Sekolah:</label>
                                            <textarea name="alamat_sekolah" class="form-control" cols="3" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="#tab_orangtua" class="btn btn-success" id="kembaliSekolah"
                                                data-toggle="tab" style="float: left">Kembali</a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="#tab_nilai" class="btn btn-success" id="selanjutnyaSekolah"
                                                data-toggle="tab" style="float: right">Selanjutnya</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_nilai">
                                    <h4><u><b>4. DATA NILAI RAPOR</b></u></h4>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Bahasa Indonesia Kelas IV Semester 1:</label>
                                            <input type="number" class="form-control" step="0.01" name="bi_iv_sm_1"
                                                required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>IPA Kelas IV Semester 1:</label>
                                            <input type="number" class="form-control" step="0.01" name="ipa_iv_sm_1"
                                                required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Matematika Kelas IV Semester 1:</label>
                                            <input type="number" class="form-control" step="0.01" name="mt_iv_sm_1"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Bahasa Indonesia Kelas IV Semester 2:</label>
                                            <input type="number" class="form-control" step="0.01" name="bi_iv_sm_2"
                                                required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>IPA Kelas IV Semester 2:</label>
                                            <input type="number" class="form-control" step="0.01" name="ipa_iv_sm_2"
                                                required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Matematika Kelas IV Semester 2:</label>
                                            <input type="number" class="form-control" step="0.01" name="mt_iv_sm_2"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Bahasa Indonesia Kelas V Semester 1:</label>
                                            <input type="number" class="form-control" step="0.01" name="bi_v_sm_1"
                                                required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>IPA Kelas V Semester 1:</label>
                                            <input type="number" class="form-control" step="0.01" name="ipa_v_sm_1"
                                                required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Matematika Kelas V Semester 1:</label>
                                            <input type="number" class="form-control" step="0.01" name="mt_v_sm_1"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Bahasa Indonesia Kelas V Semester 2:</label>
                                            <input type="number" class="form-control" step="0.01" name="bi_v_sm_2"
                                                required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>IPA Kelas V Semester 2:</label>
                                            <input type="number" class="form-control" step="0.01" name="ipa_v_sm_2"
                                                required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Matematika Kelas V Semester 2:</label>
                                            <input type="number" class="form-control" step="0.01" name="mt_v_sm_2"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Bahasa Indonesia Kelas VI Semester 1:</label>
                                            <input type="number" class="form-control" step="0.01" name="bi_vi_sm_1"
                                                required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>IPA Kelas VI Semester 1:</label>
                                            <input type="number" class="form-control" step="0.01" name="ipa_vi_sm_1"
                                                required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Matematika Kelas VI Semester 1:</label>
                                            <input type="number" class="form-control" step="0.01" name="mt_vi_sm_1"
                                                required>
                                        </div>
                                    </div>
                                    <h4><u><b>NILAI UJIAN NASIONAL</b></u></h4>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Bahasa Indonesia:</label>
                                            <input type="number" class="form-control" step="0.01" name="bi_un"
                                                required>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>IPA:</label>
                                            <input type="number" class="form-control" step="0.01" name="ipa_un"
                                                required>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Matematika:</label>
                                            <input type="number" class="form-control" step="0.01" name="mt_un"
                                                required>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Unggah Lembar Hasil ASPD:</label>
                                            <input type="file" class="form-control" name="skhun" required>
                                        </div>
                                    </div>
                                    <h4><u><b>DATA PRESTASI</b></u></h4>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Jenis Prestasi:</label>
                                            <input type="text" class="form-control" name="jenis_prestasi">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Nama Prestasi:</label>
                                            <input type="text" class="form-control" name="nama_prestasi">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Bukti Prestasi:</label>
                                            <input type="file" class="form-control" name="bukti_prestasi">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="#tab_sekolah" class="btn btn-success" id="kembaliNilai"
                                                data-toggle="tab" style="float: left">Kembali</a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="#tab_berkas" class="btn btn-success" id="selanjutnyaNilai"
                                                data-toggle="tab" style="float: right">Selanjutnya</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_berkas">
                                    <h4><u><b>5. Unggah Berkas</b></u></h4>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Akta Kelahiran:</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Format gambar (jpg,jpeg/png). Maks 2 Mb</label>
                                            <input type="file" class="form-control" name="akta_kel" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Ijazah / SKL:</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Format gambar (jpg,jpeg/png). Maks 2 Mb</label>
                                            <input type="file" class="form-control" name="ijazah_skl" required>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Rapor Kelas 5 Semester 1:</label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Format gambar (jpg,jpeg/png). Maks 2 Mb</label>
                                                    <input type="file" class="form-control" name="rapor_5_sm_1" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Rapor Kelas 5 Semester 2:</label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Format gambar (jpg,jpeg/png). Maks 2 Mb</label>
                                                    <input type="file" class="form-control" name="rapor_5_sm_2" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Rapor Kelas 6 Semester 1:</label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Format gambar (jpg,jpeg/png). Maks 2 Mb</label>
                                                    <input type="file" class="form-control" name="rapor_6_sm_1" required>
                                                </div>
                                            </div> -->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Foto Copy Kartu Keluarga(KK):</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Format gambar (jpg,jpeg/png). Maks 2 Mb</label>
                                            <input type="file" class="form-control" name="kartu_keluarga" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="#tab_nilai" class="btn btn-success" id="kembaliBerkas"
                                                data-toggle="tab" style="float: left">Kembali</a>
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-success" style="float: right"
                                                onclick="return confirm('Apakah data yang anda masukan sudah benar?')">DAFTAR
                                                JALUR
                                                REGULER</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <br>
    </section>
@endsection

@section('javascript')
    <script src="{{ asset('adminlte/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/raphael/raphael-min.js') }}"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $("#selanjutnyaSiswa").click(function() {
                $('#liSiswa').removeClass("active");
                $('#liOrtu').addClass("active");
            });
            $("#selanjutnyaOrtu").click(function() {
                $('#liOrtu').removeClass("active");
                $('#liSekolah').addClass("active");
            });
            $("#kembaliOrtu").click(function() {
                $('#liOrtu').removeClass("active");
                $('#liSiswa').addClass("active");
            });
            $("#selanjutnyaSekolah").click(function() {
                $('#liSekolah').removeClass("active");
                $('#liNilai').addClass("active");
            });
            $("#kembaliSekolah").click(function() {
                $('#liSekolah').removeClass("active");
                $('#liOrtu').addClass("active");
            });
            $("#selanjutnyaNilai").click(function() {
                $('#liNilai').removeClass("active");
                $('#liBerkas').addClass("active");
            });
            $("#kembaliNilai").click(function() {
                $('#liNilai').removeClass("active");
                $('#liSekolah').addClass("active");
            });
            $("#kembaliBerkas").click(function() {
                $('#liBerkas').removeClass("active");
                $('#liNilai').addClass("active");
            });
        });
    </script>
@endsection
