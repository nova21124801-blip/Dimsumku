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
        $userID=session()->get('id_user');
        $data['statushalaman']="";
        $cek = $transaksi->cek_data($userID);
        $idTransaksi = 0;
        if($cek)
            $idTransaksi = $cek['id_transaksi'];
        $data['jmlitem'] = $detail->countDataWithCriteria($idTransaksi);
        $data['detail'] = $detail->getItemsWithDetail($idTransaksi);
        echo view('part/header');
        echo view('part/topbar', $data);
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
}
