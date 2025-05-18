<?php
namespace App\Models\Pelanggan;
use CodeIgniter\Model;

class akun_pelanggan_login extends Model{
    protected $table = 'akun_pelanggan';
    protected $primaryKey = 'ID_User';
    protected $allowedFields = ['Nama_Depan', 'Nama_Belakang', 'Alamat', 'Tanggal_Lahir', 'Nomor_Telepon', 'Email', 'Password_User', 'Picture_Name'];

    public function getAkun($email){
        return $this->where('Email', $email)->first();
    }
}
?>