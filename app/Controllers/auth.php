<?php

namespace App\Controllers;

use App\Models\userModels;

class auth extends BaseController
{
    public function index()
    {
        return view('pages/login.php');
    }
    public function login()
    {
        // Ambil data dari form login
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Panggil model untuk melakukan pengecekan login
        $userModel = new userModels(); // Ubah nama kelas model
        $user = $userModel->where('email', $email)->first();

        // Jika user ditemukan
        if ($user) {
            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                // Simpan data user ke dalam session
                $session = session();
                $session->set([
                    'id_user' => $user['id_user'],
                    'nama_lengkap' => $user['nama_lengkap'],
                    'email' => $user['email'],
                    'level' => $user['level'],
                    'isLoggedIn' => true
                ]);

                // Redirect ke halaman dashboard
                return redirect()->to('/admin/home'); // Menggunakan redirect()->to() untuk mengarahkan ke route dashboard
            } else {
                // Password salah
                return redirect()->back()->with('error', 'Password salah');
            }
        } else {
            // User tidak ditemukan
            return redirect()->back()->with('error', 'Email tidak ditemukan');
        }
    }


    public function tambah()
    {
        return view('pages/register.php');
    }

    public function register()
    {
        // Ambil data dari form registrasi
        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'confirm_password' => $this->request->getPost('confirm_password'),
            // 'level' => 'user' // Atur level sesuai kebutuhan
        ];


        // Enkripsi password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // Simpan data ke dalam database
        $userModel = new userModels();
        $userModel->save($data);

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->to('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    public function dashboard()
    {
        // Cek apakah user sudah login
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('login');
        }

        // Ambil data user dari session
        $data['nama_lengkap'] = $session->get('nama_lengkap');
        $data['level'] = $session->get('level');

        // Tampilkan halaman dashboard
        return view('dashboard', $data);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
