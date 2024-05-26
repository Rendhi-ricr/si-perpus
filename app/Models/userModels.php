<?php

namespace App\Models;

use CodeIgniter\Model;

class userModels extends Model
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['username', 'password', 'role'];


    public function getUser($username)
    {
        return $this->where('username', $username)->first();
    }

    public function countUsers()
    {
        return $this->countAllResults();
    }
}
