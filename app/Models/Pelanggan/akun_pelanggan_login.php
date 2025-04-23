<?php
namespace App\Models\Pelanggan;
use CodeIgniter\Model;

class akun_pelanggan_login extends Model{
    protected $table = 'akun_pelanggan';
    protected $primaryKey = 'ID_User';
    protected $allowedFields = ['Email', 'Password_User'];

    public function getAkun($email){
        return $this->where('Email', $email)->first();
    }
}
?>