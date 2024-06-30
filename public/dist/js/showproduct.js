document.addEventListener('DOMContentLoaded', function () {
    const cartOverlay = document.getElementById('cartOverlay');
    const closeCart = document.getElementById('closeCart');
    const cartItems = document.getElementById('cartItems');
    const cartTotal = document.getElementById('cartTotal');
    const cartIcon = document.querySelector('.shopping');
    const quantitySpan = document.querySelector('.quantity');
    const homeContent = document.querySelector('.home-content');
    // QR Code Overlay
    const qrCodeOverlay = document.getElementById('qrCodeOverlay');
    const closeQrOverlay = document.getElementById('closeQrOverlay');
    // Riwayat Overlay
    const riwayatOverlay = document.getElementById('riwayat-overlay');
    const closeRiwayat = document.getElementById('closeRiwayat');
    const riwayatButton = document.getElementById('riwayatButton');
    const riwayatItems = document.getElementById('riwayatItems');
    // Order 
    const orderForm = document.getElementById('orderForm');
    let total = 0;
    let cart = [];

    function getCsrfToken() {
        return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    }

    async function fetchCart() {
        try {
            const response = await fetch('/keranjangs/showCart');
            const data = await response.json();
            cart = data.map(item => ({
                name: item.barang.nama_barang,
                price: item.barang.harga_barang,
                image: item.barang.image,
                qty: item.kuantitas
            }));
            updateCart();
        } catch (error) {
            console.error('Error fetching cart data:', error);
        }
    }

    function updateCart() {
        cartItems.innerHTML = '';
        total = 0;
        cart.forEach((item, index) => {
            total += item.price * item.qty;
            const li = document.createElement('li');
            li.innerHTML = `
                <img src="${item.image}" alt="${item.name}">
                <span><b>${item.name}</b> <br> Rp. ${item.price * item.qty}</span>
                <div class="flex-center">
                    <button class="qty-btn" onclick="decreaseQty(${index})">-</button>
                    <span>${item.qty}</span>
                    <button class="qty-btn" onclick="increaseQty(${index})">+</button>
                    <button class="remove-btn" onclick="removeItem(${index})">x</button>
                </div>
            `;
            cartItems.appendChild(li);
        });
        cartTotal.innerText = `Rp. ${total}`;
        quantitySpan.innerText = cart.reduce((sum, item) => sum + item.qty, 0);
    }

    async function updateCartInDatabase() {
        try {
            const response = await fetch('/keranjangs/update', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': getCsrfToken()
                },
                body: JSON.stringify({ items: cart })
            });
            const result = await response.json();
            console.log(result.message);
        } catch (error) {
            console.error('Error updating cart data:', error);
        }
    }

    async function addToCart(name, price, image) {
        const itemIndex = cart.findIndex(item => item.name === name);
        if (itemIndex > -1) {
            cart[itemIndex].qty++;
        } else {
            cart.push({ name, price, image, qty: 1 });
        }
        updateCart();
        await updateCartInDatabase();
    }

    window.decreaseQty = async function (index) {
        if (cart[index].qty > 1) {
            cart[index].qty--;
        } else {
            cart.splice(index, 1);
        }
        updateCart();
        await updateCartInDatabase();
    }

    window.increaseQty = async function (index) {
        cart[index].qty++;
        updateCart();
        await updateCartInDatabase();
    }

    window.removeItem = async function (index) {
        const item = cart[index];
        cart.splice(index, 1);
        updateCart();
        await removeItemFromDatabase(item.name);
    }

    async function removeItemFromDatabase(name) {
        try {
            const response = await fetch('/keranjangs/destroy', {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': getCsrfToken()
                },
                body: JSON.stringify({ name })
            });
            const result = await response.json();
            console.log(result.message);
        } catch (error) {
            console.error('Error removing item from database:', error);
        }
    }

    async function getCustomerId() {
        try {
            const response = await fetch('/get_customer_id');
            const data = await response.json();
            return data.id_customer;
        } catch (error) {
            console.error('Error fetching customer ID:', error);
        }
    }

    async function placeOrder() {
        console.log('placeOrder called at:', new Date().toISOString());
        try {
            const customerId = await getCustomerId();
            if (!customerId) {
                throw new Error('Customer ID not found');
            }

            const selectedMetodePembayaran = document.querySelector('input[name="metode_pembayaran"]:checked').value;

            const orderData = {
                customer_id: customerId,
                barang: cart.map(item => ({
                    name: item.name,
                    qty: item.qty // Pastikan qty diambil dari item.qty
                })),
                total_harga: total,
                metode_pembayaran: selectedMetodePembayaran // Pastikan metode_pembayaran dikirim dengan benar
            };

            console.log('Order Data:', orderData); // Log order data untuk debug

            const response = await fetch('/riwayat_transaksi/store', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': getCsrfToken()
                },
                body: JSON.stringify(orderData)
            });

            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }

            const result = await response.json();
            console.log('Response from Server:', result);

            // Tampilkan overlay nota setelah pesanan berhasil disimpan
            showNotaOverlay(orderData);

        } catch (error) {
            console.error('Error placing order:', error);
            // Handle error as needed, e.g., display error message to user
        }
    }

    // Fungsi untuk menampilkan overlay nota
    function showNotaOverlay(orderData) {
        const notaContent = document.getElementById('notaContent');
        notaContent.innerHTML = `
            <p><b>Nama Barang</b></p>
            <ul>
                ${orderData.barang.map(item => `<li>${item.name} - ${item.qty}</li>`).join('')}
            </ul>
            <p><b>Total Harga</b>: Rp. ${orderData.total_harga}</p>
            <p><b>Metode Pembayaran</b>: ${orderData.metode_pembayaran}</p>
        `;
        const notaOverlay = document.getElementById('notaOverlay');
        notaOverlay.style.display = 'flex';
    }

    

    // Fungsi untuk menampilkan Riwayat Transaksi
    async function fetchRiwayatTransaksi() {
        try {
            const response = await fetch('/riwayat_transaksi/show');
            const data = await response.json();
            const riwayatItems = document.getElementById('riwayatItems');
            riwayatItems.innerHTML = '';

            data.forEach(transaksi => {
                const li = document.createElement('li');
                li.innerHTML = `
                <p>Barang: ${JSON.parse(transaksi.barang).map(item => item.name + ' (' + item.qty + ')').join(', ')}</p>
                <p>Total Harga: Rp. ${transaksi.total_harga}</p>
                <p>Metode Pembayaran: ${transaksi.metode_pembayaran}</p>
                <hr>
            `;
                riwayatItems.appendChild(li);
            });

            document.getElementById('riwayat-overlay').style.display = 'block';
        } catch (error) {
            console.error('Error fetching riwayat transaksi:', error);
        }
    }

    // Event listener untuk tombol Close pada overlay nota
    document.getElementById('closeNotaOverlay').addEventListener('click', function () {
        const notaOverlay = document.getElementById('notaOverlay');
        notaOverlay.style.display = 'none';
    });

    // Pastikan hanya ada satu event listener
    if (orderForm.dataset.listenerAdded !== 'true') {
        orderForm.addEventListener('submit', function (event) {
            event.preventDefault();
            placeOrder();
        });
        orderForm.dataset.listenerAdded = 'true';
    }

    document.querySelectorAll('.btn-add').forEach((btn) => {
        btn.addEventListener('click', function () {
            const card = btn.closest('.card');
            const name = card.querySelector('.card-title').innerText;
            const priceText = card.querySelector('.card-text').innerText;
            const price = parseInt(priceText.replace('Rp ', '').replace(/\./g, '').replace(',', '.'));
            const image = card.querySelector('.rounded').src;

            addToCart(name, price, image);
        });
    });

    cartIcon.addEventListener('click', function () {
        if (cartOverlay.style.right === '0px') {
            cartOverlay.style.right = '-100%';
            homeContent.classList.remove('with-cart-overlay');
        } else {
            cartOverlay.style.right = '0px';
            homeContent.classList.add('with-cart-overlay');
            fetchCart();
        }
    });

    closeCart.addEventListener('click', function () {
        cartOverlay.style.right = '-100%';
        homeContent.classList.remove('with-cart-overlay');
    });

    // Fungsi untuk menampilkan QR Overlay
    function showQrOverlay() {
        console.log('QR Overlay should be shown');
        qrCodeOverlay.style.display = 'flex';
    }

    // Fungsi untuk menyembunyikan QR Overlay
    function hideQrOverlay() {
        qrCodeOverlay.style.display = 'none';
    }

    // Event listener untuk radio button QR Payment
    document.getElementById('qrPayment').addEventListener('change', function () {
        if (this.checked) {
            showQrOverlay();
        }
    });

    riwayatButton.addEventListener('click', async function () {
        riwayatOverlay.style.display = 'flex';
        await fetchRiwayatTransaksi();
    });

    closeRiwayat.addEventListener('click', function () {
        riwayatOverlay.style.display = 'none';
    });

    // Event listener untuk tombol Close pada QR Overlay
    closeQrOverlay.addEventListener('click', function () {
        hideQrOverlay();
    });

    document.getElementById('searchInput').addEventListener('input', function () {
        const query = this.value.toLowerCase();
        const cards = document.querySelectorAll('.card');

        cards.forEach((card) => {
            const title = card.querySelector('.card-title').innerText.toLowerCase();
            if (title.includes(query)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
});
