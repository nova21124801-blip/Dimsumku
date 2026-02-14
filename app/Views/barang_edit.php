<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Barang</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form Edit Barang</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            
            <!-- Tambah pesan error/sukses -->
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>
            
            <form action="<?= base_url('admin/barang/edit/' . $barang['kode_barang']) ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?> 
                
                <div class="card-body">
                    <input type="hidden" name="id" value="<?= $barang['kode_barang'] ?>" />
                    
                    <div class="form-group">
                        <label for="kode_barang">Kode Barang</label>
                        <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="<?= esc($barang['kode_barang']) ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select name="id_kategori" id="id_kategori" class="form-control" required>
                            <?php foreach ($kategori as $k): 
                                $selected = ($k['id_kategori'] == $barang['id_kategori']) ? 'selected' : '';
                            ?>
                                <option value="<?= $k['id_kategori'] ?>" <?= $selected ?>><?= esc($k['nama_kategori']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= esc($barang['nama_barang']) ?>" required>
                    </div>
                    
                    <!-- Tambah field harga di sini -->
                    <div class="form-group">
                        <label for="harga">Harga Barang</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="<?= esc($barang['harga'] ?? '') ?>" placeholder="Enter Harga Barang (contoh: 10000)" min="1" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="gambar">Gambar Barang</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" accept=".jpg,.jpeg,.png"><br>
                        <?php if (!empty($barang['gambar'])): ?>
                            <img width="150px" class="img-thumbnail" src="<?= base_url('file_gambar/' . $barang['gambar']) ?>" alt="Gambar Lama">
                        <?php else: ?>
                            <p>Tidak ada gambar</p>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>