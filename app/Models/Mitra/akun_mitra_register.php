<?php
namespace App\Models\Mitra;
use CodeIgniter\Model;

class akun_mitra_register extends Model{
    protected $table = 'akun_admin';
    protected $primaryKey = 'ID_Admin';
    protected $allowedFields = ['Username', 'Password_Admin'];

    public function checkDuplicate($username){
        return $this->where('Username', $username)
                    ->first();
    }
}
?>