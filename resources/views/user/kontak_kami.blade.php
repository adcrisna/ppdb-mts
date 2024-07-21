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
            <img class="img-responsive pad" src="{{ asset('adminlte/dist/img/photo-profile2.jpeg') }}" alt="Photo"
                style="height: 450px; width:100%;">
        </div>
        <div class="row">
            <div class="col-sm-12">
                <br />
                <div class="login-logo">
                    <b>MTS N 2 SLEMAN</b> <br>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="attachment-block clearfix">
                <div class="attachment-pushed" style=" margin-left:0 !important;">
                    <div class="attachment-text" style="font-size:20px !important;" >
                        <div class="row" >
                            <div class="col-sm-6">
                                <center><a href="#"><i class="fa fa-phone"></i> Phone :
                                02274868775</a></center>
                            </div>
                            <div class="col-sm-6">
                                <center><a href="https://wa.me/6285729605326"><i class="fa fa-whatsapp"></i> Whatsapp : 085729605326</a>
                                </center>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <center><a href="#"><i class="fa fa-envelope-o"></i> Email :
                                mtsn2sleman@gmail.com</a></center>
                            </div>
                            <div class="col-sm-6">
                                <center><a href="https://maps.app.goo.gl/qp86WLtvr1ekbyrx6"><i class="fa fa-map-marker"></i> Alamat : Jl. Magelang km.17 Margorejo, Tempel
                                Margorejo Sleman Daerah Istimewa Yogyakarta 55552</a>
                                </center>
                            </div>
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
    <script src="{{ asset('adminlte/plugins/raphael/raphael-min.js') }}"></script>
    <script type="text/javascript">
        var table = $('#data-product').DataTable();
    </script>
@endsection
