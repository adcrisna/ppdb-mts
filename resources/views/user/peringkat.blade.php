@extends('layouts.user')
@section('css')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.css') }}">
    <style>
        img.zoom {
            width: 130px;
            height: 100px;
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
        .quota-marker {
            color: red;
            font-weight: bold;
        }
    </style>
@endsection

@section('content')
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="{{ route('user.index') }}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Data Pendaftar</li>
        </ol>
        <br />
    </section>
    <section class="content">
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
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Data Peringkat</h3>
                        <div class="box-tools pull-right">

                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped" id="data-ppdb">
                            <thead>
                                <tr >
                                    <th style="text-align: center;">No</th>
                                    <th style="text-align: center;">No Pendaftaran</th>
                                    <th style="text-align: center;">Nama</th>
                                    <th style="text-align: center;">Jenis Kelamin</th>
                                    <th style="text-align: center;">Asal Sekolah</th>
                                    <th colspan="4" style="text-align: center;">Nilai ASPD</th>
                                    <th colspan="2" style="text-align: center;">Tambahan Nilai</th>  
                                    <th style="text-align: center;">Total Nilai</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>B.IND</th>
                                    <th>MTK</th>
                                    <th>IPA</th>
                                    <th>JML</th>
                                    <th style="font-size:10px;text-align:center;">Poin <br> Prestasi</th>
                                    <th style="font-size:10px; text-align:center;">Rata-Rata <br>Rapot</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (@$user as $key => $value)
                                @if(@$value->User->Siswa->is_reguler == 1)
                                    <tr class="{{$key == 99 ? 'quota-marker': ''}}">
                                        <td>{{ @$key + 1 }}</td>
                                        <td>{{ @$value->no_pendaftaran }}</td>
                                        <td>{{ @$value->User->name }}</td>
                                        <td>{{ @$value->User->Siswa->jenis_kelamin }}</td>
                                        <td>{{ @$value->User->Sekolah->nama_sekolah }}</td>
                                        <td>{{ @$value->User->Nilai->bi_un }}</td>
                                        <td>{{ @$value->User->Nilai->mt_un }}</td>
                                        <td>{{ @$value->User->Nilai->ipa_un }}</td>
                                        <td>{{ @$value->total_un }}</td>
                                        <td>{{ @$value->User->Nilai->poin_prestasi }}</td>
                                        <td>{{ number_format(@$value->total_rapor, 2) }}</td>
                                        <td>{{ number_format(@$value->total_nilai, 2) }}</td>
                                    </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        var table = $('#data-ppdb').DataTable({
            "pageLength": 200,
            "lengthMenu": [ [10, 25, 50, 100, 200], [10, 25, 50, 100, 200] ]
        });

        $('.zoom').hover(function() {
            $(this).addClass('transisi');
        }, function() {
            $(this).removeClass('transisi');
        });
    });
    </script>
@endsection
