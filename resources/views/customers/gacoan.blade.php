<div class="row">
    <h1>MIE GACOAN</h1>
    {{-- {{ dd($barang) }} --}}
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

<!-- Modal HTML -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login Diperlukan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Silahkan login terlebih dahulu untuk melakukan pemesanan
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="{{ route('logincustomer') }}" class="btn btn-primary">Login</a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var btnPesan = document.getElementById('btn-pesan');
        if (btnPesan) {
            btnPesan.addEventListener('click', function() {
                $('#loginModal').modal('show');
            });
        }
    });
</script>
