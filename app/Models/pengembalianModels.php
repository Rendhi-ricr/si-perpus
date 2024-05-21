<?php

namespace App\Models;

use CodeIgniter\Model;

class PengembalianModels extends Model
{
    protected $table      = 'tbl_pengembalian';
    protected $primaryKey = 'id_pengembalian';
    protected $allowedFields = ['id_anggota', 'id_buku', 'tanggal_peminjaman', 'tanggal_pengembalian', 'tanggal_dikembalikan', 'telat'];

    function getAll()
    {
        $builder = $this->db->table('tbl_pengembalian');
        $builder->join('tbl_anggota', 'tbl_anggota.id_anggota = tbl_pengembalian.id_anggota')
            ->join('tbl_buku', 'tbl_buku.id_buku = tbl_pengembalian.id_buku');
        $query = $builder->get();
        return $query->getResult();
    }

    public function savePengembalian($data)
    {
        $builder = $this->db->table($this->table);
        $builder->insert($data);
    }

    public function data_pengembalian($id_pengembalian)
    {
        return $this->find($id_pengembalian);
    }

    // Jika Anda membutuhkan fungsi lain, tambahkan di sini
}
