<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="#" type="image/x-icon" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title }}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminlte/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/ionslider/ion.rangeSlider.min.js') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/skins/_all-skins.min.css') }}">
    @yield('css')
    <style>
        .badge-notif {
            position: relative;
            color: white;
        }

        .badge-notif[data-badge]:after {
            content: attr(data-badge);
            position: absolute;
            top: -10px;
            right: -10px;
            font-size: .7em;
            background: #e53935;
            color: white;
            width: 18px;
            height: 18px;
            text-align: center;
            line-height: 18px;
            border-radius: 50%;
        }

        .dateNow {
            color: white;
            margin-top: 13px;
            margin-right: 15px;
            float: right;
        }
    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <a href="/admin/home" class="logo">
                <span class="logo-mini"><b>ADMIN</b></span>
                <span class="logo-lg"><b>PPDB MTSN 2 SLEMAN</b></span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Navigation</span>
                </a>
                <p class="dateNow">{{ date('d F Y') }}</p>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ asset('logo.png') }}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{ Auth::user()->name }}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <ul class="sidebar-menu">
                    <li>
                        <a href="{{ route('admin.index') }}">
                            <i class="fa fa-home"></i> <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.user') }}">
                            <i class="fa fa-users"></i> <span>Data Pendaftar</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.verifikasi_berkas') }}">
                            <i class="fa fa-edit"></i> <span>Verifikasi Berkas</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.data_seleksi') }}">
                            <i class="fa fa-list-alt"></i> <span>Data Seleksi</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.riwayat_cabut_berkas') }}">
                            <i class="fa fa-history"></i> <span>Data Riwayat Cabut Berkas</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.riwayat_pendaftaran') }}">
                            <i class="fa fa-history"></i> <span>Data Riwayat Pendaftaran</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.admin') }}">
                            <i class="fa fa-users"></i> <span>Data Admin</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.setting') }}">
                            <i class="fa fa-calendar"></i> <span>Jadwal Pendaftaran</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.profile') }}">
                            <i class="fa fa-wrench"></i> <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}">
                            <i class="fa fa-sign-out"></i> <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </section>
        </aside>
        <div class="content-wrapper">
            @yield('content')
        </div>

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Build with <span class="fa fa-coffee"></span> And <span class="fa fa-heart"></b>
            </div>
            <strong>Copyright &copy; 2024 .</strong>
        </footer>
        <div class="control-sidebar-bg"></div>
    </div>
    <script src="{{ asset('adminlte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jQueryUI/jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="{{ asset('adminlte/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/fastclick/fastclick.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/demo.js') }}"></script>
    @yield('javascript')
</body>

</html>
