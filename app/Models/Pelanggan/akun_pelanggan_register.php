<?php
namespace App\Models\Pelanggan;
use CodeIgniter\Model;

class akun_pelanggan_register extends Model{
    protected $table = 'akun_pelanggan';
    protected $primaryKey = 'ID_User';
    protected $allowedFields = ['Nama_Depan', 'Nama_Belakang', 'Alamat', 'Tanggal_Lahir', 'Nomor_Telepon', 'Email', 'Password_User'];

    public function checkDuplicate($email, $nomorTelepon){
        return $this->where('Email', $email)
                    ->orWhere('Nomor_Telepon', $nomorTelepon)
                    ->first();
    }
}
?>