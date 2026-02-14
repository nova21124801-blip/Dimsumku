<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;
use App\Models\KategoriModel;

class Checkout extends BaseController
{
    public function index()
    {
        helper('form');

        if (!session()->get('username')) {
            return redirect()->to(base_url('login'));
        }

        $kategori = new KategoriModel();
        $transaksi = new TransaksiModel();
        $detail = new DetailTransaksiModel();

        $userID = session()->get('id_user');

        // Cek transaksi status awal milik user
        $cek = $transaksi->where([
            'id_user' => $userID,
            'status'  => 'awal'
        ])->first();

        if ($cek) {
            $idTransaksi = $cek['id_transaksi'];
        } else {
            $newTransaksi = [
                'id_user' => $userID,
                'status'  => 'awal',
                'created_at' => date('Y-m-d H:i:s')
            ];
            $idTransaksi = $transaksi->insert($newTransaksi);
        }

        session()->set('id_transaksi', $idTransaksi);

        $data['kat'] = $kategori->findAll();
        $data['detail'] = $detail->getItemsWithDetail($idTransaksi);
        $data['id_transaksi'] = $idTransaksi;

        echo view('part/header');
        echo view('part/navbar', $data);
        echo view('checkout', $data);
        echo view('part/footer');
    }

    public function process_order()
    {
        $transaksiModel = new TransaksiModel();
        $detailModel = new DetailTransaksiModel();

        $id_transaksi = $this->request->getPost('id_transaksi');
        $userID = session()->get('id_user');

        if (!$id_transaksi) {
            return redirect()->to('/checkout')->with('error', 'No transaction found.');
        }

        // Pastikan transaksi milik user login
        $transaksi = $transaksiModel->where([
            'id_transaksi' => $id_transaksi,
            'id_user'      => $userID
        ])->first();

        if (!$transaksi) {
            return redirect()->to('/checkout')->with('error', 'Invalid transaction.');
        }

        $cekDetail = $detailModel->where('id_transaksi', $id_transaksi)->findAll();

        if (!$cekDetail) {
            return redirect()->to('/checkout')->with('error', 'Cart is empty.');
        }

        $validation = \Config\Services::validation();
        $validation->setRules([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|valid_email',
            'payment_method' => 'required|in_list[Cash,COD,E-Wallet,Qris]',
            'address'    => 'required',
            'town_city'  => 'required',
            'country'    => 'required',
            'postcode'   => 'required',
            'mobile'     => 'required'
            
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $items = $detailModel->getItemsWithDetail($id_transaksi);

        $total = 0;
        foreach ($items as $item) {
            $total += $item['harga'] * $item['jumlah'];
        }

        // Tambahan: Pengecekan total
        if ($total <= 0) {
            return redirect()->back()->with('error', 'Total pesanan tidak valid.');
        }

        // Perbaikan: Gabung alamat lengkap dengan trim dan fallback
        $fullAddress = trim($this->request->getPost('address')) .
                       (!empty(trim($this->request->getPost('town_city'))) ? ', ' . trim($this->request->getPost('town_city')) : '') .
                       ', ' . trim($this->request->getPost('country')) . ' ' . trim($this->request->getPost('postcode'));

        $updateData = [
            'nama_pembeli' => $this->request->getPost('first_name') . ' ' . $this->request->getPost('last_name'),
            'email'        => $this->request->getPost('email'),
            'alamat'       => $fullAddress,
            'no_hp'        => $this->request->getPost('mobile'),
            'payment_method' => $this->request->getPost('payment_method'),
            'subtotal'     => $total,
            'total'        => $total,
            'status'       => 'selesai',
            'tgl_transaksi' => date('Y-m-d H:i:s')
        ];

        // Jalankan update
        $transaksiModel->update($id_transaksi, $updateData);

        // Tambahan: Pengecekan apakah update berhasil
        if ($transaksiModel->affectedRows() > 0) {
            log_message('info', 'Transaction updated successfully for ID: ' . $id_transaksi . ', Payment Method: ' . $this->request->getPost('payment_method'));
        } else {
            log_message('error', 'Failed to update transaction for ID: ' . $id_transaksi);
            return redirect()->back()->with('error', 'Gagal memperbarui transaksi. Silakan coba lagi.');
        }

        session()->remove('id_transaksi');

        return redirect()->to('checkout/receipt/' . $id_transaksi)
                         ->with('success', 'Pesanan berhasil diproses!');
    }

    public function receipt($id)
    {
        $transaksiModel = new TransaksiModel();
        $detailModel = new DetailTransaksiModel();

        $userID = session()->get('id_user');

        // Pastikan transaksi milik user
        $data['transaksi'] = $transaksiModel->where([
            'id_transaksi' => $id,
            'id_user'      => $userID,
            'status'       => 'selesai'
        ])->first();

        if (!$data['transaksi']) {
            return redirect()->to('/checkout')
                             ->with('error', 'Transaction not found.');
        }

        $data['detail'] = $detailModel->getItemsWithDetail($id);

        echo view('part/header');
        echo view('part/navbar');
        echo view('receipt', $data);
        echo view('part/footer');
    }
}