<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Seluruh Transaksi</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 50px">No</th>
                                <th>Tanggal</th>
                                <th>Nama Pembeli</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th style="width: 100px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach($transaksi as $t): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= date('d/m/Y', strtotime($t['tgl_transaksi'])); ?></td>
                                <td><?= $t['nama_pembeli']; ?></td>
                                <td>Rp <?= number_format($t['total'], 0, ',', '.'); ?></td>
                                <td>
                                    <span class="badge <?= $t['status'] == 'selesai' ? 'badge-success' : 'badge-warning' ?>">
                                        <?= ucfirst($t['status']); ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="<?= base_url('transaksi/detail/'.$t['id_transaksi']); ?>" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>