@extends('layouts.distribusi.Layoutindex')
@section('content')
    {{-- ==================================CONTENT MAIN ========================================= --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">List Barang</h1>
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
                                    <th>ID Barang</th>
                                    <th>Foto Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori Barang</th>
                                    <th>Stok Barang</th>
                                    <th>Harga Barang</th>
                                    <th style="width: 100px;">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $product->id_barang }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset('/storage/products/' . $product->foto_barang) }}"
                                                class="rounded" style="width: 150px" height="93.48px">
                                        </td>
                                        <td>{{ $product->nama_barang }}</td>
                                        <td>{{ $product->kategori_barang }}</td>
                                        <td>{{ $product->stok_barang }}</td>
                                        <td>{{ 'Rp ' . number_format($product->harga_barang, 2, ',', '.') }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action=""
                                                method="POST">
                                                <a href="" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Products belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
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
