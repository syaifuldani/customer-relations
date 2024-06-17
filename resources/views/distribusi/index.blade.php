@extends('layouts.distribusi.Layoutindex')
@section('content')
    {{-- ==================================CONTENT MAIN ========================================= --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Order Distribusi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Order Penjualan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <div class="col-12 mt-2">
                <!-- /.card -->
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID PERMINTAAN</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Status Order</th>
                                    <th>Tanggal Permintaan</th>
                                    <th>Jangka Pembayaran</th>
                                    <th>Jenis Pajak</th>
                                    <th style="width: 100px;">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        bening
                                    </td>
                                    <td>
                                        Kaca
                                    </td>
                                    <td>
                                        25cm
                                    </td>
                                    <td>
                                        100gram
                                    </td>
                                    <td>
                                        10
                                    </td>
                                    <td>
                                        <button type="submit" data-toggle="modal" data-target="#modal-edited"
                                            name="t_edit" class="btn btn-success btn-sm">Edit</button>
                                        <button type="submit" data-toggle="modal" data-target="#modal-delete"
                                            name="t_delete" id="t_delete" class="btn btn-danger btn-sm">Hapus</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        2
                                    </td>
                                    <td>
                                        bening
                                    </td>
                                    <td>
                                        Kaca
                                    </td>
                                    <td>
                                        100cm
                                    </td>
                                    <td>
                                        100gram
                                    </td>
                                    <td>
                                        10
                                    </td>
                                    <td>
                                        <button type="submit" data-toggle="modal" data-target="#modal-edited"
                                            name="t_edit" class="btn btn-success btn-sm">Edit</button>
                                        <button type="submit" data-toggle="modal" data-target="#modal-delete"
                                            name="t_delete" id="t_delete" class="btn btn-danger btn-sm">Hapus</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID PERMINTAAN</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Status Order</th>
                                    <th>Tanggal Permintaan</th>
                                    <th>Jangka Pembayaran</th>
                                    <th>Jenis Pajak</th>
                                    <th style="width: 100px;">AKSI</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection