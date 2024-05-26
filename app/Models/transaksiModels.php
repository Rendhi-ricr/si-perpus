<?php

namespace App\Models;

use CodeIgniter\Model;

class transaksiModels extends Model
{
    protected $table = 'tbl_transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['id_anggota', 'tanggal_peminjaman', 'tanggal_pengembalian'];

    public function getAll()
    {
        $builder = $this->db->table($this->table);
        $builder->join('tbl_anggota', 'tbl_anggota.id_anggota = tbl_transaksi.id_anggota');
        $query = $builder->get();
        return $query->getResult();
    }

    public function data_transaksi($id_transaksi)
    {
        return $this->find($id_transaksi);
    }

    public function update_data($data, $id_transaksi)
    {
        return $this->update($id_transaksi, $data);
    }

    public function delete_data($id_transaksi)
    {
        return $this->delete($id_transaksi);
    }

    public function getTransaksiWithDetails($id_transaksi = null)
    {
        $builder = $this->db->table('tbl_transaksi');
        $builder->select('tbl_transaksi.*, tbl_anggota.nama_anggota')
            ->join('tbl_anggota', 'tbl_anggota.id_anggota = tbl_transaksi.id_anggota')
            ->groupBy('tbl_transaksi.id_transaksi');

        if ($id_transaksi !== null) {
            $builder->where('tbl_transaksi.id_transaksi', $id_transaksi);
        }

        $query = $builder->get();
        return $id_transaksi ? $query->getRow() : $query->getResult();
    }

    public function getDetailByTransaksi($id_transaksi)
    {
        return $this->db->table('tbl_detail_transaksi')
            ->select('tbl_buku.judul, tbl_transaksi.tanggal_peminjaman, tbl_transaksi.tanggal_pengembalian')
            ->join('tbl_transaksi', 'tbl_transaksi.id_transaksi = tbl_detail_transaksi.id_transaksi')
            ->join('tbl_buku', 'tbl_buku.id_buku = tbl_detail_transaksi.id_buku')
            ->where('tbl_detail_transaksi.id_transaksi', $id_transaksi)
            ->get()
            ->getResult();
    }
}
