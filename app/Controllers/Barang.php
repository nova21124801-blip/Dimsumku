<?php

namespace App\Controllers;

use App\Models\ItemModel;
use App\Models\BarangModel;
use App\Models\KategoriModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Barang extends BaseController
{
    public function index()
    {
        $barang = new BarangModel();
        $data['brg'] = $barang->findAll();
        echo view('part_adm/header');
        echo view('part_adm/top_menu', $data);
        echo view('part_adm/side_menu', $data);
        echo view('barang', $data);
        echo view('part_adm/footer');
    }

    public function tambah()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_barang' => 'required',
            'harga' => 'required|numeric|greater_than[0]' // Tambah validasi harga: required, numeric, dan > 0
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
       if ($isDataValid) {

    $brg  = new BarangModel();
    $item = new ItemModel();

    $dataGambar = $this->request->getFile('gambar');
    $fileName   = $dataGambar->getRandomName();
    $dataGambar->move('file_gambar/', $fileName);

    $kode = $this->request->getPost('kode_barang');
    $harga = $this->request->getPost('harga');

    // Insert ke tbl_barang
    $brg->insert([
        "kode_barang" => $kode,
        "id_kategori" => $this->request->getPost('id_kategori'),
        "nama_barang" => $this->request->getPost('nama_barang'),
        "gambar"      => $fileName,
        "harga"       => $harga
    ]);

    // Insert ke tbl_item (WAJIB)
    $item->insert([
        "kode_barang" => $kode,
        "harga"       => $harga,
        "stok"        => 100,       // bisa kamu ubah sesuai kebutuhan
        "warna"       => "Default"
    ]);

    return redirect('barang');
}

        $barang = new BarangModel();
        $kategori = new KategoriModel();
        $data['barang'] = $barang->generateKodeBarang();
        $data['kategori'] = $kategori->findAll();
        echo view('part_adm/header');
        echo view('part_adm/top_menu');
        echo view('part_adm/side_menu');
        echo view('barang_add', $data);
        echo view('part_adm/footer');
    }

    public function edit($id)
    {
        $brg = new BarangModel();
        $kategori = new KategoriModel();

        $data['barang'] = $brg->where('kode_barang', $id)->first();
        $data['kategori'] = $kategori->findAll();

        if (!$data['barang']) {
            throw PageNotFoundException::forPageNotFound("Barang dengan kode $id tidak ditemukan");
        }

        echo view('part_adm/header');
        echo view('part_adm/top_menu');
        echo view('part_adm/side_menu');
        echo view('barang_edit', $data);
        echo view('part_adm/footer');
    }

    public function update($id)
    {
        $brg = new BarangModel();
        
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_barang' => 'required',
            'harga'       => 'required|numeric|greater_than[0]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, kembali ke halaman edit dengan membawa input sebelumnya dan pesan error
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $dataUpdate = [
            "id_kategori" => $this->request->getPost('id_kategori'),
            "nama_barang" => $this->request->getPost('nama_barang'),
            "harga"       => $this->request->getPost('harga')
        ];

        // Logika upload gambar
        $dataGambar = $this->request->getFile('gambar');
        if ($dataGambar && $dataGambar->isValid() && !$dataGambar->hasMoved()) {
            $fileName = $dataGambar->getRandomName();
            $dataGambar->move('file_gambar/', $fileName);
            $dataUpdate["gambar"] = $fileName;
        }

        // Eksekusi update berdasarkan kode_barang
        $brg->where('kode_barang', $id)->set($dataUpdate)->update();

        return redirect()->to(base_url('barang'))->with('success', 'Data berhasil diperbarui');
    }
    public function delete($id)
    {
        $bar = new BarangModel();
        $bar->delete($id);
        return redirect('barang');
    }
}