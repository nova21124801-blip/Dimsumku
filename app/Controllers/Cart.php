<?php

namespace App\Controllers;
use App\Models\KategoriModel;
use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;

class Cart extends BaseController
{
    public function index()
{
    if (session()->get('username') == '') {
        session()->setFlashdata('gagal', 'Anda belum login');
        return redirect()->to(base_url('login'));
    }
    
    $kategori = new KategoriModel();
    $transaksi = new TransaksiModel();
    $detail = new DetailTransaksiModel();
    
    $data['kat'] = $kategori->findAll();
    $userID = session()->get('id_user');
    $data['statushalaman'] = "";
    
    $cek = $transaksi->cek_data($userID);
    $idTransaksi = 0;
    if ($cek) {
        $idTransaksi = $cek['id_transaksi'];
        // Jika transaksi "awal" dan tidak ada detail, hapus transaksi untuk reset cart
        $jmlItem = $detail->countDataWithCriteria($idTransaksi);
        if ($cek['status'] == 'awal' && $jmlItem == 0) {
            $transaksi->delete($idTransaksi);
            $idTransaksi = 0;  // Reset agar cart kosong
        }
    }
    
    $data['jmlitem'] = $detail->countDataWithCriteria($idTransaksi);
    $data['detail'] = $detail->getItemsWithDetail($idTransaksi);
    
    echo view('part/header');
    echo view('part/navbar', $data);
    echo view('cart', $data);
    echo view('part/footer');
}
    public function tambahCart(){
        if (session()->get('username') == '') {
            session()->setFlashdata('gagal', 'Anda belum login');
            return redirect()->to(base_url('login'));
         }
        $kategori = new KategoriModel();
        $transaksi = new TransaksiModel();
        $detail = new DetailTransaksiModel();
        $data['kat'] = $kategori->findAll();
        $userID=session()->get('id_user');
        $data['statushalaman']="";
        $cek = $transaksi->cek_data($userID);
        if($cek){
            $idTransaksi = $cek['id_transaksi'];
            $idItem=$this->request->getPost('id_item');
            $cekdetail = $detail->cek_data($idTransaksi,$idItem);
            if($cekdetail){
                $idDetail=$cekdetail['id_detail'];
                $jml=$cekdetail['jumlah'];
                $jumlah=$this->request->getPost('jumlah')+$jml;
                $detail->update($idDetail, [
                    "jumlah" => $jumlah
                ]);
            }else{
                $detail->insert([
                    "id_transaksi" => $idTransaksi,
                    "id_item" => $idItem,
                    "jumlah" => $this->request->getPost('jumlah')
                ]);
            }
        }else {
            $transaksi->insert([
                "tgl_transaksi" => date('Y-m-d'),
                "id_user" => $userID,
                "status" => "awal"
            ]);
            $idTransaksi = $transaksi->insertID();
            $detail->insert([
                "id_transaksi" => $idTransaksi,
                "id_item" => $this->request->getPost('id_item'),
                "jumlah" => $this->request->getPost('jumlah')
            ]);
        }
        return redirect('cart');
    }
    public function checkout()
{
    if (session()->get('username') == '') {
        session()->setFlashdata('gagal', 'Anda belum login');
        return redirect()->to(base_url('login'));
    }

    $kategori = new KategoriModel();
    $transaksi = new TransaksiModel();
    $detail = new DetailTransaksiModel();

    $userID = session()->get('id_user');
    $cek = $transaksi->cek_data($userID);
    
    $idTransaksi = 0;
    if($cek) {
        $idTransaksi = $cek['id_transaksi'];
    }

    $data['kat'] = $kategori->findAll();
    $data['statushalaman'] = "";
    $data['jmlitem'] = $detail->countDataWithCriteria($idTransaksi);
    // Mengambil data item yang ada di keranjang untuk ditampilkan di ringkasan checkout
    $data['detail'] = $detail->getItemsWithDetail($idTransaksi);

    echo view('part/header');
    echo view('part/navbar', $data);
    echo view('checkout', $data); // Pastikan nama file view-nya adalah checkout.php
    echo view('part/footer');
}

public function proses_checkout()
{
    $transaksi = new TransaksiModel();
    $idTransaksi = $this->request->getPost('id_transaksi');

    if ($idTransaksi) {
        // 1. Update status transaksi dari 'awal' menjadi 'selesai' atau 'diproses'
        $transaksi->update($idTransaksi, [
            'status' => 'selesai',
            'tgl_transaksi' => date('Y-m-d H:i:s') // update waktu bayar
        ]);

        // 2. Redirect ke halaman struk dengan membawa ID Transaksi
        return redirect()->to(base_url('cart/struk/' . $idTransaksi));
    }

    return redirect()->to(base_url('cart'))->with('gagal', 'Transaksi tidak ditemukan');
}

public function struk($id)
{
    $kategori = new KategoriModel();
    $detail = new DetailTransaksiModel();
    $transaksi = new TransaksiModel();

    $data['kat'] = $kategori->findAll();
    $data['transaksi'] = $transaksi->find($id);
    $data['detail'] = $detail->getItemsWithDetail($id);
    $data['statushalaman'] = "";

    echo view('part/header');
    echo view('part/navbar', $data);
    echo view('struk_pembelian', $data); // Buat file view baru
    echo view('part/footer');
}
public function logout()
{
    $transaksi = new TransaksiModel();
    $userID = session()->get('id_user');
    
    // Hapus transaksi "awal" saat logout untuk reset cart
    $cek = $transaksi->cek_data($userID);
    if ($cek && $cek['status'] == 'awal') {
        $transaksi->delete($cek['id_transaksi']);  // Hapus transaksi awal
    }
    
    session()->destroy();
    return redirect()->to('/');
}
}
