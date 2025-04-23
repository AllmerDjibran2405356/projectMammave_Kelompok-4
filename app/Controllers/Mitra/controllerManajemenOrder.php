<?php

namespace App\Controllers\Mitra;

use App\Controllers\BaseController;
use App\Models\Database\order_list;
use App\Models\Database\order_status;

class controllerManajemenOrder extends BaseController{
    public function viewManajemenOrder(){
        $orderListModel = new order_list();
        $orderStatusModel = new order_status();

        $order_list = $orderListModel->select('order_list.*, order_status.Order_Status, akun_pelanggan.Nama_Depan')
                                     ->join('order_status', 'order_status.ID_Order = order_list.ID_Order')
                                     ->join('akun_pelanggan', 'akun_pelanggan.ID_User = order_list.ID_User')
                                     ->findAll();

        $data = [
            'order_list' => $order_list,
            'order_status' => $orderStatusModel->findAll(),
            'isi_order' => []
        ];

        return view('/Mitra/viewManajemenOrder', $data);
    }

    public function orderContent(){
        $id_user = $this->request->getPost('ID_User');
        $waktu_order = $this->request->getPost('Waktu_Order');

        $orderListModel = new order_list();

        $isi_order = $orderListModel->builder();
        $isi_order->select('akun_pelanggan.Nama_Depan, order_list.Waktu_Order, menu_list.Nama_Menu, COUNT(order_list.ID_Menu) AS Jumlah')
                  ->join('akun_pelanggan', 'order_list.ID_User = akun_pelanggan.ID_User')
                  ->join('menu_list', 'order_list.ID_Menu = menu_list.ID_Menu')
                  ->where('order_list.ID_User', $id_user)
                  ->where('order_list.Waktu_Order', $waktu_order)
                  ->groupBy(['akun_pelanggan.Nama_Depan', 'order_list.Waktu_Order', 'menu_list.Nama_Menu']);
    
        $query = $isi_order->get();
        $data['isi_order'] = $query->getResult();

        $orderListModel = new order_list();

        $order_list = $orderListModel->select('order_list.*, order_status.Order_Status, akun_pelanggan.Nama_Depan')
                                     ->join('order_status', 'order_status.ID_Order = order_list.ID_Order')
                                     ->join('akun_pelanggan', 'akun_pelanggan.ID_User = order_list.ID_User')
                                     ->findAll();

        $data['order_list'] = $order_list;
        $data['order_status'] = (new order_status())->findAll();
    
        return view('Mitra/viewManajemenOrder', $data);
    }

    public function updateStatusOrder(){
        $id_user = $this->request->getPost('ID_User');
        $waktu_order = $this->request->getPost('Waktu_Order');

        $orderListModel = new order_list();

        $isi_order = $orderListModel->builder();
        $isi_order->select('akun_pelanggan.Nama_Depan, order_list.Waktu_Order, menu_list.Nama_Menu, COUNT(order_list.ID_Menu) AS Jumlah')
                  ->join('akun_pelanggan', 'order_list.ID_User = akun_pelanggan.ID_User')
                  ->join('menu_list', 'order_list.ID_Menu = menu_list.ID_Menu')
                  ->where('order_list.ID_User', $id_user)
                  ->where('order_list.Waktu_Order', $waktu_order)
                  ->groupBy(['akun_pelanggan.Nama_Depan', 'order_list.Waktu_Order', 'menu_list.Nama_Menu']);
    
        $query = $isi_order->get();
        $data['isi_order'] = $query->getResult();

        $orderListModel = new order_list();

        $order_list = $orderListModel->select('order_list.*, order_status.Order_Status, akun_pelanggan.Nama_Depan')
                                     ->join('order_status', 'order_status.ID_Order = order_list.ID_Order')
                                     ->join('akun_pelanggan', 'akun_pelanggan.ID_User = order_list.ID_User')
                                     ->findAll();

        $data['order_list'] = $order_list;
        $data['order_status'] = (new order_status())->findAll();
    
        return view('Mitra/viewManajemenOrder', $data);
    }
    
}
?>