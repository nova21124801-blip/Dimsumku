<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\CarouselModel;
use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;
use App\Models\BarangModel;

class Beranda extends BaseController
{
    public function index()
    {
        $kategori   = new KategoriModel();
        $carousel   = new CarouselModel();
        $transaksi  = new TransaksiModel();
        $detail     = new DetailTransaksiModel();
        $barang     = new BarangModel();

        // ================= DATA UTAMA =================
        // Pakai ARRAY semua
        $data['brg'] = $barang->asArray()->findAll();
        $data['kat'] = $kategori->asArray()->findAll();
        $data['crs'] = $carousel->asArray()->findAll();

        // ================= INFO TRANSAKSI =================
        $data['statushalaman'] = 'beranda';

        $userID = session()->get('id_user');
        $cek    = $transaksi->cek_data($userID);

        $idTransaksi = $cek ? $cek['id_transaksi'] : 0;
        $data['jmlitem'] = $detail->countDataWithCriteria($idTransaksi);

        // ================= LOAD VIEW (SATU KALI) =================
        echo view('part/header');
        echo view('part/navbar', $data);
        echo view('beranda', $data);
        echo view('part/footer');
    }
}
