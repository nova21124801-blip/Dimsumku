<?php
namespace App\Models;

use CodeIgniter\Model;

class ItemModel extends Model
{
    protected $table = 'tbl_item';
    protected $primaryKey = 'id_item';
    protected $allowedFields = [
        'kode_barang',
        'warna',
        'harga',
        'stok'
    ];
}