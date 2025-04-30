<?php
namespace App\Models\Database;
use CodeIgniter\Model;

class menu_kategori extends Model{
    protected $table = 'menu_kategori';
    protected $primaryKey = 'ID_Kategori';
    protected $allowedFields = ['Nama_Kategori'];
}
?>