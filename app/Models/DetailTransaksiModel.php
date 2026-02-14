<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailTransaksiModel extends Model
{
    protected $table      = 'tbl_detail_transaksi';
    protected $primaryKey = 'id_detail';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_transaksi','id_item','jumlah'];

    public function item()
    {
        return $this->belongsTo(ItemModel::class, 'id_item');
    }

    // Perbaikan: Join langsung ke tbl_barang berdasarkan kode_barang
    // Asumsi harga ada di tbl_barang. Jika warna diperlukan, tambah join ke tbl_item jika ada foreign key.
  public function getItemsWithDetail($idTransaksi)
{
    return $this->db->table('tbl_detail_transaksi d')
        ->select('
            d.id_detail,
            d.id_transaksi,
            d.id_item,
            d.jumlah,
            b.nama_barang,
            b.gambar,
            i.harga
        ')
        ->join('tbl_item i', 'i.id_item = d.id_item')
        ->join('tbl_barang b', 'b.kode_barang = i.kode_barang')
        ->where('d.id_transaksi', $idTransaksi)
        ->get()
        ->getResultArray();
}


    // Tetap sama
    public function cek_data($id_transaksi, $id_item)
    {
        return $this->db->table('tbl_detail_transaksi')
                        ->where('id_transaksi', $id_transaksi)
                        ->where('id_item', $id_item)
                        ->get()->getRowArray();
    }

    public function countDataWithCriteria($idTransaksi)
    {
        return $this->where('id_transaksi', $idTransaksi)->countAllResults();
    }

    // Perbaikan serupa untuk getProdukTerlaris (jika digunakan)
  public function getProdukTerlaris()
{
    $builder = $this->db->table('tbl_detail_transaksi');
    $builder->select('SUM(tbl_detail_transaksi.jumlah) as total,
                      tbl_barang.nama_barang,
                      tbl_barang.gambar');
    $builder->join('tbl_item', 'tbl_item.id_item = tbl_detail_transaksi.id_item');
    $builder->join('tbl_barang', 'tbl_barang.kode_barang = tbl_item.kode_barang');
    $builder->groupBy('tbl_barang.kode_barang');
    $builder->orderBy('total', 'DESC');
    $builder->limit(4);

    return $builder->get()->getResult();
}
}