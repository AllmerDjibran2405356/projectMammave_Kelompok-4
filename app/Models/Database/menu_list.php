<?php
namespace App\Models\Database;
use CodeIgniter\Model;

class menu_list extends Model{
    protected $table = 'menu_list';
    protected $primaryKey = 'ID_Menu';
    protected $allowedFields = ['Nama_Menu', 'ID_Kategori', 'Harga', 'Deskripsi_Menu', 'Nama_Gambar'];
}
?>