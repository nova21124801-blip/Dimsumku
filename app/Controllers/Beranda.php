<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\CarouselModel;
use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;
use App\Models\BarangModel;
use App\Models\ItemModel;

class Beranda extends BaseController
{
    public function index()
    {
        $kategori   = new KategoriModel();
        $carousel   = new CarouselModel();
        $transaksi  = new TransaksiModel();
        $detail     = new DetailTransaksiModel();
        $barang     = new BarangModel();
        $item       = new ItemModel();
        
        // ================= DATA UTAMA =================
    $data['brg'] = $item
        ->select('tbl_item.id_item,
                  tbl_item.harga,
                  tbl_barang.kode_barang,
                  tbl_barang.nama_barang,
                  tbl_barang.gambar')
        ->join('tbl_barang', 'tbl_barang.kode_barang = tbl_item.kode_barang')
        ->asArray()
        ->findAll();

    $data['kat'] = $kategori->asArray()->findAll();
    $data['crs'] = $carousel->asArray()->findAll();

       // ================= INFO TRANSAKSI =================
    $data['statushalaman'] = 'beranda';

    $userID = session()->get('id_user');
    $cek    = $transaksi->cek_data($userID);

    $idTransaksi = $cek ? $cek['id_transaksi'] : 0;
    $data['jmlitem'] = $detail->countDataWithCriteria($idTransaksi);

    echo view('part/header');
    echo view('part/navbar', $data);
    echo view('beranda', $data);
    echo view('part/footer');
}

}

