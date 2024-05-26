<?php

namespace App\Models;

use CodeIgniter\Model;

class historiDetailTransaksiModels extends Model
{
    protected $table = 'tbl_histori_detail_transaksi';
    protected $primaryKey = 'id_histori_detail_transaksi';
    protected $allowedFields = ['id_histori_transaksi', 'id_buku'];

    public function getDetailByHistoriTransaksi($id_histori_transaksi)
    {
        return $this->db->table($this->table)
            ->select('tbl_buku.judul')
            ->join('tbl_buku', 'tbl_buku.id_buku = tbl_histori_detail_transaksi.id_buku')
            ->where('id_histori_transaksi', $id_histori_transaksi)
            ->get()
            ->getResult();
    }
}
