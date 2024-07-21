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
                <br />
                <div class="login-logo">
                    <b>Informasi Pendaftaran</b> <br>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="attachment-block clearfix">
                <center>
                    <h4><b>Jadwal Penting Pendaftaran Siswa Baru MTS N 2 Sleman</b></h4>
                </center>
                <div class="attachment-pushed" style="margin-left:0 !important;">
                    <div class="attachment-text">
                        <span style="font-weight:bold;">TIMELINE PPDB Jalur Prestasi:</span><br>
                        Pendaftaran dan pengumpulan berkas : 13-22 Mei 2024<br>
                        Tes Seleksi : 27 Mei 2024<br>
                        Pengumuman : 28 Mei 2024<br>
                        Daftar Ulang : 28-29 Mei 2024<br><br>
                        <span style="font-weight:bold;">TIMELINE PPDB Jalur Reguler:</span><br>
                        Pendaftaran : 1-3 Juli 2024<br>
                        Pengumuman : 4 Juli 2024<br>
                        Daftar Ulang : 4-5 Juli 2024<br>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="attachment-block clearfix">
                <center>
                    <h4><b>Tata Cara Pendaftaran Online Melalui Web</b></h4>
                </center>
                <div class="attachment-pushed" style="margin-left:0 !important;">
                    <div class="attachment-text">
                        Description about the attachment can be placed here.
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum dolor sit
                        amet consectetur adipisicing elit. Pariatur, obcaecati in vero velit explicabo aperiam autem
                        quisquam numquam ipsa molestias atque, veritatis officia nihil quos asperiores! Consequuntur
                        voluptate molestias quos?
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deleniti ullam debitis placeat vero in
                        doloremque, nesciunt reprehenderit quae asperiores dolorem provident dignissimos nisi magni eos
                        explicabo corrupti omnis est labore.
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
    <script src="{{ asset('adminlte/plugins/raphael/raphael-min.js') }}"></script>
    <script type="text/javascript">
        var table = $('#data-product').DataTable();
    </script>
@endsection
