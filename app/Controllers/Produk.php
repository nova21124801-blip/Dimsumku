<?php
namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\ItemModel;

class Produk extends BaseController
{
    public function detail($kode_barang)
    {
        $barangModel = new BarangModel();
        $itemModel   = new ItemModel();

        $barang = $barangModel
                    ->asArray()
                    ->where('kode_barang', $kode_barang)
                    ->first();

        if (!$barang) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Barang tidak ditemukan');
        }

        $item = $itemModel
                    ->asArray()
                    ->where('kode_barang', $kode_barang)
                    ->findAll();

        // Kembalikan view dengan nama key yang sesuai dengan isi file detail.php Anda
        return view('detail', [
            'title'  => 'Detail ' . $barang['nama_barang'], // Dibutuhkan baris 6
            'barang' => $barang,                            // Dibutuhkan baris 154 (Breadcrumb)
            'produk' => $barang,                            // Dibutuhkan baris 165 ke bawah (Konten)
            'item'   => $item                               // Dibutuhkan baris 214 (Looping Varian)
        ]);
    }
}