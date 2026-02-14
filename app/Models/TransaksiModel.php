<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table      = 'tbl_transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'tgl_transaksi',
        'id_user',
        'nama_pembeli',
        'email',
        'payment_method',
        'alamat',
        'no_hp',
        'subtotal',
        'total',
        'status',
        'created_at',
        'updated_at'
    ];

    public function cek_data($id_user)
    {
        return $this->where('id_user', $id_user)
                    ->where('status', 'awal')
                    ->first();
    }
}
