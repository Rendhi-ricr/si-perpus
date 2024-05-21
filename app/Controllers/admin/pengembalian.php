<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\pengembalianModels;
use App\Models\anggotaModels;
// use App\Models\transaksiModels;


class pengembalian extends BaseController
{
    protected $pengembalianModels, $anggotaModels;

    public function __construct()
    {
        $this->pengembalian = new pengembalianModels();
        $this->anggota = new anggotaModels();
        // $this->transaksi = new transaksiModels();
    }

    public function index()
    {
        $data['pengembalian'] = $this->pengembalian->getAll();
        return view('pages/backend/pengembalian', $data);
    }
}
