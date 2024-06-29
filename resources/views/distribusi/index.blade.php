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
                                            {{-- MODAL EDIT --}}
                                            <div class="container">
                                                <!-- Button to trigger modal -->
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#modal_edit{{ $product->id_barang }}">Edit</button>
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                    data-target="#modal_hapus{{ $product->id_barang }}">Hapus</button>

                                                <!-- Modal Edit Product -->
                                                <div class="modal fade" id="modal_edit{{ $product->id_barang }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form
                                                                action="{{ route('products.update', $product->id_barang) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Form Edit Makanan</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input type="hidden" class="form-control"
                                                                        name="id" value="{{ $product->id_barang }}">
                                                                    <div class="mb-3">
                                                                        <label for="gambar_makanan" class="form-label">Foto
                                                                            Makanan</label>
                                                                        <img id="preview-image-{{ $product->id_barang }}"
                                                                            src="{{ asset('storage/products/' . $product->foto_barang) }}"
                                                                            class="rounded img-thumbnail"
                                                                            style="width: 150px; height: 93.48px; display: block; cursor: pointer;">
                                                                        <input type="file"
                                                                            id="gambar_makanan-{{ $product->id_barang }}"
                                                                            name="gambar_makanan" class="form-control-file"
                                                                            style="display: none;" accept="image/*">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="nama_makanan" class="form-label">Nama
                                                                            Makanan</label>
                                                                        <input type="text" id="nama_makanan"
                                                                            class="form-control" name="nama_makanan"
                                                                            value="{{ $product->nama_barang }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="kategori_barang"
                                                                            class="form-label">Kategori Makanan</label>
                                                                        <select id="kategori_barang" class="form-control"
                                                                            name="kategori_barang" required>
                                                                            <option value="mie-gacoan"
                                                                                {{ $product->kategori_barang == 'mie-gacoan' ? 'selected' : '' }}>
                                                                                Mie Gacoan</option>
                                                                            <option value="mie-hompimpa"
                                                                                {{ $product->kategori_barang == 'mie-hompimpa' ? 'selected' : '' }}>
                                                                                Mie Hompimpa</option>
                                                                            <option value="dimsum"
                                                                                {{ $product->kategori_barang == 'dimsum' ? 'selected' : '' }}>
                                                                                Dimsum</option>
                                                                            <option value="minuman"
                                                                                {{ $product->kategori_barang == 'minuman' ? 'selected' : '' }}>
                                                                                Minuman</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="stok_makanan" class="form-label">Stok
                                                                            Makanan</label>
                                                                        <input type="text" id="stok_makanan"
                                                                            class="form-control" name="stok_makanan"
                                                                            value="{{ $product->stok_barang }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="harga_makanan" class="form-label">Harga
                                                                            Barang</label>
                                                                        <input type="number" id="harga_makanan"
                                                                            class="form-control" name="harga_makanan"
                                                                            value="{{ $product->harga_barang }}">
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
                                            {{-- END MODAL EDIT --}}
                                            {{-- MODAL HAPUS --}}
                                            <div class="modal fade" id="modal_hapus{{ $product->id_barang }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="{{ route('products.delete', $product->id_barang) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">KONFIRMASI HAPUS OBAT</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id_obat"
                                                                    value="{{ $product->id_barang }}">
                                                                <p>Yakin ingin menghapus produk dengan ID:
                                                                    {{ $product->id_barang }}?</p>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" name="t_hapus"
                                                                    class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- END MODAL HAPUS --}}
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @foreach ($products as $product)
            document.getElementById('preview-image-{{ $product->id_barang }}').addEventListener('click',
                function() {
                    document.getElementById('gambar_makanan-{{ $product->id_barang }}').click();
                });

            document.getElementById('gambar_makanan-{{ $product->id_barang }}').addEventListener('change',
                function(event) {
                    if (event.target.files && event.target.files[0]) {
                        let reader = new FileReader();
                        reader.onload = function(e) {
                            document.getElementById('preview-image-{{ $product->id_barang }}').src = e
                                .target.result;
                        }
                        reader.readAsDataURL(event.target.files[0]);
                    }
                });
        @endforeach
    });
</script>
