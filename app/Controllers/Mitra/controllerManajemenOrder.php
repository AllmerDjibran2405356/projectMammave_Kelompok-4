<?php

namespace App\Controllers\Mitra;

use App\Controllers\BaseController;
use App\Models\Database\order_list;
use App\Models\Database\order_status;

class controllerManajemenOrder extends BaseController{
    public function viewManajemenOrder(){
        if(!session()->get('isLoggedInAdmin')){
            return redirect()->to('Mitra/controllerLoginAdmin')->with('error', 'Harap login terlebih dahulu');
        }
        $orderListModel = new order_list();
        $orderStatusModel = new order_status();

        $order_list = $orderListModel->select('order_list.*, order_status.Order_Status, akun_pelanggan.Nama_Depan, akun_pelanggan.Alamat')
                                     ->join('order_status', 'order_status.ID_Order = order_list.ID_Order')
                                     ->join('akun_pelanggan', 'akun_pelanggan.ID_User = order_list.ID_User')
                                     ->groupBy(['akun_pelanggan.Nama_Depan', 'order_list.Waktu_Order'])
                                     ->orderBy('order_list.Waktu_Order', 'DESC')
                                     ->findAll();

        $orderDiproses = [];
        $orderSelesai = [];

        foreach($order_list as $order){
            if($order['Order_Status'] == 'Selesai' || $order['Order_Status'] == 'Dibatalkan'){
                $orderSelesai[] = $order;
            }else{
                $orderDiproses[] = $order;
            }
        }
        
        $data = [
            'orderDiproses' => $orderDiproses,
            'orderSelesai'  => $orderSelesai,
            'order_status'  => $orderStatusModel->findAll(),
            'isi_order'     => []
        ];

        return view('/Mitra/viewManajemenOrder', $data);
    }

    public function orderContent(){
        $id_user = $this->request->getPost('ID_User');
        $waktu_order = $this->request->getPost('Waktu_Order');

        $orderListModel = new order_list();

        $isi_order = $orderListModel->select('akun_pelanggan.Nama_Depan, order_list.Waktu_Order, menu_list.Nama_Menu, COUNT(order_list.ID_Menu) AS Jumlah')
                                    ->join('akun_pelanggan', 'order_list.ID_User = akun_pelanggan.ID_User')
                                    ->join('menu_list', 'order_list.ID_Menu = menu_list.ID_Menu')
                                    ->where('order_list.ID_User', $id_user)
                                    ->where('order_list.Waktu_Order', $waktu_order)
                                    ->groupBy(['akun_pelanggan.Nama_Depan', 'order_list.Waktu_Order', 'menu_list.Nama_Menu']);
    
        $query = $isi_order->get();

        $order_list = $orderListModel->select('order_list.*, order_status.Order_Status, akun_pelanggan.Nama_Depan, akun_pelanggan.Alamat')
                                     ->join('order_status', 'order_status.ID_Order = order_list.ID_Order')
                                     ->join('akun_pelanggan', 'akun_pelanggan.ID_User = order_list.ID_User')
                                     ->groupBy(['akun_pelanggan.Nama_Depan', 'order_list.Waktu_Order'])
                                     ->orderBy('order_list.Waktu_Order', 'DESC')
                                     ->findAll();
        
        $orderDiproses = [];
        $orderSelesai = [];

        foreach($order_list as $order){
            if($order['Order_Status'] == 'Selesai' || $order['Order_Status'] == 'Dibatalkan'){
                $orderSelesai[] = $order;
            }else{
                $orderDiproses[] = $order;
            }
        }
        
        $data = [
            'isi_order'     => $query->getResult(),
            'orderDiproses' => $orderDiproses,
            'orderSelesai'  => $orderSelesai,
            'order_status'  => (new order_status())->findAll()
        ];
        $data['show_order_content'] = true;
    
        return view('Mitra/viewManajemenOrder', $data);
    }

    public function updateStatus(){
        $id_user = $this->request->getPost('ID_User');
        $waktu_order = $this->request->getPost('Waktu_Order');
        $nama_depan = $this->request->getPost('Nama_Depan');
        $new_status = $this->request->getPost('Order_Status');

        $orderListModel = new order_list();
        $orderStatusModel = new order_status();

        if($new_status !== null){
            $orders = $orderListModel->where('ID_User', $id_user)
                                     ->where('Waktu_Order', $waktu_order)
                                     ->findAll();

            foreach($orders as $order){
                $orderStatusModel->where('ID_Order', $order['ID_Order'])
                                 ->set(['Order_Status' => $new_status])
                                 ->update();
            }

            return redirect()->to(base_url('Mitra/controllerManajemenOrder'));
        }

        $order_list = $orderListModel->select('order_list.*, order_status.Order_Status, akun_pelanggan.Nama_Depan, akun_pelanggan.Alamat')
                                     ->join('order_status', 'order_status.ID_Order = order_list.ID_Order')
                                     ->join('akun_pelanggan', 'akun_pelanggan.ID_User = order_list.ID_User')
                                     ->groupBy(['akun_pelanggan.Nama_Depan', 'order_list.Waktu_Order'])
                                     ->orderBy('order_list.Waktu_Order', 'DESC')
                                     ->findAll();

        $orderDiproses = [];
        $orderSelesai = [];

        foreach($order_list as $order){
            if($order['Order_Status'] == 'Selesai' || $order['Order_Status'] == 'Dibatalkan'){
                $orderSelesai[] = $order;
            }else{
                $orderDiproses[] = $order;
            }
        }

        $data = [
            'orderDiproses'        => $orderDiproses,
            'orderSelesai'         => $orderSelesai,
            'order_status'         => $orderStatusModel->findAll(),
            'isi_order'            => [],
            'selected_user'        => $id_user,
            'selected_waktu_order' => $waktu_order,
            'selected_nama'        => $nama_depan,
            'show_update_status'   => true
        ];

        return view('Mitra/viewManajemenOrder', $data);
    }
}
?>