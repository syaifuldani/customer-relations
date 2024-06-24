@extends('layouts.distribusi.Layoutindex')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header">Tambah Barang</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('tambah_barang.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input id="nama_barang" type="text" class="form-control" name="nama_barang" required
                                    autofocus>
                            </div>

                            <div class="form-group">
                                <label for="foto_barang">Foto Barang</label>
                                <input id="foto_barang" type="file" class="form-control-file" name="foto_barang"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="kategori_barang">Kategori Barang</label>
                                <select id="kategori_barang" class="form-control" name="kategori_barang" required>
                                    <option value="mie-gacoan">Mie Gacoan</option>
                                    <option value="mie-hompimpa">Mie Hompimpa</option>
                                    <option value="dimsum">Dimsum</option>
                                    <option value="minuman">Minuman</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="harga_barang">Harga Barang</label>
                                <input id="harga_barang" type="number" class="form-control" name="harga_barang" required>
                            </div>

                            <div class="form-group">
                                <label for="stok_barang">Stok Barang</label>
                                <input id="stok_barang" type="number" class="form-control" name="stok_barang" required>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
