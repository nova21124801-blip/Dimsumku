<div class="container-fluid py-5" style="margin-top:150px;">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Item</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    
                    </tr>
                </thead>
                <tbody>
    <?php 
    $total = 0;
    foreach($detail as $item): 
        $subtotal = $item['harga'] * $item['jumlah'];
        $total += $subtotal;
    ?>
    <tr>
        <td class="py-5"><?= esc($item['nama_barang']) ?></td>
        <td class="py-5"><?= number_to_currency($item['harga'], 'IDR', 'en_ID', 2) ?></td>
        <td class="py-5"><?= $item['jumlah'] ?></td>
        <td class="py-5"><?= number_to_currency($subtotal, 'IDR', 'en_ID', 2) ?></td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <th colspan="3" class="py-5 text-right">Subtotal</th>
        <td class="py-5"><?= number_to_currency($total, 'IDR', 'en_ID', 2) ?></td>
    </tr>
</tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold"><?= number_to_currency($total, 'IDR', 'en_ID', 2) ?></h5>
                    </div>
                   <a href="<?= base_url('cart/checkout') ?>" class="btn btn-block btn-primary my-3 py-3">
    Proceed To Checkout
</a>
                </div>
            </div>
        </div>
    </div>
</div>
