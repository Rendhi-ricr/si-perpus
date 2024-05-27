<?php

namespace App\Models;

use CodeIgniter\Model;

class userModels extends Model
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['nama_lengkap', 'email', 'password'];

    // Fungsi untuk mendapatkan data user berdasarkan email
    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}
