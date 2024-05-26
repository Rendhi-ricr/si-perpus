<?php

namespace App\Models;

use CodeIgniter\Model;

class historiTransaksiModels extends Model
{
    protected $table = 'tbl_histori_transaksi';
    protected $primaryKey = 'id_histori_transaksi';
    protected $allowedFields = ['id_anggota', 'tanggal_peminjaman', 'tanggal_pengembalian', 'tanggal_dikembalikan', 'telat'];

    public function getHistoriTransaksiWithDetails($id_histori_transaksi = null)
    {
        $builder = $this->db->table($this->table)
            ->select('tbl_histori_transaksi.*, tbl_anggota.nama_anggota')
            ->join('tbl_anggota', 'tbl_anggota.id_anggota = tbl_histori_transaksi.id_anggota');

        if ($id_histori_transaksi !== null) {
            $builder->where('tbl_histori_transaksi.id_histori_transaksi', $id_histori_transaksi);
        }

        return $builder->get()->getResult();
    }
}
