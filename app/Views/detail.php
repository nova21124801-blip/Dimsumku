<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?> - K9 Project Resto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>

    
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #e74c3c;
            --text-dark: #2c3e50;
            --text-light: #7f8c8d;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            background: linear-gradient(135deg, var(--primary-color) 0%, #34495e 100%);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .breadcrumb {
            background: none;
            padding: 20px 0;
        }

        /* Styles inspired by the homepage (beranda) fruite-item */
        .product-detail-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            margin-top: 30px;
            margin-bottom: 30px;
            overflow: hidden;
        }

        .product-img {
            position: relative;
        }

        .product-img img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 15px 15px 0 0;
        }

        .product-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background: #6c757d;
            color: white;
            padding: 5px 15px;
            border-radius: 10px;
            font-size: 0.9rem;
        }

        .product-body {
            padding: 30px;
        }

        .product-title {
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .rating-stars {
            color: #ffc107;
            margin-bottom: 15px;
        }

        .product-price {
            font-size: 1.8rem;
            font-weight: bold;
            color: var(--secondary-color);
            margin-bottom: 15px;
        }

        .product-description {
            color: #6c757d;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 600;
            color: var(--text-dark);
        }

        .form-select-lg {
            font-size: 1.1rem;
        }

        .input-group .btn {
            border-radius: 0;
        }

        .input-group .form-control {
            border-left: none;
            border-right: none;
        }

        .btn-add-cart {
            background-color: var(--secondary-color);
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            color: white;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-add-cart:hover {
            background-color: #c0392b;
        }

        .btn-wishlist {
            background-color: transparent;
            border: 1px solid #dc3545;
            color: #dc3545;
            padding: 12px 20px;
            border-radius: 25px;
            transition: all 0.3s;
        }

        .btn-wishlist:hover {
            background-color: #dc3545;
            color: white;
        }

        .trust-info {
            font-size: 0.9rem;
            color: #6c757d;
            margin-top: 15px;
        }

        footer {
            background-color: var(--primary-color);
            color: white;
            padding: 30px 0;
            margin-top: 60px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
       <a class="navbar-brand" href="<?= base_url() ?>">
    <img src="<?= base_url('template/img/Dimsum-logo.jpg') ?>" 
         alt="Dimsum Chibi Icon" 
         class="me-2 dimsum-img" 
         style="height: 70px; width: auto; object-fit: contain;">
    DIMSUMM2PUTRI_APP
</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>"><i class="fas fa-home me-1"></i> Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url('menu') ?>"><i class="fas fa-book-open me-1"></i> Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link position-relative" href="<?= base_url('keranjang') ?>">
                            <i class="fas fa-shopping-cart me-1"></i> Keranjang
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="cartBadge">
                                0
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin') ?>"><i class="fas fa-user-shield me-1"></i> Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Breadcrumb -->
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Beranda</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('menu') ?>">Menu</a></li>
                <li class="breadcrumb-item active"><?= esc($produk['nama_barang']) ?></li>
            </ol>
        </nav>
    </div>

    <!-- Product Detail (Styled like homepage fruite-item but larger) -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="product-detail-card">
                    <!-- PRODUCT IMAGE -->
                    <div class="product-img">
                        <img
                            src="<?= !empty($produk['gambar'])
                                ? base_url('file_gambar/' . $produk['gambar'])
                                : base_url('template/img/no-image.png') ?>"
                            alt="<?= esc($produk['nama_barang']) ?>">
                        <div class="product-badge">
                            Menu
                        </div>
                    </div>

                    <!-- PRODUCT BODY -->
                    <div class="product-body">
                        <!-- TITLE -->
                        <h2 class="product-title">
                            <?= esc($produk['nama_barang']) ?>
                        </h2>

                        <!-- RATING -->
                        <div class="rating-stars">
                            ★★★★☆ <span class="text-muted">(4.5)</span>
                        </div>

                        <!-- PRICE -->
                        <div class="product-price">
                            Rp <?= number_format($produk['harga'] ?? 0, 0, ',', '.') ?>
                        </div>

                        <!-- DESCRIPTION -->
                        <p class="product-description">
                            <?= esc($produk['deskripsi'] ?? 'Deskripsi produk belum tersedia.') ?>
                        </p>

                        <hr>

                        <form id="addToCartForm">
                            <!-- VARIANT -->
                            <div class="mb-3">
                                <label class="form-label">Pilih Varian / Warna</label>
                                <select name="id_item" class="form-select form-select-lg" id="variantSelect">
                                    <?php foreach ($item as $i): ?>
                                        <option value="<?= $i['id_item'] ?>" data-harga="<?= $i['harga'] ?>">
                                            <?= esc($i['warna']) ?> — Rp <?= number_format($i['harga'], 0, ',', '.') ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- QTY -->
                            <div class="mb-3">
                                <label class="form-label">Jumlah</label>
                                <div class="input-group w-50">
                                    <button type="button" class="btn btn-outline-secondary" id="decreaseQty">−</button>
                                    <input
                                        type="number"
                                        name="jumlah"
                                        class="form-control text-center"
                                        value="1"
                                        min="1"
                                        id="qtyInput">
                                    <button type="button" class="btn btn-outline-secondary" id="increaseQty">+</button>
                                </div>
                            </div>

                            <!-- ACTION -->
                            <div class="d-flex gap-3 mt-4">
                                <button type="submit" class="btn btn-add-cart px-4" id="btnAddToCart">
                                    <i class="fa fa-shopping-cart me-2"></i> Tambah ke Keranjang
                                </button>
                                <button type="button" class="btn btn-wishlist">
                                    <i class="fa fa-heart"></i>
                                </button>
                            </div>

                            <!-- TRUST INFO -->
                            <div class="trust-info">
                                <i class="fa fa-check-circle text-success me-2"></i>
                                Produk original & siap dikirim
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p class="mb-0">&copy; <?= date('Y') ?> K9 Project Resto. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Load cart count on page load
            updateCartBadge();

            // Quantity controls
            $('#decreaseQty').on('click', function() {
                var qty = parseInt($('#qtyInput').val());
                if (qty > 1) {
                    $('#qtyInput').val(qty - 1);
                }
            });

            $('#increaseQty').on('click', function() {
                var qty = parseInt($('#qtyInput').val());
                $('#qtyInput').val(qty + 1);
            });

            // Add to Cart functionality
            $('#addToCartForm').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                var $btn = $('#btnAddToCart');

                // Disable button and show loading
                $btn.prop('disabled', true);
                var originalHTML = $btn.html();
                $btn.html('<i class="fas fa-spinner fa-spin me-2"></i>Menambahkan...');

                $.ajax({
                    url: '<?= base_url('cartAdd') ?>',
                    type: 'POST',
                    data: formData + '&<?= csrf_token() ?>=<?= csrf_hash() ?>',
                    success: function(response) {
                        if (response.success) {
                            // Show success notification
                            showNotification('Produk berhasil ditambahkan ke keranjang!', 'success');
                            
                            // Update cart badge
                            updateCartBadge();

                            // Change button text temporarily
                            $btn.html('<i class="fas fa-check me-2"></i>Berhasil Ditambahkan!');
                            $btn.removeClass('btn-add-cart').addClass('btn-success');

                            // Reset button after 2 seconds
                            setTimeout(function() {
                                $btn.html(originalHTML);
                                $btn.removeClass('btn-success').addClass('btn-add-cart');
                                $btn.prop('disabled', false);
                            }, 2000);
                        } else {
                            showNotification(response.message || 'Gagal menambahkan ke keranjang!', 'error');
                            $btn.prop('disabled', false);
                            $btn.html(originalHTML);
                        }
                    },
                    error: function() {
                        showNotification('Terjadi kesalahan saat menambahkan ke keranjang!', 'error');
                        $btn.prop('disabled', false);
                        $btn.html(originalHTML);
                    }
                });
            });

            // Update cart badge
            function updateCartBadge() {
                $.ajax({
                    url: '<?= base_url('keranjang/getCartCount') ?>',
                    type: 'GET',
                    success: function(response) {
                        $('#cartBadge').text(response.count);
                        if (response.count > 0) {
                            $('#cartBadge').show();
                        } else {
                            $('#cartBadge').hide();
                        }
                    }
                });
            }

            // Show notification
            function showNotification(message, type) {
                var bgClass = type === 'success' ? 'bg-success' : 'bg-danger';
                var icon = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';
                
                var notification = $('<div class="position-fixed top-0 start-50 translate-middle-x mt-3" style="z-index: 9999;">' +
                    '<div class="alert alert-dismissible fade show ' + bgClass + ' text-white shadow-lg" role="alert" style="min-width: 300px;">' +
                    '<i class="fas ' + icon + ' me-2"></i>' + message +
                    '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>' +
                    '</div>' +
                    '</div>');
                
                $('body').append(notification);
                
                setTimeout(function() {
                    notification.fadeOut(function() {
                        $(this).remove();
                    });
                }, 3000);
            }
        });
    </script>
</body>
</html>