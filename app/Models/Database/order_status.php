<?php
namespace App\Models\Database;
use CodeIgniter\Model;

class order_status extends Model{
    protected $table = 'order_status';
    protected $primaryKey = 'ID_Order';
    protected $allowedFields = ['ID_Order', 'ID_User', 'Order_Status'];
    protected $useAutoIncrement = false;
}
?>