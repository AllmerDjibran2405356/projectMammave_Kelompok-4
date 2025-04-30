<?php
namespace App\Models\Mitra;
use CodeIgniter\Model;

class list_akun_mitra extends Model{
    protected $table = 'akun_admin';
    protected $primaryKey = 'ID_Admin';
    protected $allowedFields = ['Username', 'Password_Admin'];
}
?>