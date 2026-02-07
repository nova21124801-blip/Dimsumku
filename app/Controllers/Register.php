<?php

namespace App\Controllers;

use App\Models\UserModel;

class Register extends BaseController
{
    public function index()
    {
        echo view('part/header');
        echo view('register');
        echo view('part/footer');
    }
    public function simpan()
    {
    $usr = new UserModel();
    $usr->insert([
    "username" => $this->request->getPost('username'),
    "password" => md5($this->request->getPost('password')),
    "hak_akses" => "user"
    ]);
//return redirect('kategori');
    echo view('part/header');
    echo view('part/navbar');
    echo view('beranda');
    echo view('part/footer');
 }
}