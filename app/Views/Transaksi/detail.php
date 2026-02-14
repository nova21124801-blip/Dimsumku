<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title ?></h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="<?= base_url('transaksi') ?>" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-outline card-primary">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Nama Pembeli:</strong> <?= $transaksi['nama_pembeli'] ?><br>
                            <strong>Tanggal:</strong> <?= date('d/m/Y H:i', strtotime($transaksi['tgl_transaksi'])) ?>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <strong>Status:</strong> 
                            <span class="badge <?= $transaksi['status'] == 'selesai' ? 'badge-success' : 'badge-warning' ?>">
                                <?= ucfirst($transaksi['status']) ?>
                            </span><br>
                            <strong>Total Bayar:</strong> Rp <?= number_format($transaksi['total'], 0, ',', '.') ?>
                        </div>
                    </div>
                    
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 50px">No</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach($detail as $d): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $d['id_item']; ?></td>
                                <td><?= $d['harga']; ?></td>
                                <td>Rp <?= number_format($d['harga'], 0, ',', '.'); ?></td>
                                <td>Rp <?= number_format($d['jumlah'] * $d['harga'], 0, ',', '.'); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>