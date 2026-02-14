<!-- Receipt Page Start -->
<div class="container-fluid py-5 mt-5">
    <div class="container py-5">

        <h1 class="mb-4 text-center">Order Receipt</h1>

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success text-center">
                <?= esc(session()->getFlashdata('success')) ?>
            </div>
        <?php endif; ?>

        <!-- Order Info -->
        <div class="mb-4">
            <h5>Order Information</h5>
            <p><strong>Order ID:</strong> #<?= esc($transaksi['id_transaksi']) ?></p>
            <p>
            <strong>Date:</strong> 
            <?= date('d M Y - H:i', strtotime($transaksi['tgl_transaksi'])) ?>
            </p>
        </div>

        <hr>

        <!-- Billing Details -->
        <div class="mb-4">
            <h5>Billing Details</h5>
            <p><strong>Nama pembeli :</strong> <?= esc($transaksi['nama_pembeli']) ?></p>
            <p><strong>Email        :</strong> <?= esc($transaksi['email']) ?></p>
            <p><strong>Alamat       :</strong> <?= esc($transaksi['alamat']) ?></p>
            <p><strong>No Handphone :</strong> <?= esc($transaksi['no_hp']) ?></p>
        </div>

        <hr>

<!-- Order Info -->

<?php if (!empty($transaksi['payment_method'])) : ?>
    <p><strong>Metode Pembayaran:</strong> <?= esc($transaksi['payment_method']) ?></p>
<?php endif; ?>

        <!-- Order Summary -->
        <h4 class="mb-3">Your Order</h4>
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
                            $nama_item = $d['nama_barang'] ?? 'Unknown Item';
                            $harga = $d['harga'] ?? 0;
                            $jumlah = $d['jumlah'] ?? 0;
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
                            <td colspan="3" class="text-center">No items found</td>
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

        <div class="row g-4 text-center align-items-center justify-content-center pt-4">
            <a href="<?= base_url() ?>" class="btn border-secondary py-3 px-4 text-uppercase text-primary">
                Back to Home
            </a>
        </div>

    </div>
</div>
<!-- Receipt Page End -->
