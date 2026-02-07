<!-- Fruits Shop Start-->
<div class="container-fluid fruite py-5">
    <div class="container py-5">

        <div class="tab-class text-center">
            <div class="row g-4 align-items-center">
                <div class="col-lg-4 text-start">
                    <h1 class="fw-bold">Menu Kami</h1>
                </div>

                <div class="col-lg-8 text-end">
                    <ul class="nav nav-pills d-inline-flex text-center mb-5">

                        <li class="nav-item">
                            <a class="d-flex m-2 py-2 bg-light rounded-pill active"
                               data-bs-toggle="pill" href="#tab-all">
                                <span class="text-dark px-3">All Products</span>
                            </a>
                        </li>

                        <?php if (!empty($kat)): ?>
                            <?php foreach ($kat as $k): ?>
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill"
                                       data-bs-toggle="pill"
                                       href="#tab-<?= $k['id_kategori'] ?>">
                                        <span class="text-dark px-3">
                                            <?= esc($k['nama_kategori']) ?>
                                        </span>
                                    </a>
                                </li>
                            <?php endforeach ?>
                        <?php endif ?>

                    </ul>
                </div>
            </div>

            <div class="tab-content">

                <div id="tab-all" class="tab-pane fade show active p-0">
                    <div class="row g-4">

                        <?php if (!empty($brg)): ?>
                            <?php foreach ($brg as $brglist): ?>

                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="fruite-item rounded shadow-sm h-100 position-relative">

                                        <div class="fruite-img">
                                            <img src="<?= !empty($brglist['gambar']) 
    ? base_url('file_gambar/' . $brglist['gambar']) 
    : base_url('template/img/no-image.png') ?>" 
    class="img-fluid w-100 rounded-top"
    style="height:200px; object-fit:cover;"
    alt="<?= esc($brglist['nama_barang']) ?>">
                                        </div>

                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                             style="top:10px; left:10px;">
                                            Menu
                                        </div>

                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom bg-white">
                                            <h5 class="fw-bold text-dark mb-2">
                                                <?= esc($brglist['nama_barang']) ?>
                                            </h5>

                                            <p class="text-secondary small mb-3">
                                                Produk pilihan dengan kualitas terbaik
                                            </p>

                                            <div class="text-center">
                                                <a href="<?= base_url('produk/detail/' . $brglist['kode_barang']) ?>"
                                                   class="btn btn-primary rounded-pill px-4">
                                                    <i class="fa fa-eye me-1"></i> Lihat Detail
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            <?php endforeach ?>
                        <?php else: ?>
                            <div class="col-12">
                                <div class="alert alert-warning text-center">
                                    Tidak ada produk tersedia
                                </div>
                            </div>
                        <?php endif ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Fruits Shop End -->