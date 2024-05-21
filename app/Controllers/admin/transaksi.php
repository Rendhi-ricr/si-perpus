<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\transaksiModels;
use App\Models\anggotaModels;
use App\Models\bukuModels;
use App\Models\pengembalianModels;

class transaksi extends BaseController
{
    protected $transaksiModels, $anggotaModels, $bukuModels, $pengembalianModels;

    public function __construct()
    {
        $this->transaksi = new transaksiModels();
        $this->anggota = new anggotaModels();
        $this->buku = new bukuModels();
        $this->pengembalian = new pengembalianModels();
    }

    public function index()
    {
        $data['transaksi'] = $this->transaksi->getAll();
        return view('pages/backend/transaksi', $data);
    }

    public function tambah()
    {
        $data = [
            'anggota' => $this->anggota->findAll(),
            'buku' => $this->buku->findAll(),
        ];
        return view('pages/backend/transaksi/tambah', $data);
    }

    public function simpan()
    {
        $id_anggota = $this->request->getVar('id_anggota');
        $id_buku = $this->request->getVar('id_buku');

        $this->transaksi->save([
            'id_anggota' => $id_anggota,
            'id_buku' => $id_buku,
            'tanggal_peminjaman' => $this->request->getVar('tanggal_peminjaman'),
            'tanggal_pengembalian' => $this->request->getVar('tanggal_pengembalian'),
        ]);
        return redirect()->to('admin/transaksi');
    }

    public function edit($id_transaksi)
    {
        $buku = $this->buku->data_buku($id_buku);
        $anggota = $this->anggota->findAll();
        $data = [
            'title' => 'Edit Data Transaksi',
            'Buku' => $buku,
            'Anggota' => $anggota,
        ];

        return view('pages/backend/transaksi/edit', $data);
    }

    public function update()
    {
        $id_anggota = $this->request->getVar('id_anggota');
        $id_buku = $this->request->getVar('id_buku');
        $data = [
            'id_anggota' => $id_anggota,
            'id_buku' => $id_buku,
            'tanggal_peminjaman' => $this->request->getVar('tanggal_peminjaman'),
            'tanggal_pengembalian' => $this->request->getVar('tanggal_pengembalian'),
        ];


        $this->transaksi->update_data($data, $id_transaksi);
        return redirect()->to('admin/transaksi');
    }

    public function selesai($id_transaksi)
    {
        // Ambil data transaksi berdasarkan id_transaksi
        $transaksi = $this->transaksi->find($id_transaksi);
        if ($transaksi) {
            $tanggal_dikembalikan = date('Y-m-d'); // Atau ambil dari input form jika diperlukan
            $telat = (strtotime($tanggal_dikembalikan) > strtotime($transaksi['tanggal_pengembalian'])) ? (strtotime($tanggal_dikembalikan) - strtotime($transaksi['tanggal_pengembalian'])) / (60 * 60 * 24) : 0;

            // Simpan data ke tabel pengembalian
            $this->pengembalian->save([
                'id_anggota' => $transaksi['id_anggota'],
                'id_buku' => $transaksi['id_buku'],
                'tanggal_peminjaman' => $transaksi['tanggal_peminjaman'],
                'tanggal_pengembalian' => $transaksi['tanggal_pengembalian'],
                'tanggal_dikembalikan' => $tanggal_dikembalikan,
                'telat' => $telat,
            ]);

            // Hapus data dari tabel transaksi
            $this->transaksi->delete($id_transaksi);

            // Redirect kembali ke halaman transaksi dengan pesan sukses
            return redirect()->to('admin/transaksi')->with('success', 'Transaksi selesai dan dipindahkan ke tabel pengembalian.');
        } else {
            return redirect()->to('admin/transaksi')->with('error', 'Transaksi tidak ditemukan.');
        }
    }
}
