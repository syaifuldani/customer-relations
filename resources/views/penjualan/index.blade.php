@extends('layouts.penjualan.Layoutindex')
@section('content')
    {{-- ==================================CONTENT MAIN ========================================= --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Beranda</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Beranda</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $totalcustomers }}</h3>
                            <p>Total Customer</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $totalproduct }}</h3>
                            <p>Total Penjualan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-12">
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
                                                <th>Id Transaksi</th>
                                                <th>Id Customer</th>
                                                <th>Nama Customer</th>
                                                <th>Barang</th>
                                                <th>Qty</th>
                                                <th>Total Harga</th>
                                                <th>Metode Pembayaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                @php
                                                    $barang = json_decode($product->barang, true);
                                                @endphp
                                                <tr>
                                                    <td>{{ $product->id_riwayat }}</td>
                                                    <td>{{ $product->customer_id }}</td>
                                                    <td>{{ $product->customer->nama_customer ?? 'N/A' }}</td>
                                                    <td>
                                                        <ul>
                                                            @foreach ($barang as $item)
                                                                <li>{{ $item['name'] }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <ul>
                                                            @foreach ($barang as $item)
                                                                <li>{{ $item['qty'] }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                    <td>{{ $product->total_harga }}</td>
                                                    <td>{{ $product->metode_pembayaran }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                    <!-- /.row (main row) -->
                </section>
            </div><!-- /.container-fluid -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
