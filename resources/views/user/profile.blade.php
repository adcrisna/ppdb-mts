@extends('layouts.user')
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
@endsection

@section('content')
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="{{ route('user.index') }}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Profile</li>
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
                        <h3 class="box-title">Profile</h3>
                    </div>
                    <div class="box-body table-responsive">
                        <form action="{{ route('user.updateProfile') }}" method="post" enctype="multipart/form-data"
                            id="passwordForm">
                            {{ csrf_field() }}
                            <div class="form-group has-feedback">
                                <input type="hidden" name="id" readonly class="form-control"
                                    value="{{ $user->id }}" readonly>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Nama:</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}"
                                    required>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Email :</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}"
                                    required>
                            </div>
                            <div class="form-group has-feedback">
                                <label>NISN :</label>
                                <input type="number" name="nisn" class="form-control" value="{{ $user->nisn }}"
                                    required>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Password Lama</label>
                                <input type="password" name="passwordLama" class="form-control" placeholder="Password Lama">
                            </div>
                            <div class="form-group has-feedback">
                                <label>Password Baru</label>
                                <input type="password" name="password" class="form-control" placeholder="Password Baru">
                            </div>
                            <div class="form-group has-feedback">
                                <label>Password Baru Confirm</label>
                                <input type="password" name="passwordConfirm" class="form-control"
                                    placeholder="Password Baru Confirm">
                            </div>
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
