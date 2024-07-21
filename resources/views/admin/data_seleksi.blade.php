@extends('layouts.admin')
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
    </style>
@endsection

@section('content')
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.index') }}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Data Seleksi</li>
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
                        <h3 class="box-title">Data Seleksi</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exportModal"><i
                                    class="fa fa-download"></i>
                                Hasil Seleksi</button>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped" id="data-ppdb">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Pendaftaran</th>
                                    <th>NISN</th>
                                    <th>Nama Siswa</th>
                                    <th>Asal Sekolah</th>
                                    <th>Jalur Pendaftaran</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (@$user as $key => $value)
                                    <tr>
                                        <td>{{ @$key + 1 }}</td>
                                        <td>{{ @$value->no_pendaftaran }}</td>
                                        <td>{{ @$value->User->nisn }}</td>
                                        <td>{{ @$value->User->name }}</td>
                                        <td>{{ @$value->User->Sekolah->nama_sekolah }}</td>
                                        <td>{{ @$value->User->Siswa->is_reguler == 1 ? 'Reguler' : 'Prestasi'}}</td>
                                        <td>{{ @$value->keterangan }}</td>
                                        <td width="150px">
                                            @if ($value->keterangan == null)
                                                <a href="{{ route('admin.detail_seleksi', $value->id) }}"><button
                                                        class=" btn btn-xs btn-success"><i class="fa fa-edit">
                                                            Seleksi</i></button></a> &nbsp;&nbsp;
                                            @else
                                                <a href="{{ route('admin.delete_seleksi', $value->id) }}"><button
                                                        class=" btn btn-xs btn-danger"
                                                        onclick="return confirm('Apakah anda ingin mengubah hasil seleksi ?')"><i
                                                            class="fa fa-trash"> Ulang Seleksi</i></button></a> &nbsp;
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">LAPORAN HASIL SELEKSI</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.pdfHasilSeleksi') }}" method="post" target="_blank">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group has-feedback">
                            <label>KETERANGAN SELEKSI :</label>
                            <select name="keterangan" class="form-control" required>
                                <option value="">Pilih</option>
                                <option value="DITERIMA">DITERIMA</option>
                                <option value="TIDAK DITERIMA">TIDAK DITERIMA</option>
                            </select>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Jalur Pendaftaran:</label>
                            <select name="jalur" class="form-control" required>
                                <option value="">Pilih</option>
                                <option value="1">Reguler</option>
                                <option value="0">Prestasi</option>
                            </select>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Tanggal Pendaftaran:</label>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        var table = $('#data-ppdb').DataTable();

        $(document).ready(function() {
            $('.zoom').hover(function() {
                $(this).addClass('transisi');
            }, function() {
                $(this).removeClass('transisi');
            });
        });
    </script>
@endsection
