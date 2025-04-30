<?php
namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;
use App\Models\Database\order_list;

class controllerRiwayatOrder extends BaseController{
    public function viewRiwayatOrder(){
        if(!session()->get('isLoggedIn')){
            return redirect()->to('/Pelanggan/controllerLoginAkunPelanggan')->with('error', 'Harap login terlebih dahulu');
        }

        $orderListModel = new order_list();

        $session = session();
        $id_user = $session->get('ID_User');

        $riwayatPemesanan = $orderListModel->select('akun_pelanggan.ID_User, akun_pelanggan.Nama_Depan, order_list.Waktu_Order, order_status.Order_Status')
                                           ->join('akun_pelanggan', 'order_list.ID_User = akun_pelanggan.ID_User')
                                           ->join('order_status', 'order_list.ID_Order = order_status.ID_Order')
                                           ->where('order_list.ID_User', $id_user)
                                           ->groupBy(['akun_pelanggan.Nama_Depan', 'order_list.Waktu_Order', 'order_status.Order_Status'])
                                           ->findAll();

        $orderDiproses = [];
        $orderSelesai = [];

        foreach($riwayatPemesanan as $order){
            if($order['Order_Status'] == 'Selesai' || $order['Order_Status'] == 'Dibatalkan'){
                $orderSelesai[] = $order;
            }else{
                $orderDiproses[] = $order;
            }
        }

        $data = [
            'orderDiproses' => $orderDiproses,
            'orderSelesai' => $orderSelesai
        ];

        return view('Pelanggan/viewRiwayatPemesanan', $data);
    }

    public function isiOrder(){
        $id_user = $this->request->getPost('ID_User');
        $waktu_order = $this->request->getPost('Waktu_Order');

        $orderListModel = new order_list();


        $isi_order = $orderListModel->select('akun_pelanggan.ID_User, akun_pelanggan.Nama_Depan, order_list.Waktu_Order, menu_list.Nama_Menu, COUNT(order_list.ID_Menu) AS Jumlah')
                                    ->join('akun_pelanggan', 'order_list.ID_User = akun_pelanggan.ID_User')
                                    ->join('menu_list', 'order_list.ID_Menu = menu_list.ID_Menu')
                                    ->where('order_list.ID_User', $id_user)
                                    ->where('order_list.Waktu_Order', $waktu_order)
                                    ->groupBy(['akun_pelanggan.Nama_Depan', 'order_list.Waktu_Order', 'menu_list.Nama_Menu']);

        $query = $isi_order->get();

        $riwayatPemesanan = $orderListModel->select('akun_pelanggan.ID_User, akun_pelanggan.Nama_Depan, order_list.Waktu_Order, order_status.Order_Status')
                                           ->join('akun_pelanggan', 'order_list.ID_User = akun_pelanggan.ID_User')
                                           ->join('order_status', 'order_list.ID_Order = order_status.ID_Order')
                                           ->where('order_list.ID_User', $id_user)
                                           ->groupBy(['akun_pelanggan.Nama_Depan', 'order_list.Waktu_Order', 'order_status.Order_Status'])
                                           ->findAll();

        $orderDiproses = [];
        $orderSelesai = [];

        foreach($riwayatPemesanan as $order){
            if($order['Order_Status'] == 'Selesai' || $order['Order_Status'] == 'Dibatalkan'){
                $orderSelesai[] = $order;
            }else{
                $orderDiproses[] = $order;
            }
        }

        $data = [
            'orderDiproses' => $orderDiproses,
            'orderSelesai'  => $orderSelesai,
            'isi_order'     => $query->getResult()
        ];
        $data['show_order_content'] = true;

        return view('Pelanggan/viewRiwayatPemesanan', $data);
    }
}
?>