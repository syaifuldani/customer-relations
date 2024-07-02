@extends('layouts.penjualan.Layoutindex')
@section('content')
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
                                        <th>ID Permintaan</th>
                                        <th>Nama Customer</th>
                                        <th>Status Order</th>
                                        <th>Tanggal Permintaan</th>
                                        <th>Barang</th>
                                        <th>Metode Pembayaran</th>
                                        <th>Total Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Surip</td>
                                        <td>Draf</td>
                                        <td>01-07-2024</td>
                                        <td>
                                            <ul>
                                                <li>Semen Tiga roda - 2 karung</li>
                                                <li>Pasir Sirtu - 1 Pickup</li>
                                            </ul>
                                        </td>
                                        <td>Tunai</td>
                                        <td>690.000</td>
                                        <td>
                                            {{-- MODAL EDIT --}}
                                            <div class="container">
                                                <!-- Button to trigger modal -->
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#modal_edit">Edit</button>
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                    data-target="#modal_hapus">Hapus</button>

                                                <!-- Modal Edit Product -->
                                                <div class="modal fade" id="modal_edit">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="POST"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Edit Permintaan</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input type="hidden" class="form-control"
                                                                        name="id" value="">
                                                                    <div class="mb-3">
                                                                        <label for="gambar_makanan" class="form-label">ID
                                                                            Permintaan</label>
                                                                        <input type="text" id="id_permintaan"
                                                                            class="form-control" name="id_permintaan"
                                                                            value="" disabled>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="nama_customer" class="form-label">Nama
                                                                            Customer</label>
                                                                        <input type="text" id="nama_customer"
                                                                            class="form-control" name="nama_customer"
                                                                            value="">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="status_order" class="form-label">Status
                                                                            Order</label>
                                                                        <select id="status_order" class="form-control"
                                                                            name="status_order" required>
                                                                            <option value="distejui">
                                                                                Distejui</option>
                                                                            <option value="ditolak">
                                                                                Ditolak</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="tanggal_permintaan"
                                                                            class="form-label">Tanggal
                                                                            Permintaan</label>
                                                                        <input type="date" id="tanggal_permintaan"
                                                                            class="form-control" name="tanggal_permintaan"
                                                                            value="">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="barang"
                                                                            class="form-label">Barang</label>
                                                                        <input type="number" id="barang"
                                                                            class="form-control" name="barang"
                                                                            value="">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="metode_pembayaran"
                                                                            class="form-label">Metode
                                                                            Pembayaran</label>
                                                                        <select id="metode_pembayaran" class="form-control"
                                                                            name="metode_pembayaran" required>
                                                                            <option value="distejui">
                                                                                Tunai</option>
                                                                            <option value="ditolak">
                                                                                QR</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="harga_makanan" class="form-label">Total
                                                                            Harga</label>
                                                                        <input type="number" id="harga_makanan"
                                                                            class="form-control" name="harga_makanan"
                                                                            value="">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    {{-- <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">Close</button> --}}
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- @foreach ($products as $product)
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
                                    @endforeach --}}
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
@endsection
