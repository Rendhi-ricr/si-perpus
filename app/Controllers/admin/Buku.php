<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

use App\Models\bukuModels;

class Buku extends BaseController

{
    protected $bukuModels;
    public function __construct()
    {
        $this->bukuModels = new bukuModels();
    }
    public function index()
    {
        $buku = $this->bukuModels->findAll();
        $data = [
            'title' => 'Data agenda',
            'buku' => $buku
        ];
        return view('pages/backend/buku', $data);
    }

    public function tambah()
    {
        $data = ['title' => 'Tambah Data Buku'];
        return view('pages/backend/buku/tambah', $data);
    }
    public function simpan()
    {
        $validationRule = [
            'cover' => [
                'label' => 'Image File',
                'rules' => [
                    // aturan dari file yang akan diupload
                    'uploaded[cover]',
                    'is_image[cover]',

                    // ekstensi yang diperbolehkan ketika upload file
                    'mime_in[cover,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                ],
            ],
        ];

        $cover = $this->request->getFile('cover');


        if ($cover->getFilename() != null) {
            // jika file nya tidak null atau kosong ( empty )
            if (!$this->validate($validationRule)) {

                // tampil pesan error
                return redirect()->back()->with('errors', $this->validator->getErrors())->withInput();
            }

            // jika file nya ada dan inputkan
            // memindahkan file ke folder yang di tentukan
            if (!$cover->hasMoved()) {

                // ngambil nama file
                $fileName = $cover->getName();

                // echo $fileName;
                // mindahin file ke folder public/img/berita
                $cover->move(ROOTPATH . 'public/img/cover_buku', $fileName);
            } else {

                //echo $fileName;
                return redirect()->back()->with('errors', 'File sudah di pindahkan!');
            }
        }
        $this->bukuModels->save([
            'judul' => $this->request->getVar('judul_buku'),
            'pengarang'  => $this->request->getVar('pengarang'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
            'ringkasan_buku' => $this->request->getVar('ringkasan_buku'),
            'jumlah_salinan_tersedia' => $this->request->getVar('jumlah_salinan_tersedia'),
            'cover_buku' => $fileName,
        ]);
        return redirect()->to('admin/buku');
    }
}