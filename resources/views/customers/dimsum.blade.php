<div class="row">
    <h1>DIMSUM</h1>
    <div class="col-12">
        <div id="productGrid" class="row row-cols-2 row-cols-sm-2 row-cols-md-5 row-cols-2 g-1">
            @foreach ($barangs as $barang)
                <div class="col mb-4">
                    <div class="card">
                        <img src="{{ asset('/storage/products/' . $barang->foto_barang) }}" class="rounded"
                            style="width: 180px" height="150px">
                        <div>
                            <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                            <p class="card-text">{{ 'Rp ' . number_format($barang->harga_barang, 2, ',', '.') }}</p>
                            @if (session('userData'))
                                <button class="btn-add">Add</button>
                            @else
                                <button class="btn-add" id="btn-pesan">Pesan</button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
