<div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Item</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php 
                            $total=0;
                            foreach($detail as $brglist): ?>
                        <?php
                            $subtotal=$brglist['harga']*$brglist['jumlah'];
                            $total=$total+$subtotal;
                        ?>
                        <tr>
                            <td class="align-middle"><img src="<?= base_url() . "/file_gambar/" . $brglist['gambar']; ?>" alt="" style="width: 50px;"> <?= $brglist['nama_barang'] ?></td>
                            <td class="align-middle"><?= $brglist['harga'] ?></td>
                            <td class="align-middle"><?= $brglist['jumlah'] ?></td>
                            <td class="align-middle"><?= $subtotal ?></td>
                            <td class="align-middle"><button class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
                        </tr>
                        <?php endforeach ?>
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
                        <button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
