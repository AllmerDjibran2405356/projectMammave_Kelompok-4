<?php
namespace App\Models\Database;
use CodeIgniter\Model;

class order_list extends Model{
    protected $table = 'order_list';
    protected $primaryKey = 'ID_Order';
    protected $allowedFields = ['ID_Order', 'ID_User', 'ID_Menu', 'Waktu_Order'];
}
?>