<?php
namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'tbl_barang';
    protected $primaryKey = 'id_barang';
    protected $allowedFields = [
        'kode_barang',
        'nama_barang',
        'deskripsi',
        'gambar',
        'harga'
    ];

    public function generateKodeBarang()
{
    $builder = $this->db->table($this->table);
    $builder->selectMax('kode_barang', 'kode');
    $query = $builder->get()->getRowArray();

    if (!$query || !$query['kode']) {
        return 'BRG001';
    }

    $lastKode = $query['kode']; // contoh: BRG009
    $angka = (int) substr($lastKode, 3);
    $angka++;

    return 'BRG' . str_pad($angka, 3, '0', STR_PAD_LEFT);
}

}
