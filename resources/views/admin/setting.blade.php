@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
@endsection

@section('content')
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.index') }}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Jadwal Pendaftaran</li>
        </ol>
    </section>
    <br />
    <br />
    <section class="content">
        @if (\Session::has('msg_success'))
            <h5>
                <div class="alert alert-warning">
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
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Jadwal Pendaftaran</h3>
                    </div>
                    <div class="box-body table-responsive">
                        <form action="{{ route('admin.updateSetting') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group has-feedback">
                                <input type="hidden" name="id" readonly class="form-control"
                                    value="{{ $setting->id }}" readonly>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group has-feedback">
                                        <label>Mulai Pendaftaran Reguler:</label>
                                        <input type="date" name="start_reguler" class="form-control"
                                            value="{{ $setting->start_reguler }}" required>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label>Mulai Pendaftaran Prestasi:</label>
                                        <input type="date" name="start_prestasi" class="form-control"
                                            value="{{ $setting->start_prestasi }}" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group has-feedback">
                                        <label>Berakhir Pendaftaran Reguler:</label>
                                        <input type="date" name="end_reguler" class="form-control"
                                            value="{{ $setting->end_reguler }}" required>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label>Berakhir Pendaftaran Prestasi:</label>
                                        <input type="date" name="end_prestasi" class="form-control"
                                            value="{{ $setting->end_prestasi }}" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-2 col-xs-offset-5">
                                    <p>Last Updated By : <b>{{ $setting->User->name }}</b></p>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-2 col-xs-offset-5">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat"
                                        style="border-radius: 10px">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br />
    </section>
@endsection

@section('javascript')
    <script src="{{ asset('adminlte/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/raphael/raphael-min.js') }}"></script>
@endsection
