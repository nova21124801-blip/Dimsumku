<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;

class Transaksi extends BaseController
{
    protected $transaksiModel;
    protected $detailModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
        $this->detailModel = new DetailTransaksiModel();
    }

    // Menampilkan daftar transaksi
    public function index()
    {
        $data = [
            'title' => 'Daftar Transaksi',
            'transaksi' => $this->transaksiModel->findAll()
        ];

        echo view('part_adm/header', $data);
        echo view('part_adm/top_menu', $data);
        echo view('part_adm/side_menu', $data);
        echo view('transaksi/index', $data);
        echo view('part_adm/footer');
    }

    // Menampilkan detail transaksi
    public function detail($id_transaksi)
    {
        $transaksi = $this->transaksiModel->find($id_transaksi);

        $detail = $this->detailModel
                       ->select('tbl_detail_transaksi.*, tbl_item.id_item, tbl_item.harga')
                       ->join('tbl_item', 'tbl_item.id_item = tbl_detail_transaksi.id_item', 'left')
                       ->where('id_transaksi', $id_transaksi)
                       ->findAll();

        $data = [
            'title' => 'Detail Transaksi#' . $id_transaksi,
            'transaksi' => $transaksi,
            'detail' => $detail
        ];

        echo view('part_adm/header', $data);
        echo view('part_adm/top_menu', $data);
        echo view('part_adm/side_menu', $data);
        echo view('transaksi/detail', $data);
        echo view('part_adm/footer');
    }
}
