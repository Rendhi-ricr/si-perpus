<?php

namespace App\Models;

use CodeIgniter\Model;

class transaksiModels extends Model
{
    protected $table      = 'tbl_transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['id_anggota', 'id_buku', 'tanggal_peminjaman', 'tanggal_pengembalian', 'status_peminjaman'];

    function getAll()
    {
        $builder = $this->db->table('tbl_transaksi');
        $builder->join('tbl_anggota', 'tbl_anggota.id_anggota = tbl_transaksi.id_anggota')
            ->join('tbl_buku', 'tbl_buku.id_buku = tbl_transaksi.id_buku');
        $query = $builder->get();
        return $query->getResult();
    }
}
