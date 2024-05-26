<?php

namespace App\Models;

use CodeIgniter\Model;

class detailTransaksiModels extends Model
{
    protected $table = 'tbl_detail_transaksi';
    protected $primaryKey = 'id_detail_transaksi';
    protected $allowedFields = ['id_transaksi', 'id_buku'];

    public function getDetailByTransaksi($id_transaksi)
    {
        return $this->where('id_transaksi', $id_transaksi)->findAll();
    }
}
