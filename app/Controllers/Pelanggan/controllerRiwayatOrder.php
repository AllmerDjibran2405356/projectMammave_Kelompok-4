<?php
namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;
use App\Models\Database\menu_list;
use App\Models\Database\menu_kategori;
use App\Models\Database\order_list;
use App\Models\Database\order_status;

class controllerRiwayatOrder extends BaseController{
    public function viewRiwayatOrder(){
        if(!session()->get('isLoggedIn')){
            return redirect()->to('/Pelanggan/controllerLoginAkunPelanggan')->with('error', 'Harap login terlebih dahulu');
        }

        $orderListModel = new order_list();

        $session = session();
        $id_user = $session->get('ID_User');

        $riwayatPemesanan = $orderListModel->select('akun_pelanggan.Nama_Depan, order_list.Waktu_Order, order_status.Order_Status')
                                     ->join('akun_pelanggan', 'order_list.ID_User = akun_pelanggan.ID_User')
                                     ->join('order_status', 'order_list.ID_User = order_status.ID_User')
                                     ->where('order_list.ID_User', $id_user)
                                     ->groupBy(['akun_pelanggan.Nama_Depan', 'order_list.Waktu_Order'])
                                     ->findAll();

        $data = [
            'riwayatPemesanan' => $riwayatPemesanan
        ];

        return view('Pelanggan/viewRiwayatPemesanan', $data);
    }
}
?>