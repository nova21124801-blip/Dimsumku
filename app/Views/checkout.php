<!-- Checkout Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
       <h1 class="mb-4 mt-5">Detail Pesanan</h1>

        <!-- Tampilkan error jika ada -->
        <?php if (session()->getFlashdata('errors')) : ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('checkout/process_order') ?>" method="POST">
            <input type="hidden" name="id_transaksi" value="<?= session()->get('id_transaksi') ?? '' ?>">
            <div class="row g-5">

                <!-- Billing Details -->
                <div class="col-md-12 col-lg-6 col-xl-7">
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Nama Depan<sup>*</sup></label>
                                <input type="text" name="first_name" class="form-control" value="" required>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Nama Belakang<sup>*</sup></label>
                                <input type="text" name="last_name" class="form-control" value="" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-item">
                        <label class="form-label my-3">Alamat<sup>*</sup></label>
                        <input type="text" name="address" class="form-control" value="" required>
                    </div>

                    <div class="form-item">
                        <label class="form-label my-3">Kota<sup>*</sup></label>
                        <input type="text" name="town_city" class="form-control" value="" required>
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Negara<sup>*</sup></label>
                        <input type="text" name="country" class="form-control" value="" required>
                    </div>

                    <div class="form-item">
                        <label class="form-label my-3">Kode Pos<sup>*</sup></label>
                        <input type="text" name="postcode" class="form-control" value="" required>
                    </div>

                    <div class="form-item">
                        <label class="form-label my-3">No Handphone<sup>*</sup></label>
                        <input type="text" name="mobile" class="form-control" value="" required>
                    </div>

                    <div class="form-item">
                        <label class="form-label my-3">Alamat Email<sup>*</sup></label>
                        <input type="email" name="email" class="form-control" value="" required>
                    </div>

                    <hr>

                    <div class="form-item">
                        <textarea name="order_notes" class="form-control" spellcheck="false" cols="30" rows="8" placeholder="Order Notes (Optional)"></textarea>
                    </div>
                </div>

                <!-- Cart Items -->
                <div class="col-md-12 col-lg-6 col-xl-5">
                    <h4 class="mb-3">Pesanan Kamu</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Menu</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-end">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                if (!empty($detail)) :
                                    foreach ($detail as $d) :
                                        // Pastikan key array ada, gunakan fallback jika tidak
                                        $nama_item = $d['nama_item'] ?? $d['nama_barang'] ?? 'Unknown Item';  // Konsistensi dengan kode sebelumnya
                                        $harga = $d['harga'] ?? 0;
                                        $jumlah = $d['jumlah'] ?? 0;  // Ini untuk menghindari error 'qty' atau undefined key
                                        $subtotal = $harga * $jumlah;
                                        $total += $subtotal;
                                ?>
                                        <tr>
                                            <td><?= esc($nama_item) ?></td>
                                            <td class="text-center"><?= esc($jumlah) ?></td>
                                            <td class="text-end">Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
                                        </tr>
                                    <?php endforeach;
                                else : ?>
                                    <tr>
                                        <td colspan="3" class="text-center">No items in cart</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2" class="text-end">Total</th>
                                    <th class="text-end">Rp <?= number_format($total, 0, ',', '.') ?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

<!-- Tambahkan di bawah "Pesanan Kamu" / sebelum tombol submit -->
<div class="form-item mt-4">
    <label class="form-label my-3"><strong>Pilih Metode Pembayaran<sup>*</sup></strong></label>
    <input type="hidden" name="id_transaksi" value="<?= session()->get('id_transaksi') ?>">


    <div class="form-check">
        <input class="form-check-input" type="radio" name="payment_method" id="Cash" value="Cash" required>
        <label class="form-check-label" for="Cash">Cash</label>
    </div>
</div>

    <div class="form-check">
        <input class="form-check-input" type="radio" name="payment_method" id="cod" value="COD" required>
        <label class="form-check-label" for="cod">Cash on Delivery (COD)</label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="radio" name="payment_method" id="e_wallet" value="E-Wallet" required>
        <label class="form-check-label" for="e_wallet">E-Wallet</label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="radio" name="payment_method" id="Qris" value="Qris" required>
        <label class="form-check-label" for="Qris">Qris</label>
    </div>
</div>

   <div class="row g-4 text-center align-items-center justify-content-center pt-4">
     <button type="submit" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">
        Pesan
        </button>
        </div>
     </div>
     
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.querySelector('form').addEventListener('submit', function(e) {
        e.preventDefault(); // Cegah submit langsung
        Swal.fire({
            title: 'Konfirmasi Pesanan',
            text: 'Apakah Anda yakin ingin melanjutkan pesanan?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit(); // Submit form jika dikonfirmasi
            }
        });
    });
</script>
            </div>
        </form>
    </div>
</div>
<!-- Checkout Page End -->