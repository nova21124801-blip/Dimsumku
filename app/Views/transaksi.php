<h1><?= $title ?></h1>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Pembeli</th>
            <th>Total</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach($transaksi as $t): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $t['tgl_transaksi']; ?></td>
            <td><?= $t['nama_pembeli']; ?></td>
            <td><?= $t['total']; ?></td>
            <td><?= $t['status']; ?></td>
            <td>
                <a href="<?= base_url('transaksi/detail/'.$t['id_transaksi']); ?>" class="btn btn-info btn-sm">Detail</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h1><?= $title ?></h1>
<p><strong>Tanggal:</strong> <?= $transaksi['tgl_transaksi'] ?></p>
<p><strong>Nama Pembeli:</strong> <?= $transaksi['nama_pembeli'] ?></p>
<p><strong>Total:</strong> <?= $transaksi['total'] ?></p>
<p><strong>Status:</strong> <?= $transaksi['status'] ?></p>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
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
            <td><?= $d['nama_barang']; ?></td>
            <td><?= $d['jumlah']; ?></td>
            <td><?= $d['harga']; ?></td>
            <td><?= $d['jumlah'] * $d['harga']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

